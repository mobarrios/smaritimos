<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Configs\Brancheables;
use App\Entities\Admin\Certificates;
use App\Entities\Admin\Items;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;


class ItemsRepo extends BaseRepo
{


    public function getModel()
    {
        return new Items();
    }


// search
    public function search($data)
    {
        //$columns = config('models.'.$this->model->section.'.search');

        $q = $this->model->where('id', 'like', '%' . $data->search . '%')
        ->orWhere('n_serie','like','%' . $data->search . '%')
        ->orWhereHas('Models',function($m) use ($data)
        {
            $m->where('name','like','%' . $data->search . '%' )
            ->whereNull('deleted_at');
        })
        ->orWhereHas('Models.Brands',function($b) use ($data)
        {
            $b->where('name','like','%' . $data->search . '%' )
            ->whereNull('deleted_at');
        })
        ->orWhereHas('Brancheables.Branches',function($br) use ($data)
        {
            $br->where('name','like','%' . $data->search . '%' )
            ->whereNull('deleted_at');
        })
        ->orWhereHas('Models.Categories',function($c) use ($data)
        {
            $c->where('name','like','%' . $data->search . '%' );
        })

        ->whereNull('deleted_at');



        // foreach ($columns as $column => $k) {


        //     if(is_array($k))
        //     {
        //         $q->orWhereHas($k[0], function ($q) use ($k, $data)
        //         {
        //             $q->where($k[1], 'like', '%' . $data->search . '%')
        //             ->whereNull('deleted_at');
        //         });
        //         $q->whereNull('deleted_at');
                

        // } else {
        // $q->orWhere($k, 'like', '%' . $data->search . '%')
        // ->whereNull('deleted_at');

        //     }
        // }

        return $q ;

    }


    public function ItemsByModels($id)
    {
        $data = $this->model->with('Branches')->where('models_id', $id)->get();
        return $data;
    }

    public function asignItem($models_id, $branches_id, $sales_id = null)
    {

        //busca items con estatus ingresado
        $items = Items::where('status', 1)->where('models_id', $models_id)->get()->lists('id');


        if ($items->count() != 0) {

            // valida si el producto esta en la sucursal de destino
            $qBranch = Brancheables::where('entities_type', 'App\Entities\Admin\Items')->whereIn('entities_id', $items)->where('branches_id', $branches_id)->first();

            if (!is_null($qBranch)) {
                $item = $qBranch;

            } else {

                // si no esta en la sucursal de destino envia la mas antigua
                $item = Brancheables::where('entities_type', 'App\Entities\Admin\Items')->whereIn('entities_id', $items)->first();


                //pide a logistica el envio del item sucA a sucB
                //$this->itemsRequest($item->entities_id, $item->branches_id, $branches_id, $sales_id);

                $data = [
                    'quantity' => 1,
                    'types_id' => 1,
                    'models_id' => $models_id,
                    //'colors_id' => $colors_id,
                    'users_id' => Auth::user()->id,
                    'items_id' => $item->entities_id,
                    'branches_to_id' => $branches_id,
                ];

                //$this->myRequest($data);

            }

            // cambia el estado a reservado
            $this->changeStatus($item->entities_id, 2);

            return $item->entities_id;

        } else {

            return false;
        }
    }


    public function myRequest($data)
    {
        $myRequestRepo = new MyRequestRepo();
        $myRequestRepo->createFromSales($data);
    }

    public function itemsRequest($items_id, $branches_id_from, $branches_id_to, $sales_id = null)
    {
        $itemsRequestRepo = new ItemsRequestRepo();

        $data = ['items_id' => $items_id, 'branches_from_id' => $branches_id_from, 'branches_to_id' => $branches_id_to, 'status' => 1, 'sales_id' => $sales_id];

        $itemsRequestRepo->create($data);

    }

    public function changeStatus($id, $status)
    {
        $item = $this->find($id);

        // guarda el update en updateables
        $item->Updateables()->create(['column' => 'status', 'data_old' => $item->status]);

        $item->status = $status;
        $item->save();


    }

    public function create($data)
    {

        $model = new $this->model();

        if(is_object($data))
            $model->fill($data->all());
        else
            $model->fill($data);

        $model->save();


        //guarda imagenes
        if(config('models.'.$model->section.'.is_imageable'))
            $this->createImage($model, $data);

        //guarda log
        if(config('models.'.$model->section.'.is_logueable'))
            $this->createLog($model, 1);

        //si va a una sucursal
        if(config('models.'.$model->section.'.is_brancheable'))
            $this->createBrancheables($model, $data->branches_id);


        return $model;
    }


    public function update($id, $data)
    {
        $model = $this->model->find($id);


        if(is_object($data))
            $model->fill($data->all());
        else
            $model->fill($data);


            // valida si el dato nuevo es diferente al original y lo guarda en updateables
                $a = $model['original'];
                $c = $model['attributes'];


                $diffs = array_diff($a, $c);

                foreach ($diffs as $diff => $a)
                {
                    $col = $diff;
                    $datas = $a;

                    $model->Updateables()->create(['column' => $col, 'data_old' => $datas]);
                }
            //---

                $model->save();

                //guarda imagenes
                if(config('models.'.$model->section.'.is_imageable'))
                    $this->createImage($model, $data);

                //guarda log
                if(config('models.'.$model->section.'.is_logueable'))
                    $this->createLog($model, 3);

                 if(config('models.'.$model->section.'.is_brancheable'))
                    $this->createBrancheables($model, $data->get('branches_id'));       
                       


        return $model;
    }


    public function ItemsVencidos()
    {
        $items =  $this->model->where('status','!=',7)->get();
         $res = [];

        foreach ($items as $item) {
           if($item->isVencido){
            array_push($res, $item);
           }
        }

        return $res;
    }

}