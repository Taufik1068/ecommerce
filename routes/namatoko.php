<?php


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    route::resource('/namatoko', 'NamatokoController');
    route::get('/namatoko', 'NamatokoController@index');

    Route::put('namatoko/{id_toko}', 'NamatokoController@update');


    Route::put('namatoko/update/{id_toko}', 'NamatokoController@update');
	Route::get('namatoko/{id_toko}','NamatokoController@edit');

   
    
});