<?php

Route::group(['prefix'=>'profile'],function(){

        $section =  'profiles';

        Route::get('',       ['as'=>'admin.'.$section.'.index','uses'=>'Admin\ProfileController@index']);
        Route::post('/{id}',    ['as'=>'admin.'.$section.'.update','uses'=>'Admin\ProfileController@update']);


});
