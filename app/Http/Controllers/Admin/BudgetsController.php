<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Configs\Branches;
use App\Entities\Configs\Localidades;
use App\Entities\Admin\Budgets;
use App\Entities\Admin\BudgetsItems;
use App\Entities\Admin\Clients;
use App\Entities\Admin\Colors;
use App\Entities\Admin\Models;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\AdditionalsRepo;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\BudgetsItemsRepo;
use App\Http\Repositories\Admin\BudgetsRepo as Repo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\FinancialsRepo;
use App\Http\Repositories\Admin\ItemsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Configs\IvaConditionsRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class BudgetsController extends Controller
{
    protected $clients;
    protected $budgets;
    protected $models;

    public function  __construct(Request $request, Repo $repo, Route $route, BrandsRepo $brandsRepo, FinancialsRepo $financialsRepo,
                                 Clients $clients, Budgets $budgets, Models $models, BranchesRepo $branchesRepo, AdditionalsRepo $additionalsRepo,
                                 ColorsRepo $colorsRepo,IvaConditionsRepo $ivaConditionsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'budgets';
        $this->data['section']  = $this->section;

        $this->data['brands']       = $brandsRepo->getAllWithModels();
        $this->data['financials']   = $financialsRepo->getAllWithDues() ;
        $this->data['branches'] = $branchesRepo->ListsData('name', 'id');
        $this->data['colors'] = $colorsRepo->ListsData('name', 'id');

        $this->data['additionals'] = $additionalsRepo->ListsData('name','id');

        $this->data['ivaConditions'] = $ivaConditionsRepo->ListsData('name','id');

        $this->clients = $clients;
        $this->models = $models;
        $this->data['localidades'] = [];


    }

    public function indexProspectos($id = null){
        $this->data['budgets'] = $this->clients->find($id)->budgets;

        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        //si request de busqueda
        if( isset($this->request->search) && !is_null($this->request->filter))
        {
            $model = $this->repo->search($this->request);

            if(is_null($model) || $model->count() == 0)
                //si paso la seccion
                $model = $this->repo->listAll($this->section);

        }else{
            $model  = $this->repo->listAll($this->section);
        }

        //guarda en session lo que se busco para exportar
        Session::put('export', ['model' => $this->repo->getModel()->getClass(),'section' => config('models.'.$this->section.'.sectionName')]);

        //pagina el query
        $this->data['models'] = $model->paginate(config('models.'.$this->section.'.paginate'));

        //return view($this->getConfig()->indexRoute)->with($this->data);
        return view('moto.budgets.indexProspectos')->with($this->data);
    }


    public function findByClients()
    {
        $clients_id = $this->route->getParameter('id');

        $data = $this->repo->findByClients($clients_id);
        
        return response()->json($data);
    }


    public function create($id = null)
    {

        if($id)
        {
            $this->data['models'] = $this->repo->find($id);
            $this->data['items'] = $this->models->lists('name','id');
            $this->data['client'] = $this->data['models']->clients;

            if($this->data['client']->localidades_id){

                $localidades = Localidades::find($this->data['client']->localidades_id);

                $this->data['localidades'] = [$localidades->id => $localidades->Municipios->Provincias->name . ' - ' . $localidades->Municipios->name . ' - ' . $localidades->name];
            }
        }

        $this->data['prospectos'] = $this->clients->where('prospecto',1)->get();
               
        return parent::create();
    }

    public function edit($cliente = null, $id = null)
    {
        if($id){
            $this->data['models'] = $this->repo->find($id);
            $this->data['items'] = $this->models->lists('name','id');


        }

        $this->data['client'] = $this->clients->find($cliente);

        if($this->data['client']->localidades_id){

            $localidades = Localidades::find($this->data['client']->localidades_id);

            $this->data['localidades'] = [$localidades->id => $localidades->Municipios->Provincias->name . ' - ' . $localidades->Municipios->name . ' - ' . $localidades->name];
        }


        return parent::edit();
    }

    public function store()
    {
        
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        //crea a traves del repo con el request
        $model = $this->repo->create(collect(['date' => date('Y-m-d H:i:s',time()),'clients_id' => $this->request->get('clients_id')]));

        if($this->request->has('financials_dues_id'))
            $model->FinancialsDues()->attach($this->request->get('financials_dues_id'));

//        //guarda imagenes
//        if(config('models.'.$this->section.'.is_imageable'))
//            $this->createImage($model, $this->request);
//
//        //guarda log
//        if(config('models.'.$this->section.'.is_logueable'))
//            $this->repo->createLog($model, 1);
//
//        //si va a una sucursal
//        if(config('models.'.$this->section.'.is_brancheable'))
//            $this->repo->createBrancheables($model, $this->request->user()['branches_id']);

        $this->data['models'] = $model;

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),[$this->request->get('clients_id'),$model->id])->withErrors(['Registro Agregado Correctamente']);
        
    }

    public function update()
    {


        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        if($this->route->getParameter('id'))
            $id = $this->route->getParameter('id');
        else
            $id = $this->request->get('id');


        //edita a traves del repo
        $model = $this->repo->update($id,$this->request);
        if($this->request->has('financials_dues_id'))
            $model->FinancialsDues()->sync($this->request->get('financials_dues_id'));

        
//        //guarda imagenes
//        if(config('models.'.$this->section.'.is_imageable'))
//            $this->createImage($model, $this->request);
//
//        //guarda log
//        if(config('models.'.$this->section.'.is_logueable'))
//            $this->repo->createLog($model, 3);
//
//        //si va a una sucursal
//        if(config('models.'.$this->section.'.is_brancheable'))
//            $this->repo->createBrancheables($model, $this->request->all()['branches_id']);

        if($this->route->getParameter('id'))
            return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'),$model->id)->withErrors(['Regitro Editado Correctamente']);
        else{
//            return view('moto.emails.budgets',compact('model'));
            Mail::queue('moto.emails.budgets', ['model'=>$model] , function($message) use($model)
            {
                $message->from('info@motonet.com.ar');
                $message->to($model->Clients->email)->subject('Presupuesto solicitado')
                    ->replyTo(Auth::user()->email, Auth::user()->fullname);
            });

            return redirect()->route('moto.'.$this->section.'.pdf',$model->id);
        }

    }



