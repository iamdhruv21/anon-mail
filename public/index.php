<?php

use Core\Router;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtoupper($_SERVER['REQUEST_METHOD']);

spl_autoload_register(function ($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require ( '../' . $class . '.php');
});

require "../routes.php";

Router::route($uri, $method);

session_destroy();

