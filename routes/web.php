<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']);

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login_page'])->name('login_page');
    Route::post('login_user', [AuthController::class, 'login'])->name('login');    
    Route::get('signup', [AuthController::class, 'signup_page'])->name('signup_page');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
});


Route::middleware('auth')->group(function(){
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blogs/{blog}/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::post('blogs/{blog}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
});

Route::fallback(function(){
    return redirect('/');
});

