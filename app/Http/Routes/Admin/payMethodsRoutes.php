<?php
Route::group(['prefix' => 'payMethods'], function () {

    $section = 'paymethods';

    Route::get('/destroy/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.payMethods.destroy', 'uses' => 'Admin\PayMethodsController@destroy']);
    Route::get('/edit/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.payMethods.edit', 'uses' => 'Admin\PayMethodsController@edit']);
    Route::post('/update/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.payMethods.update', 'uses' => 'Admin\PayMethodsController@update']);

    Route::get('/create/{id?}', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.payMethods.create', 'uses' => 'Admin\PayMethodsController@create']);
    Route::post('/store', ['middleware' => 'permission:' . $section . '.create', 'as' => 'admin.payMethods.store', 'uses' => 'Admin\PayMethodsController@store']);
    Route::get('/show', ['middleware' => 'permission:' . $section . '.show', 'as' => 'admin.payMethods.show', 'uses' => 'Admin\PayMethodsController@show']);
    Route::get('/index/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.payMethods.index', 'uses' => 'Admin\PayMethodsController@index']);
    Route::get('/prospectos/{id}/{search?}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.payMethods.indexProspectos', 'uses' => 'Admin\PayMethodsController@indexProspectos']);

    Route::post('/addItem/{id}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.' . $section . '.addItem', 'uses' => 'Admin\PayMethodsController@addItems']);
    Route::get('/editItem/{id}/{item}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.' . $section . '.editItem', 'uses' => 'Admin\PayMethodsController@editItems']);
    Route::post('/editItem/{id}/{item}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.' . $section . '.editItem', 'uses' => 'Admin\PayMethodsController@updateItems']);
    Route::get('/deleteItem/{id}/{item}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.' . $section . '.deleteItem', 'uses' => 'Admin\PayMethodsController@deleteItems']);


    Route::get('/add/{section}/{id}/{item?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.' . $section . '.modal','uses'=>'Admin\PayMethodsController@modal']);


    Route::get('/pdf/{id}', ['middleware' => 'permission:' . $section . '.list', 'as' => 'admin.payMethods.pdf', 'uses' => 'Utilities\UtilitiesController@exportToPdf']);

});



