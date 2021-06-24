<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Budgets;
use App\Http\Repositories\BaseRepo;


class BudgetsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Budgets();
    }


    public function findByClients($clients_id)
    {
        return $this->getModel()->with('Brancheables')->where('clients_id',$clients_id)->get();
    }
   
}