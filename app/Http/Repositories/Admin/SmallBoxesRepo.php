<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\SmallBoxes;
use App\Http\Repositories\BaseRepo;


class SmallBoxesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new SmallBoxes;
    }


}