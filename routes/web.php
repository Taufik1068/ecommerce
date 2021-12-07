<?php

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


Route::get('/updatecart/{id_toko}/{key}/{qty}', 'CartController@updateCart');

Route::post('/deleteCheckout', 'CartController@deleteCheckout')->name('cart.deleteCheckout');


// Toko

Route::prefix('customer')->group(function () {
    Route::get('/', 'IndexController@index')->name('customer.index');
    Route::get('/produk', 'IndexController@produk')->name('customer.produk');
    Route::get('/search', 'IndexController@searchAll')->name('customer.searchAllProduk');

    // Toko
    Route::prefix('toko')->group(function () {
        Route::get('/{id_toko}', 'TokoController@show')->name('customerToko.show');
        Route::get('/{id_toko}/category/{id_kategori}', 'IndexController@categoryDetail')->name('category.detail');
        Route::get('/{id_toko}/produk/{id_produk}', 'IndexController@produkDetail')->name('produk.detail');
        Route::post('{id_toko}/buyNow', 'CartController@buyNow')->name('cart.buyNow');
        Route::post('{id_toko}/buyNow/store', 'IndexController@buyNowStore')->name('buyNow.store');

        Route::get('{id_toko}/buyNow', 'IndexController@buyNowIndex')->name('cart.buyNowIndex');

        // CO
        Route::get('{id_toko}/checkout/done', 'IndexController@checkoutDone')->name('checkout.done');

        Route::get('{id_toko}/checkout', 'IndexController@checkout')->name('checkout.index');
        Route::post('{id_toko}/checkout/store', 'IndexController@checkoutStore')->name('checkout.store');

        Route::post('{id_toko}/toCheckout', 'CartController@checkout')->name('cart.checkout');

        Route::get('{id_toko}/search', 'IndexController@search')->name('customer.searchProduk');
        Route::get('{id_toko}/cart', 'CartController@index')->name('cart.index');
        Route::post('{id_toko}/cart/store', 'CartController@store')->name('cart.store');
        Route::get('{id_toko}/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
    });
});



Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Auth::routes();
    Route::get('/', 'HomeController@index');

    Auth::routes();
    Route::get('/home', 'HomeController@index');

    Route::get('/akunadmin', 'Auth\AkunadminController@index');
});
