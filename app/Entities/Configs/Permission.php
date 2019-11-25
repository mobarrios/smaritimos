<?php

namespace App\Entities\Configs;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Permission extends \Bican\Roles\Models\Permission
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

    public function getPermissonsByRoles($role){

        return $this->Roles->where('slug',$role)->count();
    }

//    //Polymorph
//    public function logs()
//    {
//        return $this->morphMany('App\Entities\Configs\Logs','logeable');
//    }

}