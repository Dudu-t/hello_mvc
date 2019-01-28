<?php

namespace views;

class loginPage
{
    private $bufferPage;
    private $formhtml;

    private function loadData()
    {
        return 0;
    }

    private function loadFormHtml()
    {
        ob_start();
        require_once 'App/vendor/template/loginForm.html';
        $data = \ob_get_contents();
        ob_end_clean();
        $this->form = $data;
    }

    private function setData($page)
    {
        $this->bufferPage = $page;
        $pageDataBasic = [
            'titulo' => ['page_title', 'Login'],
            'navHomeActive' => ['home_active', ''],
            'navActive' => ['login_active', 'active'],
            'navHomeHref' => ['home_href', '../'],
            'navLoginHref' => ['login_href', '#'],
            'conteudo' => ['page_conteudo', $this->form],
        ];
        array_walk($pageDataBasic, function ($data) {
            $var = '{'.$data[0].'}';
            $valor = $data[1];
            $this->bufferPage = str_replace($var, $valor, $this->bufferPage);
        });

        $this->writeHtml();

        return 0;
    }

    private function loadHtml()
    {
        $this->loadFormHtml();
        ob_start();
        require_once 'App/vendor/template/index.html';
        $page = ob_get_contents();
        $this->setData($page);
    }

    private function writeHtml()
    {
        ob_end_clean();
          echo $this->bufferPage;

        return 0;
    }

    public function __construct()
    {
        $this->loadHtml();

        return 0;
    }
}
