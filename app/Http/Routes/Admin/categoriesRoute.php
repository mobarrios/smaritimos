<?php

Route::group(['prefix'=>'categories'],function(){

        $section =  'categories';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.categories.destroy','uses'=>'Admin\CategoriesController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.categories.edit','uses'=>'Admin\CategoriesController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.categories.update','uses'=>'Admin\CategoriesController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.categories.create','uses'=>'Admin\CategoriesController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.categories.store','uses'=>'Admin\CategoriesController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.categories.show','uses'=>'Admin\CategoriesController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.categories.index','uses'=>'Admin\CategoriesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.categories.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
