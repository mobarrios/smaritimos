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

}