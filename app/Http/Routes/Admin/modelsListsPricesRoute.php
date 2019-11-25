<?php

Route::group(['prefix' => 'modelsListsPrices'], function () {

    $section = 'modelslistsprices';

    Route::get('/destroy/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.modelsListsPrices.destroy', 'uses' => 'Admin\ModelsListsPricesController@destroy']);
    Route::get('/edit/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.edit', 'uses' => 'Admin\ModelsListsPricesController@edit']);
    Route::post('/update/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.update', 'uses' => 'Admin\ModelsListsPricesController@update']);

    Route::get('/create', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.modelsListsPrices.create', 'uses' => 'Admin\ModelsListsPricesController@create']);
    Route::post('/store', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.modelsListsPrices.store', 'uses' => 'Admin\ModelsListsPricesController@store']);
    Route::get('/show', ['middleware' => 'permission:' . $section . '.show', 'as' => 'admin.modelsListsPrices.show', 'uses' => 'Admin\ModelsListsPricesController@show']);
    Route::get('/index/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.modelsListsPrices.index', 'uses' => 'Admin\ModelsListsPricesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.modelsListsPrices.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

    Route::post('/addItem/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.addItems', 'uses' => 'Admin\ModelsListsPricesController@addItems']);
    Route::get('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.editItems', 'uses' => 'Admin\ModelsListsPricesController@editItems']);
    Route::post('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.updateItems', 'uses' => 'Admin\ModelsListsPricesController@updateItems']);
    Route::get('/deleteItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.modelsListsPrices.deleteItems', 'uses' => 'Admin\ModelsListsPricesController@deleteItems']);

    //download listsprices
    Route::get('/download/{providersId?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.download', 'uses' => 'Admin\ModelsListsPricesController@download']);
    Route::get('/upload/{modelsListsPricesId?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.upload', 'uses' => 'Admin\ModelsListsPricesController@upload']);
    Route::post('/upload/{modelsListsPricesId?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.modelsListsPrices.postUpload', 'uses' => 'Admin\ModelsListsPricesController@postUpload']);


});
