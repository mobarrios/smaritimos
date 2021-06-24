<?php

$model = 'financials';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Financiamientos',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.edit',
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
        
            'Nombre'    => 'name',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email',
    ],

    'validationsStore' => [

            'name'          => 'required',
            //'address'     => 'required',

    ],

    'validationsUpdate' => [

            'name'          => 'required',
            //'address'     => 'required',

    ],

    'export' => [
        'Nombre' => 'name',
        'Costo extra' => 'extra_cost',
    ]

];
