<?php

namespace App\Http\Repositories\Admin;

use App\Entities\Admin\PayMethods;
use App\Http\Repositories\BaseRepo;

class PayMethodsRepo extends BaseRepo {

    public function getModel()
    {
        return new PayMethods();
    }





}