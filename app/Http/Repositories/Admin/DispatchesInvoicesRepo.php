<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\DispatchesInvoices;
use App\Http\Repositories\BaseRepo;


class DispatchesInvoicesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new DispatchesInvoices();
    }

   
}