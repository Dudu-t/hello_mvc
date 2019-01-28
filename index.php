<?php
/*
https://www.devmedia.com.br/conceito-de-mvc-e-sua-funcionalidade-usando-o-php/22324
http://www.digitaldev.com.br/2013/01/22/exemplo-de-mvc-com-php/
http://php.net/manual/pt_BR/function.ob-start.php - para editar o buffer

*/
session_start();
require_once 'config.php';
require_once 'routes.php';
new Route();
