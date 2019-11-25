<?php

Route::group(['prefix'=>'items'],function(){

        $section =  'items';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.items.destroy','uses'=>'Admin\ItemsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.items.edit','uses'=>'Admin\ItemsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.items.update','uses'=>'Admin\ItemsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.items.create','uses'=>'Admin\ItemsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.items.store','uses'=>'Admin\ItemsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.items.show','uses'=>'Admin\ItemsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.items.index','uses'=>'Admin\ItemsController@index']);

        Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.items.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});

Route::group(['prefix'=>'certificates'],function(){

$section =  'certificates';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.certificates.destroy','uses'=>'Admin\CertificatesController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.certificates.edit','uses'=>'Admin\CertificatesController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.certificates.update','uses'=>'Admin\CertificatesController@update']);

        Route::get('/create/{id?}',     ['middleware'=>'permission:'.$section.'.create','as'=>'admin.certificates.create','uses'=>'Admin\CertificatesController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.certificates.store','uses'=>'Admin\CertificatesController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.certificates.show','uses'=>'Admin\CertificatesController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.certificates.index','uses'=>'Admin\CertificatesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.certificates.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});


