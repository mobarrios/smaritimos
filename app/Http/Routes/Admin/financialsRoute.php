<?php

Route::group(['prefix'=>'financials'],function(){

        $section =  'financials';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.financials.destroy','uses'=>'Admin\FinancialsController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.financials.edit','uses'=>'Admin\FinancialsController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.financials.update','uses'=>'Admin\FinancialsController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.financials.create','uses'=>'Admin\FinancialsController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.financials.store','uses'=>'Admin\FinancialsController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.financials.show','uses'=>'Admin\FinancialsController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.financials.index','uses'=>'Admin\FinancialsController@index']);



        Route::post('/addDue/{item?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.financials.addDue', 'uses' => 'Admin\FinancialsController@addDue']);
        Route::get('/editDue/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.financials.editDue', 'uses' => 'Admin\FinancialsController@editDue']);
        Route::post('/editDue/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.edit', 'as' => 'admin.financials.updateDue', 'uses' => 'Admin\FinancialsController@updateDue']);
        Route::get('/deleteDue/{item?}/{id?}', ['middleware' => 'permission:' . $section . '.destroy', 'as' => 'admin.financials.deleteDue', 'uses' => 'Admin\FinancialsController@deleteDue']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.financials.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);
});
