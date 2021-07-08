<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Charges;
use App\Http\Repositories\BaseRepo;


class ChargesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Charges();
    }

}