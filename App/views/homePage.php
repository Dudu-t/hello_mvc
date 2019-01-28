<?php

namespace views;

class homePage
{
    private $dataPage;
    private $basicInfo;
    private $pagina;

    private function pageData($buffer)
    {
        //continua...

        $buffer = str_replace('{page_conteudo}', 'oranges', $buffer);
        $buffer = str_replace('{page_title}', 'teste', $buffer);

        return $buffer;
    }

    public function __construct()
    {
        ob_start();
        require_once 'App/vendor/template/index.html';
        $buffer = ob_get_contents();
        $buffer = $this->pageData($buffer);
        $this->pagina = $buffer;
        ob_end_clean();
        echo $buffer;
    }
}
