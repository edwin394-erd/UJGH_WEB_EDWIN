<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Registro',[RegisterController::class, 'index'])->name('register');
Route::post('/Registro',[RegisterController::class, 'Store']);

Route::get('/Login',[LoginController::class, 'index'])->name('login');
Route::post('/Login',[LoginController::class, 'store']);
Route::post('/Logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');

