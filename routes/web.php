<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


Route::middleware('guest')->group(function(){
Route::get('/register',[AuthController::class, 'showRegister'])->name('show.registrer'); 
Route::get('/login',[AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login/store',[AuthController::class, 'login'])->name('login');
Route::post('/register/store',[AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
Route::get('/feed',[PostController::class, 'index'])->name('feed');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});


Route::get('/', function(){
    return redirect()->route(('show.login'));
});







