<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Colors;
use App\Http\Repositories\BaseRepo;


class ColorsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Colors();
    }
    

}