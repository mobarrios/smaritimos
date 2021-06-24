<?php

Route::group(['prefix'=>'purchasesListsPrices'],function(){

        $section =  'purchaseslistsprices';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.purchasesListsPrices.destroy','uses'=>'Admin\PurchasesListsPricesController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.purchasesListsPrices.edit','uses'=>'Admin\PurchasesListsPricesController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.purchasesListsPrices.update','uses'=>'Admin\PurchasesListsPricesController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.purchasesListsPrices.create','uses'=>'Admin\PurchasesListsPricesController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.purchasesListsPrices.store','uses'=>'Admin\PurchasesListsPricesController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.purchasesListsPrices.show','uses'=>'Admin\PurchasesListsPricesController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.purchasesListsPrices.index','uses'=>'Admin\PurchasesListsPricesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.purchasesListsPrices.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

        Route::post('/addItem/{item?}',                   ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.purchasesListsPrices.addItems','uses'=>'Admin\PurchasesListsPricesController@addItems']);
        Route::get('/editItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.purchasesListsPrices.editItems', 'uses' => 'Admin\PurchasesListsPricesController@editItems']);
        Route::post('/editItem/{item?}/{id?}', ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.purchasesListsPrices.updateItems','uses'=>'Admin\PurchasesListsPricesController@updateItems']);
        Route::get('/deleteItem/{item?}/{id?}',        ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.purchasesListsPrices.deleteItems','uses'=>'Admin\PurchasesListsPricesController@deleteItems']);


});
