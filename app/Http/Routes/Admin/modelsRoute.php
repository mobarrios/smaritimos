<?php

Route::group(['prefix'=>'models'],function(){

        $section =  'models';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.models.destroy','uses'=>'Admin\ModelsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.models.edit','uses'=>'Admin\ModelsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.models.update','uses'=>'Admin\ModelsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.models.create','uses'=>'Admin\ModelsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.models.store','uses'=>'Admin\ModelsController@store']);
        Route::get('/show/{id?}',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.models.show','uses'=>'Admin\ModelsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.models.index','uses'=>'Admin\ModelsController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.models.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
