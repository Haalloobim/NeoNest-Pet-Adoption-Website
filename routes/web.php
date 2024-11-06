<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\loginController;

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [loginController::class, 'login']);
