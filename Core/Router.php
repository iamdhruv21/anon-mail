<?php

namespace Core;
class Router
{
    public static $route = [];

    public static function add($method, $uri, $controller): void
    {
        static::$route[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public static function route($uri, $method): void
    {

        foreach (static::$route as $item) {
            if ($item['method'] == $method && $item['uri'] == $uri) {
//                if($item['middleware']) {
//                    //call middleware
//                }
                require "../Controller" . $item['controller'];
                die();
            }
        }
        require "../resources/views/404.php";

    }

}