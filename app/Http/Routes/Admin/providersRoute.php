<?php

Route::group(['prefix'=>'providers'],function(){

        $section =  'providers';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.providers.destroy','uses'=>'Admin\ProvidersController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.providers.edit','uses'=>'Admin\ProvidersController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.providers.update','uses'=>'Admin\ProvidersController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.providers.create','uses'=>'Admin\ProvidersController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.providers.store','uses'=>'Admin\ProvidersController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.providers.show','uses'=>'Admin\ProvidersController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.providers.index','uses'=>'Admin\ProvidersController@index']);

        Route::get('/cc/{id?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.providers.cc','uses'=>'Admin\ProvidersController@getCc']);

        Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.providers.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
