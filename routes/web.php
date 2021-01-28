<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Auth::routes();

