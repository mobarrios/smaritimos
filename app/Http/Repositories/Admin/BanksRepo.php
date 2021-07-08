<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Banks;
use App\Entities\Admin\Checkbooks;
use App\Http\Repositories\BaseRepo;


class BanksRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Banks;
    }


}