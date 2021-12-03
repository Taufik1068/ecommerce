<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::resource('admin/pemasok/produkpemasok','Admin\ProdukpemasokController');
    
    Route::get('/kategori','Admin\ProdukpemasokController@index');
    
    Route::post('admin/pemasok/produkpemasok/create', 'Admin\ProdukpemasokController@store');
    Route::get('admin/pemasok/produkpemasok/create','Admin\ProdukpemasokController@create');
    
    Route::get('admin/pemasok/produkpemasok/laporanpemasok','Admin\ProdukpemasokController@laporanpemasok');
    Route::get('admin/pemasok/produkpemasok/cetak/{tglawal}/{tglakhir}','Admin\ProdukpemasokController@cetak')->name('cetak');

    Route::get('admin/pemasok/produkpemasok/destroy/{id_pemasok}','Admin\ProdukpemasokController@destroy');

	
});