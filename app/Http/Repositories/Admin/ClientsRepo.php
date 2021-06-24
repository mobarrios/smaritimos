<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Clients;
use App\Http\Repositories\BaseRepo;


class ClientsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Clients();
    }

    public function create($data,$prospecto = null)
    {
        $model = new $this->model();


         if($prospecto == 1)
             $data['prospecto'] = 1;
         else
             $data['prospecto'] = 0;


        $model->fill($data->all());

        $model->save();

        return $model;
    }


    public function update($id,$data)
    {
        $model = $this->model->find($id);

        $model->fill($data->all());

        $model->save();

        return $model;
    }


    public function prospectoToClient($id)
    {
        $model = $this->model->find($id);
        $model->prospecto = 0;
        $model->save();
        
    }

    public function salesWithItems($id){
        return $this->model->with('sales')->find($id);
    }


    public function listForSelect()
    {
        $list = [];

        foreach($this->model->orderBy('last_name', 'ASC')->get() as $client){
            $list[$client->id] = 'dni: ' . $client->dni . ' -  ' . $client->fullName . ' - ' . $client->email;
        }

        return $list;
    }

}