//    public function addItems(BudgetsItemsRepo $budgetsItemsRepo)
//    {
//        $budgetsItemsRepo->create($this->request);
//
//        $this->data['client'] = $this->repo->find($this->route->getParameter('id'))->clients;
//
//        return redirect()->route('moto.'.$this->section.'.create',$this->route->getParameter('id'));
//    }

    public function addItems(ModelsRepo $modelsRepo)
    {
        $this->data['budgets'] =  $this->repo->find($this->route->getParameter('budgetsId'));

        // $this->data['id'] = $id;
        $this->data['activeBread'] = 'Agregar Item';

        return view('moto.budgets.modalItemsForm')->with($this->data);
    }

    public function createItems(BudgetsItemsRepo $budgetsItemsRepo, ModelsRepo $modelsRepo)
    {

        $model = $modelsRepo->find($this->request->models_id);

        $this->request['price_actual'] = $model->activeListPrice->price_list;

        $budget = $this->repo->find($this->request->budgets_id);

        $modelo = $this->models->find($this->request->models_id);


        if($modelo->is_moto)
        {
            if($budget->Clients->localidades->Registros->count() > 0)
            {

                if($budget->additionables->where('additionals_id',10)->count() == 0 && $budget->additionables->where('additionals_id',11)->count() == 0)
                {

                    $budget->additionables()->create(['additionals_id'=> 10 , 'amount' => $budget->Clients->localidades->Registros->first()->alta_patente_importe]);

                    $budget->additionables()->create(['additionals_id'=> 11 ,'amount' => $budget->Clients->localidades->Registros->first()->larga_distancia_importe]);

                }
            }
        }


        $budgetsItemsRepo->create($this->request->all());

        // agrega los adicionales del modelo con los nuevos importes o no
        if($this->request->has('additionals')){
            foreach ($this->request->additionals as $id => $amount )
            {
                $budget->additionables()->create(['additionals_id'=>$id , 'amount' => $amount]);
            }
        };


        return redirect()->route('moto.budgets.edit', [$budget->clients->id,$this->request->budgets_id])->withErrors('Se agregó correctamente el item');

    }

    public function editItems(BudgetsItemsRepo $budgetsItemsRepo)
    {
        $this->data['activeBread'] = 'Editar Item';

        $this->data['budgetsItems'] = $budgetsItemsRepo->find($this->route->getParameter('item'));
        $this->data['budgets'] = $this->repo->find($this->route->getParameter('budgetsId'));


//        dd($this->data['budgetsItems']->models->modelsByColors);
        //$this->data['route'] = ['moto.sales.updateItems', $this->route->getParameter('item'), $this->route->getParameter('id')];

        return view('moto.budgets.modalItemsForm')->with($this->data);

    }


    public function updateItems($item = null,$id,BudgetsItemsRepo $budgetsItemsRepo)
    {

        //edita a traves del repo
        $model = $budgetsItemsRepo->find($id);
        $model->update($this->request->all());

//        //guarda imagenes
//        if(config('models.'.$this->section.'.is_imageable'))
//            $this->createImage($model, $this->request);
//
//        //guarda log
//        if(config('models.'.$this->section.'.is_logueable'))
//            $budgetsItemsRepo->createLog($model, 3);

        //si va a una sucursal
//        if(config('models.'.$this->section.'.is_brancheable'))
//            $budgetsItemsRepo->createBrancheables($model, $this->request->all()['branches_id']);


        $this->data['activeBread'] = 'Editar';

        $this->data['items'] = $this->models->lists('name','id');

        $this->data['client'] = $this->repo->find($item)->clients;

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$item)->withErrors(['Registro modificado Correctamente']);
    }

    public function deleteItems($item = null,$id,BudgetsItemsRepo $budgetsItemsRepo)
    {

        $budgetsItemsRepo->destroy($item);

        $this->data['activeBread'] = 'Editar';

        $this->data['items'] = $this->models->lists('name','id');

        $this->data['client'] = $this->repo->find($item)->clients;

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$item)->withErrors(['Registro eliminado Correctamente']);
    }


    public function showAside(Request $request,BudgetsItemsRepo $budgetsItemsRepo){


        $this->data['routeItems'] = ['moto.'.$this->section.'.addItem', $request->get('model')];

        if($request->get('edit')){
            foreach ($request->get('edit') as $type => $id){
                if($type == 'items'){
                    $this->data['modelItems'] = $budgetsItemsRepo->find($id);
                    $this->data['colors'] = $this->data['modelItems']->models->StockByColors;
                }
            }

            $this->data['routeItems'] = ['moto.'.$this->section.'.editItem', $request->get('model'), $this->data['modelItems']];
        }


        $this->data['hidden'] = $request->hidden;
        $this->data['type'] = $request->type;

        return view('moto.aside.items')->with($this->data);

    }

    // ajax

    public function budgetsClients()
    {
        $id = $this->route->getParameter('id');
        $data = $this->repo->find($id)->clients_id;

        return response()->json($data);
    }

    public function budget()
    {
        $id = $this->route->getParameter('id');
        $data = $this->repo->getModel()->with('allItems')->find($id);

        return response()->json($data);
    }
}
