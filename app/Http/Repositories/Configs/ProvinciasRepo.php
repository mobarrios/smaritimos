<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\Provincias;
use App\Http\Repositories\BaseRepo;

class ProvinciasRepo extends BaseRepo {

    public function getModel()
    {
        return new Provincias();
    }


   


}