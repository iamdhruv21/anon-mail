<?php

namespace Controller;

class SessionController extends Controller
{
    public static function destroySession()
    {
        session_unset();
        session_destroy();

        self::redirect('/');
    }
}