<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Configs\Additionables;
use App\Entities\Configs\Additionals;
use App\Entities\Configs\Brancheables;
use App\Entities\Configs\Localidades;
use App\Entities\Admin\Items;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\AdditionalsRepo;
use App\Http\Repositories\Admin\BudgetsRepo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Admin\FinancialsRepo;
use App\Http\Repositories\Admin\ModelsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class AjaxController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, ClientsRepo $clientsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->clientsRepo = $clientsRepo;
        $this->section          = 'brands';
        $this->data['section']  = $this->section;
    }


    public function findDues(FinancialsRepo $financialsRepo)
    {
        $id =  $this->route->getParameter('id');

        $data = $financialsRepo->find($id)->FinancialsDues;

        return response()->json($data);

    }

    public function modelAvailables()
    {
        $id =  $this->route->getParameter('id');
        $data = $this->repo->modelsByColors($id);
//        $data = $this->repo->stockByColors($id);

        return response()->json($data);
    }

    public function modelsLists()
    {
        $data = $this->repo->allToBudgets() ;

        return response()->json($data);
    }

    public function modelLists($id)
    {
        $data = $this->repo->oneToBudgets($id);

        return response()->json($data);
    }


    public function modelActualCost()
    {
        return $this->repo->actualPriceCost($this->route->getParameter('id'));
    }

    public function salesWithItems($id){
        return $this->clientsRepo->salesWithItems($id);
    }

    public function budgetsItems(BudgetsRepo $budgetsRepo,FinancialsRepo $financialsRepo,$id)
    {

//        $data = $budgetsRepo->find($id)->allItems()->with('brands')->get();
        $data = collect();
        $data->push(['price' => $budgetsRepo->find($id)->allItems()->with('brands')->get()->sum('pivot.price_budget'),'patentamiento' => $budgetsRepo->find($id)->allItems()->with('brands')->get()->sum('patentamiento'),'pack_service' => $budgetsRepo->find($id)->allItems()->with('brands')->get()->sum('pack_service')]);

        $data->push($budgetsRepo->find($id)->allItems()->with('brands')->get());

        return response()->json($data);
    }


    public function branchesWithStockByModels(){

        $branches  = [];

        foreach ($this->request->all() as $articulos){

            $items = Items::where('models_id', $articulos["modelo"])->where('colors_id',$articulos['color'])->get()->lists('id');

            $branches[] = Brancheables::where('entities_type', 'App\Entities\Moto\Items')->with('Branches')->whereIn('entities_id', $items)->get()->groupBy('branches_id');


        }


        $list = [];

        foreach ($branches as $branch){
            foreach ($branch as $b){
                if(count($list) > 0){
                    foreach($list as $id => $sucursal){
                        if($b->first()->Branches->id != $id){
                            $list[$b->first()->Branches->id] = $b->first()->Branches->name;
                        }

                    }
                }else{
                    $list[$b->first()->Branches->id] = $b->first()->Branches->name;
                }
            }
        }

        return $list;

    }

    public function addAdditionals(Request $request,Additionals $additionals)
    {

        $entity = 'App\Entities\Admin\\'.ucfirst($request->entity);
        $modelo = new $entity;
        $model = $modelo->find($request->id);

        $additional = $additionals->find($request->additionals_id);



        if($ad = $model->additionables()->create(['amount' => $request->amount,'additionals_id'=>$request->additionals_id])) {
//        if($model->additionables()->save($additional,['amount' => $request->amount]))
            $additional->amount = $request->amount;
            $additional->additionable_id = $ad->id;

            return response()->json($additional, 200);
        }else
            return response()->json([],404);

    }

    public function removeAdditionals(Request $request,Additionals $additionals){
//        dd($request->all());
        $entity = 'App\Entities\Admin\\'.ucfirst($request->entity);
        $modelo = new $entity;

        $model = $modelo->find($request->id);

        $additional = $model->additionables->find($request->additionals_id);


        if($model->additionables->find($request->additionals_id)->delete())
            return response()->json($additional,200);
        else
            return response()->json([],404);

    }

    public function findLocalidades(){
        $search = $this->request->q;

        $localidades = Localidades::where('name','LIKE',"%$search%")->get();

        $loc = [];

        if(!empty($localidades)){

            foreach ($localidades as $localidad):
                $loc[] = ['id' => $localidad->id, 'text' => $localidad->Municipios->Provincias->name . " - " . $localidad->Municipios->name. " - " . $localidad->name];
            endforeach;

            return $loc;

        }else{
            return false;
        }


    }

}
