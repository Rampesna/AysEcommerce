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

Route::get('test', function () {
    return bcrypt('123456');
});

Route::group([
    'as' => 'web.customer.'
], function () {
    Route::resource('/', \App\Http\Controllers\Web\Customer\ProductController::class)->parameters([
        '' => 'id?'
    ]);;
});