<?php

$model = 'company';

return [

    'paginate' => '50',

    //nombre de la seccion
    'sectionName' => 'Empresa',

    //routes
    'indexRoute' => 'configs.' . $model . '.index',
    'storeRoute' => 'configs.' . $model . '.store',
    'createRoute' => 'configs.' . $model . '.create',
    'showRoute' => 'configs.' . $model . '.show',
    'editRoute' => 'configs.' . $model . '.edit',
    'updateRoute' => 'configs.' . $model . '.update',
    'destroyRoute' => 'configs.' . $model . '.destroy',

    'postStoreRoute' => 'configs.' . $model . '.index',
    'postUpdateRoute' => 'configs.' . $model . '.index',

    //urls
    'destroyUrl' => 'configs/' . $model . '/destroy/',

    //views
    'storeView' => 'configs.' . $model . '.form',
    'editView' => 'configs.' . $model . '.form',

    //path
    'imagesPath' => 'uploads/' . $model . '/images/',

    //polymorphic
    'is_logueable' => true,
    'is_imageable' => true,
    'is_brancheable' => false,


    //column search
    'search' => [

        'Nombre' => 'name',
        'Direccion' => 'address',
        //'Email'     => 'email',
    ],

    'validationsStore' => [

        'nombre_fantasia' => 'required',
        'direccion' => 'required',
        'cuit' => 'required',

    ],

    'validationsUpdate' => [

        'nombre_fantasia' => 'required',
        'direccion' => 'required',
        'cuit' => 'required',

    ],


    'export' => [
        'Razon Social' => 'razon_social',
        'Nombre' => 'nombre_fantasia',
        'Dirección' => 'direccion',
        'Telefono' => 'telefono',
        'Cuit' => 'cuit',
        'IVA' => ['iva_conditions', 'name'],
        'Localidad' => ['localidades','name'],
    ]

];
