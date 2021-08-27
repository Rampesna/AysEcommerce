<?php

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

Route::group([
    'as' => 'web.'
], function () {
    Route::get('/login', [\App\Http\Controllers\Web\AuthenticationController::class, 'login'])->name('login');
    Route::get('/logout', [\App\Http\Controllers\Web\AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('product.index');
    Route::get('/search', [\App\Http\Controllers\Web\ProductController::class, 'search'])->name('product.search');
    Route::get('/product/{id?}', [\App\Http\Controllers\Web\ProductController::class, 'show'])->name('product.show');

    Route::group([
        'prefix' => 'basket',
        'as' => 'basket.'
    ], function () {
        Route::any('/index', [\App\Http\Controllers\Web\BasketController::class, 'index'])->name('index');
        Route::any('/add', [\App\Http\Controllers\Web\BasketController::class, 'add'])->name('add')->middleware('csrf');
        Route::any('/drop', [\App\Http\Controllers\Web\BasketController::class, 'drop'])->name('drop')->middleware('csrf');
        Route::any('/remove', [\App\Http\Controllers\Web\BasketController::class, 'remove'])->name('remove')->middleware('csrf');
        Route::any('/clear', [\App\Http\Controllers\Web\BasketController::class, 'clear'])->name('clear');
    });

    Route::group([
        'prefix' => 'customer',
        'as' => 'customer.',
        'middleware' => 'auth:customer'
    ], function () {
        Route::group([
            'as' => 'index.'
        ], function () {
            Route::any('/index', [\App\Http\Controllers\Web\Customer\IndexController::class, 'index'])->name('index');
        });

        Route::group([
            'prefix' => 'address',
            'as' => 'address.'
        ], function () {
            Route::any('/index', [\App\Http\Controllers\Web\Customer\AddressController::class, 'index'])->name('index');
        });

        Route::group([
            'prefix' => 'order',
            'as' => 'order.'
        ], function () {
            Route::any('/index', [\App\Http\Controllers\Web\Customer\OrderController::class, 'index'])->name('index');
        });
    });

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.',
        'middleware' => 'auth:customer'
    ], function () {
        Route::any('/create', [\App\Http\Controllers\Web\CartController::class, 'create'])->name('create');
    });
});
