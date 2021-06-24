<?php

Route::group(['prefix'=>'brands'],function(){

        $section =  'brands';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.brands.destroy','uses'=>'Admin\BrandsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.brands.edit','uses'=>'Admin\BrandsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.brands.update','uses'=>'Admin\BrandsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.brands.create','uses'=>'Admin\BrandsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.brands.store','uses'=>'Admin\BrandsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.brands.show','uses'=>'Admin\BrandsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.brands.index','uses'=>'Admin\BrandsController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.brands.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
