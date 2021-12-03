<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //Wulan
    Route::resource('admin/penjualan/kategori','Admin\KategoriController');
	Route::get('/kategori','Admin\KategoriController@index');

    Route::post('admin/penjualan/kategori/store', 'Admin\KategoriController@store');
	Route::get('admin/penjualan/kategori/create','Admin\KategoriController@create');

    Route::put('admin/penjualan/kategori/update/{id_kategori}', 'Admin\KategoriController@update');
	Route::get('admin/penjualan/kategori/edit/{id_kategori}','Admin\KategoriController@edit');

	Route::get('admin/penjualan/kategori/destroy/{id_kategori}','Admin\KategoriController@destroy');

    Route::get('admin/penjualan/kategori/show/{id_kategori}','Admin\KategoriController@show');
	
});