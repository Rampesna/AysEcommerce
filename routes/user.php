<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('oauth', [\App\Http\Controllers\OAuthController::class, 'index'])->name('oauth');

Route::get('login', [\App\Http\Controllers\User\AuthenticationController::class, 'login'])->name('user.login.index');
Route::get('logout', [\App\Http\Controllers\User\AuthenticationController::class, 'logout'])->name('user.logout');

Route::group([
    'as' => 'user.',
    'middleware' => [
        'auth:user'
    ]
], function () {


    Route::prefix('dashboard')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard.index');
    });

    Route::prefix('order')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\OrderController::class, 'index'])->name('order.index');
    });

    Route::prefix('product')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\ProductController::class, 'index'])->name('product.index');
    });

    Route::prefix('marketing')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\MarketingController::class, 'index'])->name('marketing.index');
    });

    Route::prefix('customer')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\CustomerController::class, 'index'])->name('customer.index');
    });

    Route::prefix('report')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\ReportController::class, 'index'])->name('report.index');
    });

    Route::prefix('setting')->group(function () {
        Route::get('index', [\App\Http\Controllers\User\SettingController::class, 'index'])->name('setting.index');
    });
});
