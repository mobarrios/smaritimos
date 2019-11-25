<?php
namespace App\Http\Repositories\Configs;

use App\Entities\Configs\User;
use App\Http\Repositories\BaseRepo;


class UsersRepo extends BaseRepo {
    
    public function getModel()
    {
        return new User;
    }

    public function create($data)
    {
        $model =  parent::create($data);

        $model->Roles()->attach($data->request->all()['roles_id']);

        return $model;
    }


   public function update($id, $data)
   {
      
       $model = parent::update($id, $data);

       $model->Roles()->sync([$data->request->all()['roles_id']]);

       return $model;
   }


    public function searchByEmail($email, $password)
    {
        return $this->model->where('email',$email)->where('password',$password)->first();
    }


    public function listMecanicos()
    {
        $data =  $this->model->whereHas('roles',function($q){
           $q->where('slug','mecanico');
        })->get();

        return $data->lists('fullName','id');
    }

    public function ListAll($section = null)
    {
        return $this->model;
    }
    

}