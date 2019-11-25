<?php
namespace App\Http\Repositories\Configs;


use App\Entities\Configs\Vouchers;
use App\Http\Repositories\BaseRepo;


class VouchersRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Vouchers();
    }
    

}