<?php

Route::group(['prefix'=>'purchasesOrders'],function(){

    $section =  'purchasesorders';

    Route::get('/destroy/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.purchasesOrders.destroy', 'uses' => 'Admin\PurchasesOrdersController@destroy']);
    Route::get('/edit/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.edit', 'uses' => 'Admin\PurchasesOrdersController@edit']);
    Route::post('/update/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.update', 'uses' => 'Admin\PurchasesOrdersController@update']);

    Route::get('/create', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.purchasesOrders.create', 'uses' => 'Admin\PurchasesOrdersController@create']);
    Route::post('/store', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.purchasesOrders.store', 'uses' => 'Admin\PurchasesOrdersController@store']);
    Route::get('/show', ['middleware' => 'permission:' . $section . '.show', 'as' => 'admin.purchasesOrders.show', 'uses' => 'Admin\PurchasesOrdersController@show']);
    Route::get('/index/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.purchasesOrders.index', 'uses' => 'Admin\PurchasesOrdersController@index']);

    Route::post('/addItem/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.addItems', 'uses' => 'Admin\PurchasesOrdersController@addItems']);
    Route::get('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.editItems', 'uses' => 'Admin\PurchasesOrdersController@editItems']);
    Route::post('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.updateItems', 'uses' => 'Admin\PurchasesOrdersController@updateItems']);
    Route::get('/deleteItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.purchasesOrders.deleteItems', 'uses' => 'Admin\PurchasesOrdersController@deleteItems']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.purchasesOrders.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

    Route::get('/sendPurchaseOrder/{id?}', ['middleware' => 'permission:' . $section . '.sendtoproviders', 'as' => 'admin.purchasesOrders.sendToProviders', 'uses' => 'Admin\PurchasesOrdersController@sendToProviders']);
    Route::get('/confirm/{id?}', ['middleware' => 'permission:' . $section . '.confirm', 'as' => 'admin.purchasesOrders.confirm', 'uses' => 'Admin\PurchasesOrdersController@confirm']);


    Route::post('/addPayment/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.addPayment', 'uses' => 'Admin\PurchasesOrdersController@addPayment']);
    Route::get('/editPayment{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.editPayment', 'uses' => 'Admin\PurchasesOrdersController@editPayment']);
    Route::post('/editPayment/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesOrders.updatePayment', 'uses' => 'Admin\PurchasesOrdersController@updatePayment']);
    Route::get('/deletePayment/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.purchasesOrders.deletePayment', 'uses' => 'Admin\PurchasesOrdersController@deletePayment']);


});
