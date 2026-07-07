<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('feed');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/show-login', [AuthController::class, 'showLogin'])->name('show.login'); // زيادة احتياطية للـ View
    Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/show-register', [AuthController::class, 'showRegister'])->name('show.register'); // زيادة احتياطية للـ View
    Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/posts/create', [PostController::class, 'formPost'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    Route::get('/posts/{post}/edit', [PostController::class, 'pageUpdate'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'deletePost'])->name('posts.destroy');
});