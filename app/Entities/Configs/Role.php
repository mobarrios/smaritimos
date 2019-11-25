<?php

namespace App\Entities\Configs;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Role extends \Bican\Roles\Models\Role
{

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //if(Auth::check())
        //{
        // DB::setDefaultConnection('mysql');
        Config::set('database.connections.mysql.database', Auth::user()->db);
        //}
    }


    public function getPermissionsIdAttribute()
    {
        return $this->Permissions->lists('id')->toArray();
    }

//    //Polymorph
//    public function logs()
//    {
//        return $this->morphMany('App\Entities\Configs\Logs','logeable');
//    }

}