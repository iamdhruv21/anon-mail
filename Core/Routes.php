<?php

namespace Core;

require "../Core/Router.php";

class Routes extends Router
{
    public function add($method, $uri, $controller, $middleware = null)
    {
        $this->route[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }
}