<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Providers;
use App\Http\Repositories\BaseRepo;


class ProvidersRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Providers();
    }



}