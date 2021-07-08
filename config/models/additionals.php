<?php

$model = 'additionals';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Adicionales',

    //routes
    'indexRoute'    => 'configs.'.$model.'.index',
    'storeRoute'    => 'configs.'.$model.'.store',
    'createRoute'   => 'configs.'.$model.'.create',
    'showRoute'     => 'configs.'.$model.'.show',
    'editRoute'     => 'configs.'.$model.'.edit',
    'updateRoute'   => 'configs.'.$model.'.update',
    'destroyRoute'  => 'configs.'.$model.'.destroy',

    'postStoreRoute'  => 'configs.'.$model.'.index',
    'postUpdateRoute' => 'configs.'.$model.'.index',

    //urls
    'destroyUrl' => 'configs/'.$model.'/destroy/',

    //views
    'storeView' =>  'configs.'.$model.'.form',
    'editView'  =>  'configs.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => true,
    'is_brancheable'    => false,
    

    //column search
    'search' => [
        
            'Nombre'    => 'name',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email'
    ],

    'validationsStore' => [

            'name'          => 'required',
           // 'address'     => 'required',

    ],

    'validationsUpdate' => [

            'name'          => 'required',
            //'address'     => 'required',

    ],

    'export' => [
        'Nombre' => 'name'
    ]

];
