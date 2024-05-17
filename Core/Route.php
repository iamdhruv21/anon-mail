<?php

namespace Core;

require "../Core/Router.php";

class Route
{
//    public static function get(string $uri, string|array $action): void
//    {
//        if (is_array($action)) {
//            $class = $action[0];
//            $action = $action[1];
//        } else {
//            $action = explode('@', $action);
//            $namespace = "Controllers/";
//
//            $class = require $namespace . $action[0] . "php";
//        }
//
//        self::add('get', $uri, $class, $action);
//    }

    public static function add($method, $uri, $controller): void
    {
        Router::add($method, $uri, $controller);
    }
}