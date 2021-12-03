<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::resource('admin/konsumen','Admin\KonsumenController');
    Route::get('/konsumen','Admin\KonsumenController@index');

    Route::get('admin/konsumen/show/{id_pembayaran}','Admin\KonsumenController@show');

    Route::put('admin/konsumen/update/{id_pembayaran}','Admin\KonsumenController@update');
    Route::get('admin/konsumen/edit/{id_pembayaran}','Admin\KonsumenController@edit');

    
    Route::get('admin/laporankonsumen','Admin\KonsumenController@laporankonsumen');
    Route::get('admin/konsumen/cetak/{tglawal}/{tglakhir}','Admin\KonsumenController@cetak');


	
});