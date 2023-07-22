<?php
declare(strict_types=1);

use App\Helper\UpdateImagesNews;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialProviderController;
use App\Http\Requests\News\FilterRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::group(['middleware' => ['admin.panel', 'auth', 'verified']], static function () {
    // Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUsersController::class);

    });
});

Route::group(['middleware' => ['auth', 'verified']], static function () {
    Route::resource('/account', AccountController::class);
});

// Guest's routes
Route::group(['middleware' => ['guest']], function () {
    Route::get('/{driver}/auth/', [SocialProviderController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social-providers.auth');
    Route::get('/{driver}/callback/', [SocialProviderController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social-providers.redirect');

});

Route::get('/', [IndexController::class, 'index'])
    ->name('index');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');
Route::post('/news',[NewsController::class, 'store'])->name('news.store');
Route::match(['put','patch'],'/news/{news}',[NewsController::class, 'update'])->name('news.update');
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


//different

Route::get('/updateImagesNews', [UpdateImagesNews::class, 'index']);

Route::get('/parce/rambler/games', [ParserController::class, '__invoke']);
