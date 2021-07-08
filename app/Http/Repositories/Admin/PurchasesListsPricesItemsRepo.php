<?php
namespace App\Http\Repositories\Admin;


use App\Entities\Admin\PurchasesListsPricesItems;
use App\Http\Repositories\BaseRepo;


class PurchasesListsPricesItemsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new PurchasesListsPricesItems();
    }



}