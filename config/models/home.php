<?php

$model = 'home';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Home',

    //routes
    'indexRoute'    => 'home',
    'storeRoute'    => 'configs.'.$model.'.store',
    'createRoute'   => 'configs.'.$model.'.create',
    'showRoute'     => 'configs.'.$model.'.show',
    'editRoute'     => 'configs.'.$model.'.edit',
    'updateRoute'   => 'configs.'.$model.'.update',
    'destroyRoute'  => 'configs.'.$model.'.destroy',
    
    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.index',

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
    'is_brancheable'    => true,



    //column search
    
    'search' => [
        
            'Nombre'    => 'name',
            'Apellido'  => 'last_name' ,
            'Email'     => 'email'
    ],

    'validationsStore' => [

            'email'         => 'required|unique:users,email|email',
            'name'          => 'required',
            'last_name'     => 'required',
            'password'      => 'required',
            'roles_id'      => 'required',
            'branches_id'   => 'required',
    ],

    'validationsUpdate' => [

            'name'          => 'required',
            'last_name'     => 'required',
            'roles_id'      => 'required',
            'branches_id'   => 'required',
    ],

];
