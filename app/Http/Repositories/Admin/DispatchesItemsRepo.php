<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\DispatchesItems;
use App\Http\Repositories\BaseRepo;


class DispatchesItemsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new DispatchesItems();
    }
    
}