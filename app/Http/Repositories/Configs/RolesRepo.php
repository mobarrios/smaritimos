<?php
namespace App\Http\Repositories\Configs;

use App\Http\Repositories\BaseRepo;
use App\Entities\Configs\Role;


class RolesRepo extends BaseRepo {

    protected $is_brancheable   =  false;
    protected $is_imageable     =  false;
    protected $is_logueable     =  true;

    public function getModel()
    {
        return new Role();
    }


    public function create($data)
    {
        $model =  parent::create($data);

        $model->attachPermission($data->request->all()['permissions_id']);

        return $model;
    }


    public function update($id, $data)
    {
        $model = parent::update($id, $data);

        $model->detachAllPermissions();

        $model->attachPermission($data->request->all()['permissions_id']);

        return $model;
    }
    


}