<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Financials;
use App\Http\Repositories\BaseRepo;


class FinancialsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Financials();
    }

    public function getAllWithDues(){
        return $this->model->with('FinancialsDues')->get();
    }

}