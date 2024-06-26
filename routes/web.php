<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\RegisterController;
use App\Models\Follower;

Route::get('/prueba/{post}',function(){
    return view('prueba');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/Registro',[RegisterController::class, 'index'])->name('register');
Route::post('/Registro',[RegisterController::class, 'store']);

Route::get('/Login',[LoginController::class, 'index'])->name('login');
Route::post('/Login',[LoginController::class, 'store']);
Route::post('/Logout',[LogoutController::class, 'store'])->name('logout');

//rutas para el perfil
Route::get('/editar-perfil',[perfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[perfilController::class, 'store'])->name('perfil.store');

Route::get('/post/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/post',[PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');

Route::post('/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagenes.store');

//likes a las fots
Route::post('/posts/{post}/likes',[LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class, 'destroy'])->name('posts.likes.destroy');


//siguiendo
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');