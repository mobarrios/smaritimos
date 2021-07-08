<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\Company;
use App\Http\Repositories\BaseRepo;

class CompanyRepo extends BaseRepo {

    public function getModel()
    {
        return new Company();
    }
    


}