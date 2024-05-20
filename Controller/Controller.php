<?php

namespace Controller;

class Controller
{
    public function redirect(string $location): void
    {
        header("Location: $location");
        die();
    }

    public function view($location, $params = [])
    {
        extract($params);

        require "../resources/views/$location";
        die();
    }
}