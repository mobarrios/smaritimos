<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Configs\RolesRepo;
use App\Http\Repositories\Configs\ProfilesRepo as Repo;
use App\Http\Repositories\Configs\UsersRepo;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function  __construct(Repo $repo, Route $route , RolesRepo $rolesRepo , Request $request, BranchesRepo $branchesRepo,UsersRepo $usersRepo)
    {

        $this->request      = $request;
        $this->repo         = $repo;
        $this->usersRepo    = $usersRepo;
        $this->route        = $route;
        $this->rolesRepo    = $rolesRepo;
        $this->section      = 'profiles';

        //data select
        $this->data['roles']    = $rolesRepo->listsData('name','id');
        $this->data['branches'] = $branchesRepo->listsData('name', 'id');

        $this->data['section'] = $this->section;

    }

    public function index()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Perfil';

        $this->data['model'] = Auth::user();

        $this->data['avatares'] = config('models.'.$this->section.'.avatares');

        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);
    }

    public function update()
    {
        //validar los campos

        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        if($this->request->get('password_old') != null){
            if(!password_verify($this->request->get('password_old'),Auth::user()->password)){
                return redirect()->back()->withInput()->withErrors('La clave Anterior no coincide con la actual');
            }

            if(!$this->request->get('password')){
                return redirect()->back()->withInput()->withErrors('La clave es obligatoria si va a cambiarla');
            }
        }

        $id = $this->route->getParameter('id');

        //edita a traves del repo
        $model = $this->usersRepo->update($id,$this->request);
        //guarda imagenes
        if(config('models.'.$this->section.'.is_imageable'))
            $this->repo->createImageables($model, "images/avatares/".config('models.'.$this->section.'.avatares')[$this->request->get('image')].'.png');


        //guarda log
        if(config('models.'.$this->section.'.is_logueable'))
            $this->repo->createLog($model, 3);

        //si va a una sucursal
        //if(config('models.'.$this->section.'.is_brancheable'))
        //    $this->repo->createBrancheables($model, Auth::user()->branches_active_id);


        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'),$model->id)->withErrors(['Regitro Editado Correctamente']);
    }

}
