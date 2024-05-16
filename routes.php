<?php

$routes->add('GET', '/', '../Controller/index.php');
$routes->add('GET', '/register', '../Controller/register.php');
$routes->add('POST', '/register', '../Controller/register/index.php');

$routes->add('GET', '/inbox', '../Controller/show.php');
$routes->add('GET', '/mail', '../resources/views/partials/show.php');

$routes->add('POST', '/', '../Controller/login.php');
$routes->add('GET', '/destroy', '../Controller/destroy.php');