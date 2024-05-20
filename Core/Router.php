<?php

namespace Core;
use Controller\AuthController;

class Router
{
    public static $route = [];

    public static function add($method, $uri, $controller): void
    {
        static::$route[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller[0],
            'action' => $controller[1]
        ];
    }

    public static function route($uri, $method): void
    {
        foreach (static::$route as $item) {
            if ($item['method'] == $method && $item['uri'] == $uri) {
                (new $item['controller'])->{$item['action']}();
                die();
            }
        }
        require "../resources/views/404.php";
    }

}