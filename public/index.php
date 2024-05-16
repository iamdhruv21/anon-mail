<?php


require "../Core/Routes.php";

use Core\Routes;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtoupper($_SERVER['REQUEST_METHOD']);

$errors = [];

$routes = new Routes();
require "../routes.php";

$routes->route($uri, $method);

