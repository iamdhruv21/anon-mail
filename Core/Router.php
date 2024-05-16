<?php

namespace Core;
class Router
{
    protected array $route = [];

    public function route($uri, $method)
    {
        $flag = true;
        foreach ($this->route as $item) {
            if ($item['method'] == $method && $item['uri'] == $uri) {
                if($item['middleware']) {
                    //call middleware
                }
                require $item['controller'];
                die();
            }
        }
        require "../resources/views/404.php";

    }

}