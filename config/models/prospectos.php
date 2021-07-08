<?php

$model = 'prospectos';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Prospectos',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.edit',

    //urls
    'destroyUrl' => 'admin/'.$model.'/destroy/',

    //views
    'storeView' =>  'admin.'.$model.'.form',
    'editView'  =>  'admin.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => false,
    'is_brancheable'    => false,


    //column search
    'search' => [

        'Dni' => 'dni',
        'Nombre' => 'name',
        'Apellido' => 'last_name',
        'Email' => 'email',
    ],

    'validationsStore' => [

        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
    ],

    'validationsUpdate' => [

        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
    ],

    'export' => [
        'nombre' => 'name',
        'Apellido' => 'last_name',
        'Email' => 'email',
        'DNI' => 'dni',
        'telefono' => 'phone1',
        'Dirección' => 'address',
        'Localidad' => ['localidades','name'],
    ]

];
