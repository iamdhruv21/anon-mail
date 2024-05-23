<?php

use Controller\AuthController;
use Controller\MailController;
use Controller\UserController;
use Core\Route;

// Auth Routes
Route::add('GET', '/', [AuthController::class, 'getLogin']);
Route::add('POST', '/', [AuthController::class, 'Login']);
Route::add('GET', '/register', [AuthController::class, 'getRegister']);
Route::add('POST', '/register', [AuthController::class, 'register']);
Route::add('GET', '/logout', [AuthController::class, 'logout']);

// Mailbox Routes
Route::add('GET', '/inbox', [MailController::class, 'inbox']);
Route::add('GET', '/mail', [MailController::class, 'show']);

Route::add('GET', '/compose', [MailController::class, 'compose']);
Route::add('POST', '/send-mail', [MailController::class, 'sendMail']);

Route::add('GET', '/profile', [UserController::class, 'profile']);
