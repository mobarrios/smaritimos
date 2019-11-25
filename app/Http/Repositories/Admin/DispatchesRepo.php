<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Dispatches;
use App\Http\Repositories\BaseRepo;


class DispatchesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Dispatches();
    }

   
}