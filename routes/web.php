<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/feed',[PostController::class, 'index'])->name('feed');



Route::get('/register',[AuthController::class, 'showRegister'])->name('show.registrer'); 
Route::get('/login',[AuthController::class, 'showLogin'])->name('show.login');

