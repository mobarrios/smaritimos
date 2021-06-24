<?php

namespace App\Entities\Configs;

use App\Entities\EntityUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Support\Facades\Hash;

class User extends EntityUser implements AuthenticatableContract,  CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','name', 'last_name','email', 'password','branches_active_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $section = 'users';

    protected $hidden = ['password', 'remember_token'];


    /*public function __construct()
    {
        DB::setDefaultConnection('mysql');

        Config::set('database.connections.mysql.database', env('DB_DATABASE_USERS'));
    }*/

    public function images()
    {
        return $this->morphOne('App\Entities\Configs\Images','imageable');
    }


    public function BranchesActive()
    {
        return $this->belongsTo('App\Entities\Configs\Branches','branches_active_id');
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['last_name'] .' '.$this->attributes['name'] ;
    }

    public function Roles()
    {
        return $this->belongsToMany('App\Entities\Configs\Role','role_user');
    }


    public function setPasswordAttribute($pass){

        if(!empty($pass))
            $this->attributes['password'] = Hash::make($pass);
        else
            $this->attributes['password']  = $this->attributes['password'] ;
    }

    public function getBranchName()
    {

        foreach($this->brancheables as $branch)
        {
            $arr[$branch->branches->id]  =  $branch->branches->name;
        }

        return $arr ;
    }

}
