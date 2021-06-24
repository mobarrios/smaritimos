<?php

$model = 'users';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Usuarios',

    //routes
    'indexRoute'    => 'configs.'.$model.'.index',
    'storeRoute'    => 'configs.'.$model.'.store',
    'createRoute'   => 'configs.'.$model.'.create',
    'showRoute'     => 'configs.'.$model.'.show',
    'editRoute'     => 'configs.'.$model.'.edit',
    'updateRoute'   => 'configs.'.$model.'.update',
    'destroyRoute'  => 'configs.'.$model.'.destroy',

    'postStoreRoute'  => 'configs.'.$model.'.index',
    'postUpdateRoute' => 'configs.'.$model.'.index',

    //urls
    'destroyUrl' => 'configs/'.$model.'/destroy/',

    //views
    'storeView' =>  'configs.'.$model.'.form',
    'editView'  =>  'configs.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => true,
    'is_brancheable'    => true,



    //column search
    
    'search' => [
        
            'Nombre'    => 'name',
            'Apellido'  => 'last_name' ,
            'Email'     => 'email',
        'Usuario'     => 'user_name'

    ],

    'validationsStore' => [

            'user_name'         => 'required|unique:users,user_name',
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



    'export' => [
        'Nombre' => 'name',
        'Apellido' => 'last_name',
        'Usuario' => 'user_name',
        'Email' => 'email',
    ]
];
