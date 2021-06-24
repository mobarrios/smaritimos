<?php

$model = 'purchasesOrders';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Pedidos de Mercadería',

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
    'is_brancheable'    => true,
    

    //column search
    'search' => [
        
            'Numero'    => 'id',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email',
    ],

    'validationsStore' => [

        'date' => 'required',
        'providers_id' => 'required',
        //'quantity' => 'required',
        //'models_id' => 'required',
        //'price' => 'required',
    ],

    'validationsUpdate' => [

        'date' => 'required',
        'providers_id' => 'required',
        //'quantity' => 'required',
        //'models_id' => 'required',
        //'price' => 'required',

    ],


    'export' => [
        'Fecha' => 'date',
        'Nombre' => 'name',
        'Estado' => 'status',
        'Proveedor' => ['providers','name'],
        'Usuario' => ['users','fullname'],
    ]

];
