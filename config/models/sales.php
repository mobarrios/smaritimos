<?php

$model = 'sales';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Ventas',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'storeRecibosRoute'  => 'admin.'.$model.'.storeRecibos',
    'deleteRecibosRoute'  => 'admin.'.$model.'.deleteRecibos',



    'postStoreRoute'  => 'admin.'.$model.'.edit',
    'postUpdateRoute' => 'admin.'.$model.'.edit',

    'exportPdfRoute' => 'admin.'.$model.'.pdf',

    //addItems
    'addItemsRoute'  => 'admin.'.$model.'.addItems',
    'createItemsRoute'=> 'admin.'.$model.'.createItems',
    'editItemsRoute'  => 'admin.'.$model.'.editItems',
    'updateItemsRoute'  => 'admin.'.$model.'.updateItems',
    'deleteItemsRoute'  => 'admin.'.$model.'.deleteItems',

    'addPayMethodsRoute'  => 'admin.'.$model.'.addPayment',
    'editPayMethodsRoute'  => 'admin.'.$model.'.editPayment',
    'updatePayMethodsRoute'  => 'admin.'.$model.'.updatePayment',
    'deletePayMethodsRoute'  => 'admin.'.$model.'.deletePayment',


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
        
            'Numero'    => 'number',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email',
    ],

    'validationsStore' => [
            'clients_id'          => 'required|exists:clients,id',
    ],

    'validationsUpdate' => [

            'clients_id'          => 'exists:clients,id',
            'date_confirm'     => 'required',

    ],
];
