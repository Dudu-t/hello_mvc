<?php

namespace views;

class loginPage
{
    private $bufferPage;
    private $form;

    private function loadData()
    {
        return 0;
    }

    private function setData($page)
    {
        $this->bufferPage = $page;
        $pageDataBasic = [
            'titulo' => ['page_title', 'Login'],
            'navHomeActive' => ['home_active', ''],
            'navActive' => ['login_active', 'active'],
            'navHomeHref' => ['home_href', '/'],
            'conteudo' => ['page_conteudo', $this->form],
        ];
        array_walk($pageDataBasic, function ($data) {
            $var = '{'.$data[0].'}';
            $valor = $data[1];
            $this->bufferPage = str_replace($var, $valor, $this->bufferPage);
        });

        echo $this->bufferPage;
        return 0;
    }

    private function loadHtml()
    {
        ob_start();
        require_once 'App/vendor/template/loginForm.html';
        $data = \ob_get_contents();
        ob_end_clean();
        $this->form = $data;
        ob_start();
        require_once 'App/vendor/template/index.html';
        $page = ob_get_contents();
        ob_end_clean();

        $this->setData($page);
        return 0;
    }


    public function __construct()
    {
        $this->loadHtml();

        return 0;
    }
}
