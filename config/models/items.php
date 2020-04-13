<?php

$model = 'items';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Stock',

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
    'is_brancheable'    => true,
    

    //column search
    'search' => [
        
            'NSerie'    => 'n_serie',
            'Modelo'     => ['models','name'],
            'Deposito'   => ['branches','name'],
    ],

    'validationsStore' => [

            'models_id'          => 'required',
           // 'address'     => 'required',

    ],

    'validationsUpdate' => [

            'models_id'          => 'required',
            //'address'     => 'required',

    ],


    'export' => [
         'COD' => 'id',
         'NSerie' => 'n_serie',
         'Estado' => 'status',
         'Modelo' => ['models', 'name'],
         'FEmision' => 'f_emision',
         'FVto' => 'f_vencimiento',
         'Cap.' => 'capacidad',
         'Tipo Cap.' => 'items_capacidad_tipo_id',
         'Obs' => 'obs',
         'Deposito' => 'branches',
         'Empresa' => ['Company','razon_social']

    ]
];
