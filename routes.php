<?php

require_once 'dispatcher.php';
class Route
{
    private $routes;

    public function __construct()
    {
        $this->initRoutes();

        return 0;
    }

    private function initRoutes()
    {
        $routes['home'] = ['route' => '/', 'controller' => 'homeControl', 'action' => 'showPage'];
        $routes['login'] = ['route' => '/login', 'controller' => 'loginControl', 'action' => 'showPage'];
        $this->setRoutes($routes);
    }

    private function setRoutes($routes)
    {
        $this->routes = $routes;
        $this->run();

        return 0;
    }

    private function run()
    {
        new Dispatcher($this->routes);

        return 0;
    }
}
