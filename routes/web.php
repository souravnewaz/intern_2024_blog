<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']);

Route::get('login', [AuthController::class, 'login_page'])->name('login_page');
Route::post('login_user', [AuthController::class, 'login'])->name('login');

Route::get('signup', [AuthController::class, 'signup_page'])->name('signup_page');
Route::post('signup', [AuthController::class, 'signup'])->name('signup');



Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');