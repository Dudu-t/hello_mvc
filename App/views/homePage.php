<?php

namespace views;

class homePage
{

    private $conteudo;
    private $row;
    private function editPage()
    {
        //continua...

        $pageData = [
            'titulo'=>['page_title', 'Home'],
            'conteudo'=>['page_conteudo',$this->row],
            'homeLink'=>['home_href', '#'],
            'active'=>['home_active', 'active']
        ];
        array_walk($pageData, function ($key){
           $var = '{'.$key[0].'}';
           $valor = $key[1];
            $this->conteudo = str_replace($var, $valor,  $this->conteudo);
        });
        echo $this->conteudo;

    }
    private function loadHtml(){
        ob_start();
        require_once 'App/vendor/template/home.html';
        $home = ob_get_contents();
        $this->row = $home;
        ob_end_clean();
        ob_start();
        require_once 'App/vendor/template/index.html';
        $buffer = ob_get_contents();
        $this->conteudo = $buffer;
        ob_end_clean();
        $this->editPage();
    }
    public function __construct()
    {
        $this->loadHtml();

    }
}
