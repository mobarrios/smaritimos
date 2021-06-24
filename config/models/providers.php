<?php

$model = 'providers';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Proveedores',

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

        'Nombre' => 'name',
        'Direccion' => 'address',
        'Email' => 'email',
        'Cuit' => 'cuit',
        'Tel.' => 'phone',


    ],

    'validationsStore' => [

        'name' => 'required',
        'address' => 'required',
        'email' => 'required',
        'phone' => 'required',


    ],

    'validationsUpdate' => [
        'name' => 'required',
        'address' => 'required',
        'email' => 'required',
        'phone' => 'required'

    ],


    'export' => [
        'Nombre' => 'name',
        'Cuit' => 'cuit',
        'Dirección' => 'address',
        'Email' => 'email',
        'Medio de pago' => ['providers_payments','name'],
    ]
];
