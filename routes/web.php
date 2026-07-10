<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\RepostController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('feed');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/show-login', [AuthController::class, 'showLogin'])->name('show.login'); 
    Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');
    
    
    Route::get('/show-register', [AuthController::class, 'showRegister'])->name('show.register'); 
    Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); 
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); 
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); 
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
Route::get('/users/{user}', [ProfilController::class, 'show'])->name('users.show');

Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update/{user}', [ProfilController::class, 'update'])->name('profile.update');
Route::post('/users/{user}/follow', [FollowController::class, 'toggle'])->name('users.follow');



Route::post('/posts/{post}/repost', [RepostController::class, 'repost'])->name('posts.repost')->middleware('auth');});