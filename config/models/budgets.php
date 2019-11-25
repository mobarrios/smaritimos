<?php

$model = 'budgets';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Presupuestos',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.create',
    'postUpdateRoute' => 'admin.'.$model.'.index',

    'exportPdfRoute' => 'admin.'.$model.'.pdf',

    //addItems
    'addItemsRoute'  => 'admin.'.$model.'.addItems',
    'createItemsRoute'=> 'admin.'.$model.'.createItems',
    'editItemsRoute'  => 'admin.'.$model.'.editItems',
    'updateItemsRoute'  => 'admin.'.$model.'.updateItems',
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
    'is_brancheable'    => true,
    

    //column search
    'search' => [
        
            'Nombre'    => 'name',
            'Direccion'  => 'address' ,
            //'Email'     => 'email',
    ],

    'validationsStore' => [

            'clients_id'     => 'required',

    ],

    'validationsUpdate' => [

        'clients_id'     => 'required',

    ],



    'asideItems' => [
                'models_id' => null,
                'colors_id' => null,
                'patentamiento' => 'disabled',
                'price_budget' => null,
                'pack_service' => 'disabled'
            ],


    'export' => [
        'Fecha' => 'date',
        'Usuario' => ['users', 'fullname'],
        'Clientes' => ['clients', 'fullname'],
        'Financiamiento' => 'a_financiar',
        'Total' => 'total'
    ]
];
