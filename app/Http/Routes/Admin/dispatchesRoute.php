<?php

Route::group(['prefix' => 'dispatches'], function () {

    $section = 'dispatches';

    Route::get('/destroy/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.dispatches.destroy', 'uses' => 'Admin\DispatchesController@destroy']);
    Route::get('/edit/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.dispatches.edit', 'uses' => 'Admin\DispatchesController@edit']);
    Route::post('/update/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.dispatches.update', 'uses' => 'Admin\DispatchesController@update']);

    Route::get('/create', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.dispatches.create', 'uses' => 'Admin\DispatchesController@create']);
    Route::post('/store', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.dispatches.store', 'uses' => 'Admin\DispatchesController@store']);
    Route::get('/show', ['middleware' => 'permission:' . $section . '.show', 'as' => 'admin.dispatches.show', 'uses' => 'Admin\DispatchesController@show']);
    Route::get('/index/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.dispatches.index', 'uses' => 'Admin\DispatchesController@index']);

    Route::get('/purchasesItems/{purchasesOrdersId?}/{dispatchesId?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.dispatches.purchasesItems', 'uses' => 'Admin\DispatchesController@purchasesItems']);


    Route::get('/pdf', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.dispatches.pdf', 'uses' => 'Utilities\UtilitiesController@exportListToPdf']);

    Route::post('/addItem/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.dispatches.addItems', 'uses' => 'Admin\DispatchesController@addItems']);
    Route::get('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.dispatches.editItems', 'uses' => 'Admin\DispatchesController@editItems']);
    Route::post('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.dispatches.updateItems', 'uses' => 'Admin\DispatchesController@updateItems']);
    Route::get('/deleteItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.dispatches.deleteItems', 'uses' => 'Admin\DispatchesController@deleteItems']);



    // asignar factura

    Route::post('/invoice', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.dispatches.invoice', 'uses' => 'Admin\DispatchesController@invoice']);

});
