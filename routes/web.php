<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register'); 
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/login/store', [AuthController::class, 'login'])->name('login');
    Route::post('/register/store', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); 
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.updatePost'); // خليت ليك هاد الاسم حيت مستعملاه ف الـ View
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/', function(){
    return redirect()->route('show.login');
});