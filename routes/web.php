<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Requests\News\FilterRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::group(['middleware' => ['auth', 'admin.panel'] ], static function () {

    // Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);

    });

});


//Route::delete('/news/{id}', [AdminNewsController::class, 'destroy']);

// Guest's routes
Route::get('/', [IndexController::class, 'index'])
    ->name('index');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


//

Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one

});
