<?php
require_once 'App/views/loginPage.php';
require_once 'App/models/usuario.php';
class loginControl
{
    public function showPage()
    {

        new views\loginPage();

        if (isset($_POST)) {
            $this->authLogin();
        }
    }

    private function authLogin()
    {
        $usuario = filter_input(INPUT_POST, 'usuario',  FILTER_SANITIZE_STRING);
        $senha = md5(filter_input(INPUT_POST, 'senha',  FILTER_SANITIZE_STRING));
        $login = new models\usuario();
        $login->authUser($usuario, $senha);
    }
}
