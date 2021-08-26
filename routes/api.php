<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1',
    'as' => 'api.v1.',
], function () {
    Route::group([
        'as' => 'authentication.',
    ], function () {
        Route::any('login', [\App\Http\Controllers\Api\v1\Auth\AuthenticationController::class, 'login'])->name('login');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\User\UserController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\User\UserController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\User\UserController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\User\UserController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\User\UserController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'product.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Product\ProductController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\Product\ProductController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\Product\ProductController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\Product\ProductController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\Product\ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'variant',
        'as' => 'variant.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Variant\VariantController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'product_variant_option',
        'as' => 'product_variant_option.'
    ], function () {
        Route::any('check', [\App\Http\Controllers\Api\v1\Product\ProductVariantOptionController::class, 'check'])->name('check');
    });

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Cart\CartController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\Cart\CartController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\Cart\CartController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\Cart\CartController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\Cart\CartController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'cart_item',
        'as' => 'cart_item.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Cart\CartItemController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\Cart\CartItemController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\Cart\CartItemController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\Cart\CartItemController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\Cart\CartItemController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'basket',
        'as' => 'basket.',
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Basket\BasketController::class, 'index'])->name('index');
        Route::any('add', [\App\Http\Controllers\Api\v1\Basket\BasketController::class, 'add'])->name('add');
        Route::any('drop', [\App\Http\Controllers\Api\v1\Basket\BasketController::class, 'drop'])->name('drop');
        Route::any('remove', [\App\Http\Controllers\Api\v1\Basket\BasketController::class, 'remove'])->name('remove');
    });

    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\Category\CategoryController::class, 'index'])->name('index');
    });

});
