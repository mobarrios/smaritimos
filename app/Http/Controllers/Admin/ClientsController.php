<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Configs\Branches;
use App\Entities\Configs\Localidades;
use App\Entities\Admin\Budgets;
use App\Entities\Admin\Clients;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\IvaConditionsRepo;
use App\Http\Repositories\Configs\LocalidadesRepo;
use App\Http\Repositories\Configs\ProvinciasRepo;
use App\Http\Repositories\Admin\BudgetsRepo;
use App\Http\Repositories\Admin\ClientsRepo as Repo;
use App\Http\Repositories\Admin\TechnicalServicesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ClientsController extends Controller
{
    protected $technicalServicesRepo;

    public function  __construct(Request $request, Repo $repo, Route $route, BudgetsRepo $budgetsRepo,
                                IvaConditionsRepo $ivaConditionsRepo, ProvinciasRepo $provinciasRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->externalRepo     = $budgetsRepo;
        $this->route    = $route;



        $this->section          = 'clients';

        if(\Illuminate\Support\Facades\Request::segment(2) == 'prospectos')
            $this->data['section']  = 'prospectos';
        else
            $this->data['section']  = $this->section;

        $this->data['ivaConditions'] = $ivaConditionsRepo->ListsData('name','id');

        $this->data['localidades'] = [];

    }

    public function index()
    {

        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        //si request de busqueda
        if( isset($this->request->search) && !is_null($this->request->filter))
        {
            if(\Illuminate\Support\Facades\Request::segment(2) == $this->section)
                $model = $this->repo->searchWhere($this->request,['prospecto' => 0]);
            else
                $model = $this->repo->searchWhere($this->request,['prospecto' => 1]);

            if(is_null($model) || $model->count() == 0){

                //si paso la seccion
                if(\Illuminate\Support\Facades\Request::segment(2) == $this->section)
                    $model = $this->repo->listAllWhere($this->section,['prospecto' => 0]);
                else
                    $model = $this->repo->listAllWhere($this->section,['prospecto' => 1]);

            }

        }else{
            if(\Illuminate\Support\Facades\Request::segment(2) == $this->section)

                $model = $this->repo->listAllWhere($this->section,['prospecto' => 0]);
            else
                $model = $this->repo->listAllWhere($this->section,['prospecto' => 1]);

        }
       
        //guarda en session lo que se busco para exportar
//        Session::put('export',collect(['model' => $model->get(), 'section' => config('models.'.$this->section.'.sectionName'),'company' => Branches::find(Auth::user()->branches_active_id)->company]));

        Session::put('export', ['model' => $this->repo->getModel()->getClass(),'section' => config('models.'.$this->section.'.sectionName')]);


        //pagina el query
        $this->data['models'] = $model->paginate(config('models.'.$this->section.'.paginate'));


        if(\Illuminate\Support\Facades\Request::segment(2) == $this->section){
            //return view($this->getConfig()->indexRoute)->with($this->data);
            return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);

        }else
            return view('admin.clients.prospectosIndex')->with($this->data);

    }


    public function store()
    {
        if(!$this->request->get('budgets')) {
            //validar los campos
            $this->validate($this->request, config('models.' . $this->data['section'] . '.validationsStore'));
            //crea a traves del repo con el request
            if($this->data['section'] == 'prospectos')
                $model = $this->repo->create($this->request,1);
            else
                $model = $this->repo->create($this->request,0);



            if(str_contains(URL::previous(),'sales'))
                return redirect()->back()->with('client',$model)->withErrors(['Cliente creado Correctamente']);
            else
                return redirect()->route(config('models.' . $this->data['section'] . '.postStoreRoute'), $model->id)->withErrors(['Regitro Agregado Correctamente']);

        }else{

            //validar los campos
            $this->validate($this->request,config('models.prospectos.validationsStore'));

            //crea a traves del repo con el request
            $model = $this->repo->create($this->request,1);


            if($this->data['section'] == 'technicalServices'){

                $technicalService = $this->technicalServicesRepo->create(collect(['clients_id' => $model->id]));

                return redirect()->route(config('models.technicalServices.createRoute'),$technicalService->id);
            }else{

                $budget = $this->externalRepo->create(collect(['date' => date('Y-m-d H:i:s',time()),'clients_id' => $model->id]));

                return redirect()->route(config('models.budgets.createRoute'),$budget->id);
            }
        }
    }

    public function edit()
    {

            //breadcrumb activo
        $this->data['activeBread'] = 'Editar';

        // id desde route
        $id = $this->route->getParameter('id');

        $this->data['models'] = $this->repo->find($id);

        if($this->data['models']->localidades_id){

            $localidades = Localidades::find($this->data['models']->localidades_id);

            $this->data['localidades'] = [$localidades->id => $localidades->Municipios->Provincias->name . ' - ' . $localidades->Municipios->name . ' - ' . $localidades->name];
        }


        return view(config('models.'.$this->section.'.editView'))->with($this->data);
    }

    public function update()
    {
        if (!$this->request->get('budgets')){

            //validar los campos
            $this->validate($this->request, config('models.' . $this->data['section'] . '.validationsUpdate'));

            $id = $this->route->getParameter('id');
    
            //edita a traves del repo
            if(str_contains(URL::previous(),'sales'))
                $this->request['prospecto'] = 0;

            $model = $this->repo->update($id, $this->request);
    


            if(str_contains(URL::previous(),'sales'))
                return redirect()->back()->with('client',$model)->withErrors(['Cliente editado Correctamente']);
            else
                return redirect()->route(config('models.' . $this->data['section'] . '.postUpdateRoute'), $model->id)->withErrors(['Regitro Editado Correctamente']);
        }else{
            //validar los campos
            $this->validate($this->request,config('models.prospectos.validationsUpdate'));

            $id = $this->route->getParameter('id');

            //edita a traves del repo
            $model = $this->repo->update($id,$this->request);

            

            if($this->data['section'] == 'technicalServices'){

                $technicalService = $this->technicalServicesRepo->create(collect(['clients_id' => $this->request->get('model')]));

                return redirect()->route(config('models.technicalServices.createRoute'),$technicalService->id);

            }else{

                $budget = $this->externalRepo->create(collect(['date' => date('Y-m-d H:i:s',time()),'clients_id' => $this->request->get('model')]));

                return redirect()->route(config('models.budgets.createRoute'),$budget->id);
            }

        }
    }

    public function show($id, Localidades $localidades)
    {
        $model = $this->repo->find($id);
//
//        if($model && $model->localidades_id){
//            $localidad = $localidades->find($model->localidades_id);
////        dd($model->Municipios);
//            $model->localidades = $localidad->Municipios->Provincias->name .' - '. $localidad->Municipios->name . ' - '. $localidad->name;
//
//        }

        return [
                'fullName' => $model->fullName,
                'last_name' => $model->last_name,
                'name' => $model->name,
                'dni' => $model->dni,
                'email' => $model->email,
                'sexo' => $model->sexo,
                'nacionality' => $model->nacionality,
                'phone1' => $model->phone1,
                'address' => $model->address,
                'city' => $model->city,
                'location' => $model->location,
                'localidades' => $model->localidades->name,
                'province' => $model->province,
                'localidades_id' => $model->localidades_id,
                'dir' => $model->full_address,
                'iva_conditions_id' => $model->iva_conditions_id,
            ];

//        return [
//                'fullName' => $model->fullName,
//                'dni' => $model->dni,
//                'dir' => $model->full_address,
//                'mail' => $model->email,
//            ];
    }



}
