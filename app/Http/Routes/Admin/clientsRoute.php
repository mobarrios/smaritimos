<?php

Route::group(['prefix'=>'clients'],function(){

        $section =  'clients';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.clients.destroy','uses'=>'Admin\ClientsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.clients.edit','uses'=>'Admin\ClientsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.clients.update','uses'=>'Admin\ClientsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.clients.create','uses'=>'Admin\ClientsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.clients.store','uses'=>'Admin\ClientsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.clients.show','uses'=>'Admin\ClientsController@show']);

        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.clients.index','uses'=>'Admin\ClientsController@index']);


        Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.clients.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});

Route::group(['prefix'=>'prospectos'],function(){

        $section =  'clients';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.prospectos.destroy','uses'=>'Admin\ClientsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.prospectos.edit','uses'=>'Admin\ClientsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.prospectos.update','uses'=>'Admin\ClientsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.prospectos.create','uses'=>'Admin\ClientsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.prospectos.store','uses'=>'Admin\ClientsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.prospectos.show','uses'=>'Admin\ClientsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.prospectos.index','uses'=>'Admin\ClientsController@index']);


        Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.prospectos.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
