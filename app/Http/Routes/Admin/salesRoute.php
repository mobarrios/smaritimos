<?php

Route::group(['prefix' => 'sales'], function () {

    $section = 'sales';

    Route::get('/destroy/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.sales.destroy', 'uses' => 'Admin\SalesController@destroy']);
    Route::get('/edit/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.edit', 'uses' => 'Admin\SalesController@edit']);
    Route::post('/update/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.update', 'uses' => 'Admin\SalesController@update']);

    Route::get('/create', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.create', 'uses' => 'Admin\SalesController@create']);
    Route::post('/store', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.store', 'uses' => 'Admin\SalesController@store']);
    Route::post('/storeFromBudgets', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.storeFromBudgets', 'uses' => 'Admin\SalesController@storeFromBudgets']);
    Route::get('/show/{id}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.show', 'uses' => 'Admin\SalesController@show']);
    Route::get('/index/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.index', 'uses' => 'Admin\SalesController@index']);

    Route::get('/pdf', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.pdf', 'uses' => 'Utilities\UtilitiesController@exportListToPdf']);

    Route::get('/addItem/{sales_id?}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.addItems', 'uses' => 'Admin\SalesController@addItems']);
    Route::post('/createItems/{item?}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.createItems', 'uses' => 'Admin\SalesController@createItems']);

    Route::get('/editItem/{item?}/{salesId?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.editItems', 'uses' => 'Admin\SalesController@editItems']);
    Route::post('/updateItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.updateItems', 'uses' => 'Admin\SalesController@updateItems']);

    Route::get('/deleteItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.sales.deleteItems', 'uses' => 'Admin\SalesController@deleteItems']);


    //payments
    Route::get('/createPayment/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.createPayment', 'uses' => 'Admin\SalesController@createPayment']);
    Route::post('/addPayment/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.addPayment', 'uses' => 'Admin\SalesController@addPayment']);
    Route::get('/editPayment/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.editPayment', 'uses' => 'Admin\SalesController@editPayment']);
    Route::post('/editPayment', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.updatePayment', 'uses' => 'Admin\SalesController@updatePayment']);
    Route::get('/deletePayment/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.sales.deletePayment', 'uses' => 'Admin\SalesController@deletePayment']);


    //fianancials
    Route::get('/createFinancials/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.createFinancials', 'uses' => 'Admin\SalesController@createFinancials']);
    Route::post('/addFinancials/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.addFinancials', 'uses' => 'Admin\SalesController@addFinancials']);
    Route::get('/editFinancials/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.editFinancials', 'uses' => 'Admin\SalesController@editFinancials']);
    Route::post('/editFinancials', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.updateFinancials', 'uses' => 'Admin\SalesController@updateFinancials']);
    Route::get('/deleteFinancials/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.sales.deleteFinancials', 'uses' => 'Admin\SalesController@deleteFinancials']);


    Route::post('/storeRecibos', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.storeRecibos', 'uses' => 'Admin\SalesController@storeRecibos']);

    Route::get('/deleteRecibos/{recibo}/{id}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.sales.deleteRecibos', 'uses' => 'Admin\SalesController@deleteRecibos']);


    Route::get('/pdf/{id}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.pdf', 'uses' => 'Utilities\UtilitiesController@exportToPdf']);


    Route::get('/showAside', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.showAside', 'uses' => 'Admin\SalesController@showAside']);


    Route::get('/recibo/{id}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.recibo', 'uses' => 'Utilities\UtilitiesController@reciboPdf']);

    Route::get('/factura/{id}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.factura', 'uses' => 'Utilities\UtilitiesController@facturaPdf']);

    Route::get('/add/{id?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.sales.modal', 'uses' => 'Admin\SalesController@modal']);


    //change status

    Route::get('/changeStatus', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.sales.changeStatus', 'uses' => 'Admin\SalesController@changeStatus']);

    Route::get('/createBudget/{id}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.sales.createBudget', 'uses' => 'Admin\SalesController@createBudget']);


});
