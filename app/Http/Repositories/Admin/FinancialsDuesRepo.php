<?php
namespace App\Http\Repositories\Admin;


use App\Entities\Admin\FinancialsDues;
use App\Http\Repositories\BaseRepo;


class FinancialsDuesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new FinancialsDues();
    }



}