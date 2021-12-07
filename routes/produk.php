<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //Wulan
    Route::resource('admin/penjualan/produk','Admin\ProdukController');
	Route::get('/produk','Admin\ProdukController@index');

	Route::post('admin/penjualan/produk/store', 'Admin\ProdukController@store');
	Route::get('admin/penjualan/produk/create','Admin\ProdukController@create');

	Route::put('admin/penjualan/produk/update/{id_produk}', 'Admin\ProdukController@update');
	Route::get('admin/penjualan/produk/edit/{id_produk}','Admin\ProdukController@edit');

	Route::get('admin/penjualan/produk/destroy/{id_produk}','Admin\ProdukController@destroy');

    Route::get('admin/penjualan/produk/show/{id_produk}','Admin\ProdukController@show');

	
	
});
