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

Route::prefix('v1')->group(function () {
    Route::middleware([])->group(function () {
        Route::apiResource('authentication', \App\Http\Controllers\Api\v1\AuthenticationController::class)->withoutMiddleware(['token']);
        Route::apiResource('user', \App\Http\Controllers\Api\v1\UserController::class);
    });
});
