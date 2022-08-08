<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//

Route::view("/", "welcome");
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users', [UserController::class, 'store'])->name('users.index');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::put('/users/createe', [UserController::class, 'createe'])->name('users.createe');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/posts', [PostController::class, 'index'])->name('[posts].index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/posts/createe', [PostController::class, 'createe'])->name('posts.createe');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::fallback(function () {
    return '<h1>Error, try again</h1>';
});
