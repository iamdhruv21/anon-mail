<?php

use Controller\HomeController;
use Controller\InboxController;
use Controller\SessionController;
use \Core\Route;

//Route::get('/', 'HomeController@home');
Route::add('GET', '/', [HomeController::class, 'loginView']);
Route::add('GET', '/register', [HomeController::class, 'registerView']);
Route::add('POST', '/register', [HomeController::class, 'registerStore']);

Route::add('GET', '/inbox', [InboxController::class, 'inboxView']);
Route::add('POST', '/inbox', [InboxController::class, 'search']);
Route::add('GET', '/mail', [InboxController::class, 'mailView']);

Route::add('POST', '/', [HomeController::class, 'loginStore']);
Route::add('GET', '/destroy', [SessionController::class, 'destroySession']);

Route::add('GET', '/sent', [InboxController::class, 'sendView']);
Route::add('GET', '/profile', [InboxController::class, 'profileView']);
Route::add('POST', '/send', [InboxController::class, 'sendStore']);