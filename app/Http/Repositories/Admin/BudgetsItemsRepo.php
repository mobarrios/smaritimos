<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Budgets;
use App\Entities\Admin\BudgetsItems;
use App\Http\Repositories\BaseRepo;


class BudgetsItemsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new BudgetsItems();
    }

   
}