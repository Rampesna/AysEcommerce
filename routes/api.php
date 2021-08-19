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
    'as' => 'api.v1.'
], function () {
    Route::group([
        'as' => 'authentication'
    ], function () {
        Route::any('login', [\App\Http\Controllers\Api\v1\AuthenticationController::class, 'login']);
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\UserController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\UserController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\UserController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\UserController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\UserController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'product.'
    ], function () {
        Route::any('index', [\App\Http\Controllers\Api\v1\ProductController::class, 'index'])->name('index');
        Route::any('show', [\App\Http\Controllers\Api\v1\ProductController::class, 'show'])->name('show');
        Route::any('store', [\App\Http\Controllers\Api\v1\ProductController::class, 'store'])->name('store');
        Route::any('update', [\App\Http\Controllers\Api\v1\ProductController::class, 'update'])->name('update');
        Route::any('delete', [\App\Http\Controllers\Api\v1\ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'product_variant_option',
        'as' => 'product_variant_option.'
    ], function () {
        Route::any('check', [\App\Http\Controllers\Api\v1\ProductVariantOptionController::class, 'check'])->name('check');
    });
});
