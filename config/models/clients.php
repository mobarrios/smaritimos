<?php

$model = 'clients';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Clientes',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.index',
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

        'Dni' => 'dni',
        'Nombre' => 'name',
        'Apellido' => 'last_name',
        'Email' => 'email',
    ],

    'validationsStore' => [
        'dni'=> 'required|unique:clients,dni|digits_between:7,8',
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'localidades_id' => 'required',
        'iva_conditions_id'=>'required',
        //'city' => 'required',
        //'province' => 'required',
    ],

    'validationsUpdate' => [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'localidades_id' => 'required',
        'iva_conditions_id'=>'required',

        //'city' => 'required',
        //'province' => 'required',
    ],

    'export' => [
        'Nombre' => 'name',
        'Apellido' => 'last_name',
        'Email' => 'email',
        'DNI' => 'dni',
        'telefono' => 'phone1',
        'Dirección' => 'address',
        'Localidad' => ['localidades','name'],
    ]

];
