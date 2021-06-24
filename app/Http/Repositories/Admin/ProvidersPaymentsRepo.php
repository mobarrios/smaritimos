<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\ProvidersPayments;
use App\Http\Repositories\BaseRepo;


class ProvidersPaymentsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new ProvidersPayments();
    }



}