<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('admin/pemasok/datapemasok','Admin\PemasokController');
    Route::get('/datapemasok','Admin\PemasokController@index');
    
    Route::get('admin/pemasok/datapemasok/show/{id_pemasok}','Admin\PemasokController@show');
    
    Route::post('admin/pemasok/datapemasok/create', 'Admin\PemasokController@store');
    Route::get('datapemasok/create','Admin\PemasokController@create')->name('admin/pemasok/datapemasok/create');
    
    Route::put('admin/pemasok/datapemasok/update/{id_pemasok}', 'Admin\pemasokController@update');
	Route::get('admin/pemasok/datapemasok/edit/{id_pemasok}','Admin\pemasokController@edit');

	Route::get('admin/pemasok/datapemasok/destroy/{id_pemasok}','Admin\pemasokController@destroy');

    
	});
