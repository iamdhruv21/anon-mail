<?php

use \Core\Route;

//Route::get('/', 'HomeController@home');
Route::add('GET', '/', '/index.php');
Route::add('GET', '/register', '/register.php');
Route::add('POST', '/register', '/register/index.php');

Route::add('GET', '/inbox', '/show.php');
Route::add('GET', '/mail', '/mail.php');

Route::add('POST', '/', '/login.php');
Route::add('GET', '/destroy', '/destroy.php');

Route::add('GET', '/sent', '/sent.php');
Route::add('POST', '/send', '/send.php');