<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { 
  return view('main'); 
});

/* Auth */
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);
Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'store']);
Route::post('/cerrar-sesion', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index')->middleware('auth');  // apply route model binding
Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/{user:username}/posts/{posts}', [PostController::class, 'show'])->name(('posts.show'));

Route::post('/{user:username}/posts/{posts}', [CommentController::class, 'store'])->name('comments.store');


Route::post('/upload-images', [ImageController::class, 'store'])->name('images.store')->middleware('auth');

