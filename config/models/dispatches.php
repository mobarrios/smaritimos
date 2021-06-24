<?php

$model = 'dispatches';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Remitos',

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

    //addItems
    'addItemsRoute'  => 'admin.'.$model.'.addItems',
    'editItemsRoute'  => 'admin.'.$model.'.editItems',
    'deleteItemsRoute'  => 'admin.'.$model.'.deleteItems',

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
        
            'Numero'    => 'number',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email',
    ],

    'validationsStore' => [

            'number'          => 'required',
            'date'     => 'required',

    ],

    'validationsUpdate' => [

            'number'          => 'required',
            'date'     => 'required',

    ],


    'export' => [
        'Fecha' => 'date',
        'Número' => 'number',
        'Proveedor' => ['providers', 'name'],
    ]

];
