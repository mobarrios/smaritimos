<?php
namespace App\Http\Repositories\Configs;


use App\Entities\Configs\Additionals;
use App\Http\Repositories\BaseRepo;


class AdditionalsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Additionals();
    }

}