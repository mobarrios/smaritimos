<?php

Route::group(['prefix'=>'checkbooks'],function(){

        $section =  'checkbooks';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.checkbooks.destroy','uses'=>'Admin\CheckbooksController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.checkbooks.edit','uses'=>'Admin\CheckbooksController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.checkbooks.update','uses'=>'Admin\CheckbooksController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.checkbooks.create','uses'=>'Admin\CheckbooksController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.checkbooks.store','uses'=>'Admin\CheckbooksController@store']);
        Route::get('/show/{id?}',        ['as'=>'admin.checkbooks.show','uses'=>'admin\CheckbooksController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.checkbooks.index','uses'=>'Admin\CheckbooksController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.checkbooks.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);


});
