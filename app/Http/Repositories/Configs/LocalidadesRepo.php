<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\Localidades;
use App\Http\Repositories\BaseRepo;

class LocalidadesRepo extends BaseRepo {

    public function getModel()
    {
        return new Localidades();
    }


}