<?php

$model = 'models';

return [

    'paginate' => '50',

    //nombre de la seccion
    'sectionName' => 'Modelos',

    //routes
    'indexRoute' => 'admin.' . $model . '.index',
    'storeRoute' => 'admin.' . $model . '.store',
    'createRoute' => 'admin.' . $model . '.create',
    'showRoute' => 'admin.' . $model . '.show',
    'editRoute' => 'admin.' . $model . '.edit',
    'updateRoute' => 'admin.' . $model . '.update',
    'destroyRoute' => 'admin.' . $model . '.destroy',

    'postStoreRoute' => 'admin.' . $model . '.index',
    'postUpdateRoute' => 'admin.' . $model . '.index',

    //urls
    'destroyUrl' => 'admin/' . $model . '/destroy/',

    //views
    'storeView' => 'admin.' . $model . '.form',
    'editView' => 'admin.' . $model . '.form',

    //path
    'imagesPath' => 'uploads/' . $model . '/images/',

    //polymorphic
    'is_logueable' => true,
    'is_imageable' => true,
    'is_brancheable' => false,


    //column search
    'search' => [

        'Nombre' => 'name',
        //'Direccion'  => 'address' ,
        //'Email'     => 'email'
    ],

    'validationsStore' => [

        'name' => 'required',
        //'types_id' => 'required',
        'categories_id' => 'required',
        'providers_id' => 'required',

    ],

    'validationsUpdate' => [

        'name' => 'required',
       // 'types_id' => 'required',
        'categories_id' => 'required',
        'providers_id' => 'required',

    ],


    'types' => [
        1 => 'admins',
        2 => 'Accesorios',
        3 => 'Repuestos',
    ],


    'export' => [
        'Nombre' => 'name',
        'Estado' => 'status',
        'Stock min.' => 'min_stock',
        'Marca' => ['brands','name'],
//        'Tipo' => ['types','name'],
    ]
];
