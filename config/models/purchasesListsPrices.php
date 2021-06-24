<?php

$model = 'purchasesListsPrices';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Lista de Precios Compra',

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
    'is_imageable'      => false,
    'is_brancheable'    => false,
    

    //column search
    'search' => [

        'Nombre' => 'name',
        'Direccion' => 'address'


    ],

    'validationsStore' => [

        'number' => 'required',
        //'providers_id' => 'required'


    ],

    'validationsUpdate' => [
        'number' => 'required',
       //'providers_id' => 'required'


    ],

    'export' => [
        'Nombre' => 'name',
        'Estado' => 'status',
        'Proveedor' => ['providers','name'],
    ]

];
