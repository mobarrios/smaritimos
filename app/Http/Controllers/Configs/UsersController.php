<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Configs\RolesRepo;
use App\Http\Repositories\Configs\UsersRepo as Repo;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function  __construct(Repo $repo, Route $route , RolesRepo $rolesRepo , Request $request, BranchesRepo $branchesRepo)
    {

        $this->request      = $request;
        $this->repo         = $repo;
        $this->route        = $route;
        $this->rolesRepo    = $rolesRepo;
        $this->section      = 'users';


        //data select
        $this->data['roles']    = $rolesRepo->listsData('name','id');
        $this->data['branches'] = $branchesRepo->listsData('name', 'id');

        $this->data['section'] = $this->section;

    }



    public function changeBranchesActive()
    {
        $user = $this->repo->find(Auth::user()->id);
        $user->branches_active_id = $this->route->getParameter('branches_id');
        $user->save();

        return redirect()->back()->withErrors(['Sucursal Cambiada Correctamente.']);
    }


    // post de create
    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));


        //comienza ACTIVO en la primer sucursal q selecciona
        $this->request['branches_active_id'] =  $this->request->branches_id[0];

        //crea a traves del repo con el request

        $model = $this->repo->create($this->request);




        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);
    }





    //post de editar
    public function update()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        $id = $this->route->getParameter('id');

        //comienza ACTIVO en la primer sucursal q selecciona
        $this->request['branches_active_id'] =  $this->request->branches_id[0];

        //edita a traves del repo
        $model = $this->repo->update($id,$this->request);

        //guarda imagenes
        //if(config('models.'.$this->section.'.is_imageable'))
        //    $this->createImage($model, $this->request);

        //guarda log
        //if(config('models.'.$this->section.'.is_logueable'))
        //    $this->repo->createLog($model, 3);

        //si va a una sucursal
        $this->repo->createBrancheables($model, $this->request->branches_id);


        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'),$model->id)->withErrors(['Regitro Editado Correctamente']);
    }
}
