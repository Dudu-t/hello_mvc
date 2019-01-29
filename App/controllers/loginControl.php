<?php
require_once 'App/views/loginPage.php';
require_once 'App/models/usuario.php';
class loginControl
{
    public function showPage()
    {

        new views\loginPage();

        if (count($_POST) > 0) {
            $this->authLogin();
        }
    }

    private function authLogin()
    {
        if (isset($_POST['usuario'])) {
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            $login = new models\usuario();
            $login = $login->authUser($usuario, $senha);
            if ($login !== 0) {
                $_SESSION['usuario'] = $login;
                echo "<script>window.location.href = '/'</script>";
            } else {
                echo "Usuário ou senha inválido.";
            }
        }
    }
}
