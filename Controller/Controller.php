<?php

namespace Controller;

use http\Params;

class Controller
{
    public static function redirect($location)
    {
        header("location: $location");
        die();
    }

    public static function view($location, $params = [])
    {
        extract($params);

        require "../resources/views/$location";
        die();
    }

}