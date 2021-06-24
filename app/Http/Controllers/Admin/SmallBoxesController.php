<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\PaymentsRepo;
use App\Http\Repositories\Admin\SmallBoxesRepo as Repo;
use App\Http\Repositories\Admin\ProvidersRepo;
use App\Http\Repositories\Admin\TypesSmallBoxesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class SmallBoxesController extends Controller
{
    protected  $paymentsRepo ;
    public function __construct(Request $request, Repo $repo, Route $route, ProvidersRepo $providersRepo, TypesSmallBoxesRepo $typesSmallBoxesRepo, PaymentsRepo $paymentsRepo)
    {
        $this->paymentsRepo =  $paymentsRepo;
        $this->request = $request;
        $this->repo = $repo;
        $this->route = $route;

        $this->section = 'smallBoxes';
        $this->data['section'] = $this->section;

        // data
        $this->data['providers'] = $providersRepo->ListsData('name', 'id');
        $this->data['typesSmallBoxes'] = $typesSmallBoxesRepo->ListsData('name', 'id');
        $this->data['entry'] = $route->getParameter('type');


        if($this->request->providers_id == '')
            $this->request['providers_id'] = NULL ;

        $this->data['cashFromSales'] = $this->paymentsRepo->ListAll()->get();

    }



//    public function index()
//    {
//        $type = $this->route->getParameter('type');
//
//        //breadcrumb activo
//        $this->data['activeBread'] = 'Listar';
//
//        //si request de busqueda
//        if (isset($this->request->search) && !is_null($this->request->filter)) {
//            $model = $this->repo->search($this->request);
//
//            if (is_null($model) || $model->count() == 0)
//                //si paso la seccion
//                $model = $this->repo->listAll($this->section);
//
//        } else {
//            $model = $this->repo->listAll($this->section);
//        }
//
//
//        if($type == 1)
//            $this->data['cashFromSales'] = $this->paymentsRepo->ListAll()->get();
//
//
//
//
//        //guarda en session lo que se busco para exportar
//        Session::put('export', $model->get());
//
//        $this->data['entry'] = $this->route->getParameter('type');
//
//        //pagina el query
//        //$this->data['models'] = $model->where('entry', $this->route->getParameter('type'))->paginate(config('models.' . $this->section . '.paginate'));
//
//        $this->data['models'] =  $model;
//
//        //return view($this->getConfig()->indexRoute)->with($this->data);
//        return view(config('models.' . $this->section . '.indexRoute'))->with($this->data);
//    }


//
//    public function store()
//    {
//        //validar los campos
//        $this->validate($this->request, config('models.' . $this->section . '.validationsStore'));
//
//        if($this->request->providers_id == '')
//            $this->request['providers_id'] = NULL ;
//
//        //crea a traves del repo con el request
//        $model = $this->repo->create($this->request);
//
//        return redirect()->route(config('models.' . $this->section . '.postStoreRoute'), [$this->request['entry'], $model->id])->withErrors(['Regitro Agregado Correctamente']);
//    }
//
//    //post de editar
//    public function update()
//    {
//        //validar los campos
//        $this->validate($this->request, config('models.' . $this->section . '.validationsUpdate'));
//
//        if($this->request->providers_id == '')
//            $this->request['providers_id'] = NULL ;
//
//
//        $id = $this->route->getParameter('id');
//
//        //edita a traves del repo
//        $model = $this->repo->update($id, $this->request);
//
//
//
//        return redirect()->route(config('models.' . $this->section . '.postUpdateRoute'), [$this->request['entry'], $model->id])->withErrors(['Regitro Editado Correctamente']);
//    }


}
