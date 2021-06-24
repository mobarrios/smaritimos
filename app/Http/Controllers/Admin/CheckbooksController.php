<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\CompanyRepo;
use App\Http\Repositories\Admin\BanksRepo;
use App\Http\Repositories\Admin\CheckbooksRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;


class CheckbooksController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, BanksRepo $banksRepo,  CompanyRepo $companyRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'checkbooks';
        $this->data['section']  = $this->section;

        // data
        $this->data['banks'] = $banksRepo->ListsData('name','id');
        $this->data['company'] = $companyRepo->ListsData('razon_social','id');

        $this->data['types'] = config('models.'.$this->section.'.types');
    }

    public function index()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        //si request de busqueda
        if( isset($this->request->search) && !is_null($this->request->filter))
        {
            $model = $this->repo->search($this->request);

            if(is_null($model) || $model->count() == 0)
                //si paso la seccion
                $model = $this->repo->listAll($this->section);
        }
        else
        {
            $model  = $this->repo->listAll($this->section);
        }


        //guarda en session lo que se busco para exportar
        Session::put('export', ['model' => $this->repo->getModel()->getClass(),'section' => config('models.'.$this->section.'.sectionName')]);

        //pagina el query
        $this->data['models'] = $model->groupBy('n_chequera')->paginate(config('models.'.$this->section.'.paginate'));

        //return view($this->getConfig()->indexRoute)->with($this->data);
        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);
    }


    public function show()
    {
        $this->data['activeBread'] = 'Cheques';
        $nro = $this->repo->find($this->route->getParameter('id'));
        $this->data['cheques'] = $this->repo->getModel()->where('n_chequera',$nro->n_chequera )->get();

        return view('moto.checkbooks.detail')->with($this->data);
    }
}
