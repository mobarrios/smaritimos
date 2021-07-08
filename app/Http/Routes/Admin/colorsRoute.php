<?php

Route::group(['prefix'=>'colors'],function(){

        $section =  'colors';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.colors.destroy','uses'=>'Admin\ColorsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.colors.edit','uses'=>'Admin\ColorsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.colors.update','uses'=>'Admin\ColorsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.colors.create','uses'=>'Admin\ColorsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.colors.store','uses'=>'Admin\ColorsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.colors.show','uses'=>'Admin\ColorsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.colors.index','uses'=>'Admin\ColorsController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.colors.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
