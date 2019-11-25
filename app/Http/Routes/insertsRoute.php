<?php

Route::group(['prefix'=>'inserts'],function(){

	Route::get('/clients',['uses'=>'Utilities\InsertsController@clients']);
	Route::get('/brands',['uses'=>'Utilities\InsertsController@brands']);
	Route::get('/models',['uses'=>'Utilities\InsertsController@models']);
	Route::get('/orders',['uses'=>'Utilities\InsertsController@orders']);
	Route::get('/states',['uses'=>'Utilities\InsertsController@states']);
	Route::get('/equipments',['uses'=>'Utilities\InsertsController@equipments']);
	
});
