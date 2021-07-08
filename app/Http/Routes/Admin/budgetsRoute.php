<?php

Route::group(['prefix'=>'budgets'],function(){

        $section =  'budgets';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.budgets.destroy','uses'=>'Admin\BudgetsController@destroy']);
        Route::get('/edit/{client?}/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.budgets.edit','uses'=>'Admin\BudgetsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.budgets.update','uses'=>'Admin\BudgetsController@update']);

//        Route::get('/create/{id?}',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.budgets.create','uses'=>'Admin\BudgetsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.budgets.store','uses'=>'Admin\BudgetsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.budgets.show','uses'=>'Admin\BudgetsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.budgets.index','uses'=>'Admin\BudgetsController@index']);
        Route::get('/prospectos/{id}/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.budgets.indexProspectos','uses'=>'Admin\BudgetsController@indexProspectos']);

//         Route::post('/addItem/{id}',  ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.'.$section.'.addItem','uses'=>'admin\BudgetsController@addItems']);
//         Route::get('/editItem/{id}/{item}',  ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.'.$section.'.editItem','uses'=>'admin\BudgetsController@editItems']);
//         Route::post('/editItem/{id}/{item}',  ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.'.$section.'.editItem','uses'=>'admin\BudgetsController@updateItems']);
//         Route::get('/deleteItem/{id}/{item}',  ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.'.$section.'.deleteItem','uses'=>'admin\BudgetsController@deleteItems']);

    Route::get('/addItem/{budgetsId?}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.budgets.addItems', 'uses' => 'Admin\BudgetsController@addItems']);
    Route::post('/createItems/{item?}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.budgets.createItems', 'uses' => 'Admin\BudgetsController@createItems']);

    Route::get('/editItem/{item?}/{budgetsId?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.budgets.editItems', 'uses' => 'Admin\BudgetsController@editItems']);

    Route::post('/updateItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.budgets.updateItems', 'uses' => 'Admin\BudgetsController@updateItems']);

    Route::get('/deleteItem/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.budgets.deleteItems', 'uses' => 'Admin\BudgetsController@deleteItems']);


        Route::get('/pdf/{id}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.budgets.pdf','uses'=>'Utilities\UtilitiesController@exportToPdf']);

        Route::get('/showAside',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.budgets.showAside','uses'=>'Admin\BudgetsController@showAside']);



        // ajax
    Route::get('/budgetsClients/{id?}',  ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.'.$section.'.budgetsClients','uses'=>'Admin\BudgetsController@budgetsClients']);
    Route::get('/budget/{id?}',  ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.'.$section.'.budget','uses'=>'Admin\BudgetsController@budget']);


});
