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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/about', [HomeController::class, 'about'])->name('about');
});

Auth::routes();

