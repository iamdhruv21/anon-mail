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
            'controller' => $controller[0],
            'action' => $controller[1]
        ];
    }

    public static function route($uri, $method): void
    {
        foreach (static::$route as $item) {
            if ($item['method'] == $method && $item['uri'] == $uri) {
                call_user_func($item['controller'].'::'.$item['action']);
//                $item['controller']::$item['action']();
            }
        }
        require "../resources/views/404.php";

    }

}