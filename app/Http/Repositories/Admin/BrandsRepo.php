<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Brands;
use App\Http\Repositories\BaseRepo;


class BrandsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Brands();
    }

    public function getAllWithModels(){
        return $this->model->with('Models')->get();
    }

}