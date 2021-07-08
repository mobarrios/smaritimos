<?php

$model = 'orders';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Orders',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',
    
    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.index',

    //urls
    'destroyUrl' => 'admin/'.$model.'/destroy/',

    //views
    'storeView' =>  'admin.'.$model.'.form',
    'editView'  =>  'admin.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => true,
    'is_brancheable'    => false,



    //column search
    
    'search' => [
        
            'Nombre'    => 'name',
            'Apellido'  => 'last_name' ,
            'Email'     => 'email'
    ],

    'validationsStore' => [

            'email'         => 'required|unique:users,email|email',
            'name'          => 'required',
            'last_name'     => 'required',
            'password'      => 'required',
            'roles_id'      => 'required',
            'branches_id'   => 'required',
    ],

    'validationsUpdate' => [

            'name'          => 'required',
            'last_name'     => 'required',
            'roles_id'      => 'required',
            'branches_id'   => 'required',
    ],

];
