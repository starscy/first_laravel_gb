<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\GB\CategoryController;
use App\Http\Controllers\GB\NewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', [IndexController::class, 'index']);

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/news/{category}', [NewsController::class, 'news'])->name('news');
Route::get("/news/{category}/{name}", [NewsController::class, 'newsDetail'])->name('newsDetail');

//Route::get('/news', [NewsController::class, 'news'])->name('news');
//Route::get("/news/{id}/{name}", [NewsController::class, 'newsDetail'])->name('newsDetail');

