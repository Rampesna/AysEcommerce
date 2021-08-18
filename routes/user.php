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


Route::group([
    'as' => 'user.',
    'middleware' => [
        'auth'
    ]
], function () {
    Route::resource('login', \App\Http\Controllers\User\AuthenticationController::class)->withoutMiddleware('auth');
    Route::resource('oauth', \App\Http\Controllers\User\OAuthController::class)->withoutMiddleware('auth');
    Route::resource('dashboard', \App\Http\Controllers\User\DashboardController::class);
    Route::resource('order', \App\Http\Controllers\User\OrderController::class);
    Route::resource('product', \App\Http\Controllers\User\ProductController::class);
    Route::resource('marketing', \App\Http\Controllers\User\MarketingController::class);
    Route::resource('customer', \App\Http\Controllers\User\CustomerController::class);
    Route::resource('report', \App\Http\Controllers\User\ReportController::class);
    Route::resource('setting', \App\Http\Controllers\User\SettingController::class);
});
