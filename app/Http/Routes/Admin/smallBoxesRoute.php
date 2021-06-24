<?php

Route::group(['prefix'=>'smallBoxes'],function(){

        $section =  'smallboxes';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.smallBoxes.destroy','uses'=>'Admin\SmallBoxesController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.smallBoxes.edit','uses'=>'Admin\SmallBoxesController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.smallBoxes.update','uses'=>'Admin\SmallBoxesController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.smallBoxes.create','uses'=>'Admin\SmallBoxesController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.smallBoxes.store','uses'=>'Admin\SmallBoxesController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.smallBoxes.show','uses'=>'Admin\SmallBoxesController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.smallBoxes.index','uses'=>'Admin\SmallBoxesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.smallBoxes.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
