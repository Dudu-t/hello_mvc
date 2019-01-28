<?php

class Dispatcher
{
    private $routes;
    private $url;

    public function __construct($routes)
    {
        $this->routes = $routes;

        $this->dispatcher();

        return 0;
    }

    private function dispatcher()
    {
        $this->getUrl();
        //Percorre o array com as rotas
        array_walk($this->routes, function ($rota) {
            if (!isset($_SESSION['usuario']) && $this->url !== '/login') {
                echo '<script>window.location.href = "login/";</script>';
            }
            if ($rota['route'] == $this->url) {
                $controller = $rota['controller'];
                $action = $rota['action'];
                $endereco = "App/controllers/$controller.php";
                if (file_exists($endereco)) {
                    require_once $endereco;
                    $control = new $controller();
                    $control->$action();
                } else {
                    header('HTTP/1.1 404 Not Found');
                }
            } else {
                header('HTTP/1.1 404 Not Found');
            }
        });

        return 0;
    }

    private function getUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace(dir, '', $url);
        $url = explode('/', $url);
        $url = array_unique($url);
        $url = implode('/', $url);
        $url = $url !== '' ? $url : '/'; // Operador ternario | condicao ? 'resultado if' :'resultado else';
        $this->url = $url;

        return 0;
    }
}
