<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;

// الـ Route الرئيسي يوجه مباشرة لـ Feed
Route::get('/', function () {
    return redirect()->route('feed');
});

// Routes الخاصة بالضيوف (Guest) - تسجيل الدخول وإنشاء حساب
Route::middleware('guest')->group(function () {
    // تسجيل الدخول (Login)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/show-login', [AuthController::class, 'showLogin'])->name('show.login'); 
    Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');
    
    // إنشاء حساب (Register)
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/show-register', [AuthController::class, 'showRegister'])->name('show.register'); 
    Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
});

// Routes المحمية (Auth) - يجب تسجيل الدخول للوصول إليها
Route::middleware('auth')->group(function () {
    // الفيد الرئيسي
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // إدارة المنشورات (Posts) - متطابقة 100% مع الـ Controller ديالك دابا
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // مصلح كيعيط على create()
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // كيعيط على edit()
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // كيعيط على update()
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // كيعيط على destroy()
    // نظام التعليقات (Comments)
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // نظام الإعجابات (Likes)
    Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
});