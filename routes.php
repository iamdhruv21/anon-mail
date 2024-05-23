<?php

use Controller\AuthController;
use Controller\InboxController;
use Core\Route;
use Core\Session;

// Auth Routes
Route::add('GET', '/', [AuthController::class, 'getLogin']);
Route::add('POST', '/', [AuthController::class, 'Login']);
Route::add('GET', '/register', [AuthController::class, 'getRegister']);
Route::add('POST', '/register', [AuthController::class, 'register']);

// Mailbox Routes
Route::add('GET', '/inbox', [InboxController::class, 'inbox']);
Route::add('GET', '/mail', [InboxController::class, 'mail']);

Route::add('GET', '/destroy', [InboxController::class, 'destroy']);

Route::add('GET', '/sent', [InboxController::class, 'send']);
Route::add('GET', '/profile', [InboxController::class, 'profile']);
Route::add('POST', '/send', [InboxController::class, 'sendStore']);