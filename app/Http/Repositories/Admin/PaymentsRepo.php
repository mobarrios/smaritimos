<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Payments;
use App\Http\Repositories\BaseRepo;


class PaymentsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Payments();
    }

}