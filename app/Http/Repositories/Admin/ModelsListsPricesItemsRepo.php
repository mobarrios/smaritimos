<?php
namespace App\Http\Repositories\Admin;


use App\Entities\Admin\ModelsListsPricesItems;
use App\Http\Repositories\BaseRepo;


class ModelsListsPricesItemsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new ModelsListsPricesItems();
    }

    public function createParam($data)
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();

        return $model;
    }


}