<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Configs\Branches;
use App\Entities\Admin\DispatchesItems;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Admin\ChargesRepo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\DispatchesItemsRepo;
use App\Http\Repositories\Admin\FinancialsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Admin\PayMethodsRepo;
use App\Http\Repositories\Admin\ProvidersRepo;
use App\Http\Repositories\Admin\PurchasesOrdersItemsRepo;
use App\Http\Repositories\Admin\PurchasesOrdersRepo as Repo;
use App\Http\Repositories\Admin\SizesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class PurchasesOrdersController extends Controller
{
    protected $modelsRepo;
    protected $modelsListsPricesRepo;

    public function __construct(Request $request, Repo $repo, Route $route, ProvidersRepo $providersRepo,
                                ModelsRepo $modelsRepo, PurchasesOrdersItemsRepo $purchasesOrdersItemsRepo,
                                ColorsRepo $colorsRepo, BranchesRepo $branchesRepo, PayMethodsRepo $payMethodsRepo)
    {

        $this->request = $request;
        $this->repo = $repo;
        $this->route = $route;

        $this->section = 'purchasesOrders';
        $this->data['section'] = $this->section;

        //data
        $this->data['providers'] = $providersRepo->ListsData('name', 'id');
        $this->data['models_lists'] = $modelsRepo->ListsData('name', 'id');
        $this->data['colors'] = $colorsRepo->ListsData('name', 'id');
        $this->data['branches'] = $branchesRepo->ListsData('name', 'id');
        $this->data['pay_methods'] = $payMethodsRepo->ListsData('name', 'id');

        $this->data['total'] = 0;

        $this->modelsRepo = $modelsRepo;
        $this->purchasesOrdersItemsRepo = $purchasesOrdersItemsRepo;

    }


    //find with items
    public function find()
    {
        $data = $this->repo->getModel()->with('PurchasesOrdersItems')->with('PurchasesOrdersItems.DispatchesItems')->with('PurchasesOrdersItems.Models')->with('PurchasesOrdersItems.Models.Brands')->find($this->route->getParameter('id'));

        return response()->json($data);
    }

    //find by provider
    public function findByProviders()
    {
        $data = $this->repo->getModel()->with('PurchasesOrdersItems')->with('PurchasesOrdersItems.DispatchesItems')->with('PurchasesOrdersItems.Models')->with('PurchasesOrdersItems.Models.Brands')->where('providers_id', $this->route->getParameter('id'))->get();

        return response()->json($data);
    }


    //confirma la lista de pedidos
    public function confirm(DispatchesItemsRepo $dispatchesItemsRepo)
    {
        $id = $this->route->getParameter('id');

        $repo = $this->repo->find($id);
        $repo->status = 3;
        $repo->save();


        //crear la cantidad de productos pedidos en la tabla de remitos items

        foreach ($repo->PurchasesOrdersItems as $item) {
            $q = $item->quantity;

            for ($i = 1; $i <= $q; $i++) {
                $new = ['purchases_orders_items_id' => $item->id];

                $newDispathcesItems = new DispatchesItems();
                $newDispathcesItems->fill($new);
                $newDispathcesItems->save();


                //$dispatchesItems = $dispatchesItemsRepo->create($new);
            }

        }


        return redirect()->route('admin.purchasesOrders.index')->withErrors(['Pedido de Mercadería Confirmado.']);
    }


    //envia mail de la lista de pedidos
    public function sendToProviders()
    {

        $id = $this->route->getParameter('id');

        $repo = $this->repo->find($id);
        $repo->status = 2;

        $user = Auth::user();
        $data['from'] = $user->email;
        $data['nombre'] = $user->fullName;

        $proveedorMail = $repo->providers->email;


//        return view('moto.emails.purchasesOrder',compact('repo','user'));
        Mail::queue('admin.emails.purchasesOrder', ['repo' => $repo, 'user' => $user], function ($message) use ($proveedorMail, $user, $data) {
            $message->from($data['from']);
            $message->to($proveedorMail)->subject('Pedido de mercadería MOTONET')
                ->replyTo($user->email, $data['nombre']);
        });

//        dd($repo->providers);


        $repo->save();

        //envia mail al proveedor

        return redirect()->route('admin.purchasesOrders.index')->withErrors(['Pedido de Mercadería Enviado al Proveedor.']);
    }

    //items

    public function addItems(PurchasesOrdersItemsRepo $purchasesOrdersItemsRepo)
    {


        $purchasesOrdersItemsRepo->create($this->request);


        return redirect()->route('admin.purchasesOrders.edit', $this->request->purchases_orders_id);
    }

    public function editItems(PurchasesOrdersItemsRepo $purchasesOrdersItemsRepo)
    {
        $this->data['modelItems'] = $purchasesOrdersItemsRepo->find($this->route->getParameter('item'));

        return parent::edit();
    }

    public function updateItems(PurchasesOrdersItemsRepo $purchasesOrdersItemsRepo, $id)
    {
        $purchasesOrdersItemsRepo->update($id, $this->request);

        return parent::edit();
    }

    public function deleteItems(PurchasesOrdersItemsRepo $purchasesOrdersItemsRepo)
    {
        $purchasesOrdersItemsRepo->destroy($this->route->getParameter('item'));

        return parent::edit();
    }


    public function addPayment(ChargesRepo $chargesRepo)
    {

        $chargesRepo->create($this->request);

        return redirect()->back();
    }


}