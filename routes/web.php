<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

// Admin
Route::group(['prefix' => 'admin','as' => 'admin.' ], static function() {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

// Guest's routes

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


//
Route::match(["POST", 'GET', 'PUT'], '/test', function(\Illuminate\Http\Request $request) {
    return $request->all();
});
