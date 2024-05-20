<?php

use Controller\AuthController;
use Controller\InboxController;
use Core\Auth;
use Core\Session;

function auth(): Auth
{
    return new Auth();
}

function session(): Session
{
    return new Session();
}

function getAuth()
{
    return new AuthController();
}

function getinbox()
{
    return new InboxController();
}