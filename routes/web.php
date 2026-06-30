<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/feed',[PostController::class, 'index'])->name('feed');



Route::get('/showRegister',[AuthController::class, 'showRegister'])->name('show.registrer'); 
Route::get('/showLogin',[AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register'])->name('register');

