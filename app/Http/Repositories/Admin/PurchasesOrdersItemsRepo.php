<?php
namespace App\Http\Repositories\Admin;


use App\Entities\Admin\PurchasesOrdersItems;
use App\Http\Repositories\BaseRepo;


class PurchasesOrdersItemsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new PurchasesOrdersItems();
    }


}