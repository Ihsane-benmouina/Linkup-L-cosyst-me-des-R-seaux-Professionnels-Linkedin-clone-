<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/feed',[PostController::class, 'index'])->name('feed');



Route::get('/register',[])->name('show.registrer'); 
Route::get('/login',[])->name('show.login');

