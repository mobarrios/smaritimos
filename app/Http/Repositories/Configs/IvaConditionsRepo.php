<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\IvaConditions;
use App\Http\Repositories\BaseRepo;

class IvaConditionsRepo extends BaseRepo {

    public function getModel()
    {
        return new IvaConditions();
    }
    


}