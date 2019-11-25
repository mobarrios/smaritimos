<?php

$model = 'vouchers';

return [

    'paginate' => '50',

    //nombre de la seccion
    'sectionName' => 'Comprobantes',

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
    'is_imageable' => false,
    'is_brancheable' => true,


    //column search
    'search' => [

        'Número' => 'numero',
        //'Direccion'  => 'address' ,
        //'Email'     => 'email'
    ],

    'validationsStore' => [

        //'numero' => 'required',
        // 'address'     => 'required',

    ],

    'validationsUpdate' => [

        //'numero' => 'required',
        //'address'     => 'required',

    ],

    'tiposDocumento' =>
        [
            'DNI' => 'DNI',
            'CUIT' => 'CUIT',
            'CUIL' => 'CUIL'
        ],

    'tipos' =>
        [
            'F' => 'Factura',
            'C' => 'Nota de Crédito',
            'D' => 'Nota de Débito',
            'R' => 'Recibo'
        ]
    ,

    'letras' =>
        [
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'X' => 'X',
            'R' => 'R',
        ]
    ,


    'export' => [
        'Tipo' => 'type',
        'Letra' => 'letra',
        'Concepto' => 'concepto',
        'Punto de venta' => 'punto_venta',
        'Fecha' => 'fecha',
        'Total' => 'importe_total',
        'NNumero' => 'numero',
        'Cae' => 'cae',
        'Vto' => 'vencimiento_cae',
    ]
];
