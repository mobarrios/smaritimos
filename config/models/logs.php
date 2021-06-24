<?php

$model = 'logs';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Logs',

    //routes
    'indexRoute'    => 'configs.'.$model.'.index',
    'storeRoute'    => 'configs.'.$model.'.store',
    'createRoute'   => 'configs.'.$model.'.create',
    'showRoute'     => 'configs.'.$model.'.show',
    'editRoute'     => 'configs.'.$model.'.edit',
    'updateRoute'   => 'configs.'.$model.'.update',
    'destroyRoute'  => 'configs.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.index',
    
    //urls
    'destroyUrl' => 'configs/'.$model.'/destroy/',

    //views
    'storeView' =>  'configs.'.$model.'.form',
    'editView'  =>  'configs.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => false,
    'is_imageable'      => false,
    'is_brancheable'    => false,
    

    //column search
    'search' => [
        
            'Nombre'    => 'name',
            'Direccion'  => 'address' ,
            'Email'     => 'email'
    ],

    'validationsStore' => [

            'name'          => 'required',
            'address'     => 'required',

    ],

    'validationsUpdate' => [

            'name'          => 'required',
            'address'     => 'required',

    ],

    'export' => [
        'Entidad' => ['logeable', 'section'],
        'Apellido' => 'last_name',
        'Log' => 'log',
        'Usuario' => ['users','fullname'],
    ]
];
