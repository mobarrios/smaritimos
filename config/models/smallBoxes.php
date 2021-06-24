<?php

$model = 'smallBoxes';

return [

    'paginate' => '50',

    //nombre de la seccion
    'sectionName' => 'Caja chica',

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
    'is_brancheable' => true,


    //column search
    'search' => [

        'Nombre' => 'name',
        //'Direccion'  => 'address' ,
        //'Email'     => 'email'
    ],

    'validationsStore' => [

        'entry' => 'required',
        'date' => 'required',
        'amount' => 'required',
        'detail' => 'required',
        'types_small_boxes_id' => 'required',
        //'providers_id' => 'required',


    ],

    'validationsUpdate' => [


        'entry' => 'required',
        'date' => 'required',
        'amount' => 'required',
        'detail' => 'required',
        'types_small_boxes_id' => 'required',
        //'providers_id' => 'required',
    ],

    'entry' => [
        0 => 'Salida',
        1 => 'Entrada'
    ],


    'export' => [
        'Entrada' => 'entry',
        'Fecha' => 'date',
        'Monto' => 'amount',
        'Detalle' => 'detail',
        'Proveedor' => ['providers','name'],
        'Tipo' => ['types_small_boxes','name'],
    ]
];
