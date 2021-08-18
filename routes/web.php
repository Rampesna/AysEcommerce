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

Route::get('sess', function () {
    return session()->pull('cart');
});

Route::get('test', function () {
    return bcrypt('123456');
});

Route::get('relations', function () {
    return \App\Models\Product::with([
        'variantOptions',
    ])->find(1);
});

Route::group([
    'as' => 'web.'
], function () {
    Route::get('/', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('product.index');
    Route::get('/{id?}', [\App\Http\Controllers\Web\ProductController::class, 'show'])->name('product.show');
    Route::post('/addToCart', [\App\Http\Controllers\Web\CartController::class, 'addToCart'])->name('addToCart');
});
