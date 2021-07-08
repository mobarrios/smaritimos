<?php

$model = 'checkbooks';

return [

    'paginate' => '50',

    //nombre de la seccion
    'sectionName' => 'Chequera',

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

       // 'n_cheque' => 'required',
       // 'type' => 'required',

    ],

    'validationsUpdate' => [
       // 'n_cheque' => 'required',
      //  'type' => 'required',

    ],

    'types' => [
        0 => 'Propio',
        1 => 'De tercero'
    ],

    'export' => [
        'N° chequera' => 'n_chequera',
        'N° cheque' => 'n_cheque',
        'Monto' => 'amount',
        'Fecha de cobro' => 'payment_date',
        'Fecha de vto' => 'due_date',
        'Tipo' => 'type',
        'Banco' => ['banks_id', 'name'],
    ]

];
