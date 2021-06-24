<?php
namespace App\Http\Repositories\Configs;

use App\Http\Repositories\BaseRepo;
use App\Entities\Configs\Permission;

class PermissionsRepo extends BaseRepo {

    protected $is_brancheable   =  false;
    protected $is_imageable     =  false;
    protected $is_logueable     =  true;
    
    public function getModel(){
        return new Permission();
    }


    public function getColumnSearch(){

        return ['Nombre'=>'name','Slug'=>'slug','Descripción'=>'description'];
    }

    public function getPermissonsByRoles(){

        return $this->attributes['created_at'];
    }


    public function getConfig(){

        return [
            //nombre de la seccion
            'sectionName' => 'Permisos',

            //routes
            'indexRoute'    => 'configs.permissions.index',
            'storeRoute'    => 'configs.permissions.store',
            'createRoute'   => 'configs.permissions.create',
            'showRoute'     => 'configs.permissions.show',
            'editRoute'     => 'configs.permissions.edit',
            'updateRoute'   => 'configs.permissions.update',
            'destroyRoute'  => 'configs.permissions.destroy',

            //urls
            'destroyUrl' => 'configs/permissions/destroy/',

            //views
            'storeView' =>  'configs.permissions.form',
            'editView'  =>  'configs.permissions.form',

        ];
    }

}