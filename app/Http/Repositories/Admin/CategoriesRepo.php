<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Categories;
use App\Http\Repositories\BaseRepo;


class CategoriesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Categories();
    }
    

}