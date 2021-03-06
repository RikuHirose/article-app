<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

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

Route::group(['middleware' => 'auth'], function () {
  Route::get('/about', [HomeController::class, 'about'])->name('about');
  Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
  Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

  Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
  Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
  Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

  Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

  Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
  Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
  Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
  Route::get('/users/{id}/likes', [UserController::class, 'likesIndex'])->name('users.show.likes.index');
  Route::get('/users/{id}/follows', [UserController::class, 'followsIndex'])->name('users.show.follows.index');

  Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
  Route::delete('/likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');

  Route::post('/follows', [FollowController::class, 'store'])->name('follows.store');
  Route::delete('/follows/{id}', [FollowController::class, 'destroy'])->name('follows.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Auth::routes();

