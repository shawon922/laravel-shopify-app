<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['verify.shopify', 'request.modifier'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/shop', function () {
        return view('shop');
    })->name('shop');

    Route::controller(CollectionController::class)->group(function () {
        Route::get('/collections', 'index')->name('collections.list');
        Route::get('/collections/create', 'create')->name('collections.create');
        Route::post('/collections', 'store')->name('collections.store');
        // Route::get('/collections/{collection}', 'show')->name('collections.show');
        Route::get('/collections/{collection}/edit', 'edit')->name('collections.edit');
        Route::put('/collections/{collection}', 'update')->name('collections.update');
        // Route::delete('/collections/{collection}', 'destroy')->name('collections.destroy');

        Route::get('/collections/{collection}/products', 'productIndex')->name('collections.products.list');
        Route::get('/collections/{collection}/products/create', 'productCreate')->name('collections.products.create');
        Route::post('/collections/{collection}/products', 'productStore')->name('collections.products.store');
        Route::get('/collections/{collection}/products/{product}/edit', 'productEdit')->name('collections.products.edit');
        Route::put('/collections/{collection}/products/{product}', 'productUpdate')->name('collections.products.update');
    });

});
