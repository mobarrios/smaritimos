<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Configs\Localidades;

use App\Entities\Admin\ServiceOrders;
use App\Http\Repositories\Configs\ProvinciasRepo;
use App\Http\Repositories\Admin\FilesRepo;
use App\Http\Repositories\Admin\TechnicalServicesRepo;
use Bican\Roles\Models\Role;
use App\Entities\Configs\User;
use App\Entities\Configs\Additionals;
use App\Entities\Admin\Banks;
use App\Entities\Admin\Financials;
use App\Entities\Admin\Items;
use App\Entities\Admin\Registros;
use App\Entities\Admin\Sales;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\AdditionalsRepo;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Configs\IvaConditionsRepo;
use App\Http\Repositories\Configs\LocalidadesRepo;
use App\Http\Repositories\Configs\VouchersRepo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\BudgetsRepo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\FinancialsRepo;
use App\Http\Repositories\Admin\PayMethodsRepo;
use App\Http\Repositories\Admin\RegistrosRepo;
use App\Http\Repositories\Admin\SalesItemsRepo;
use App\Http\Repositories\Admin\PaymentsRepo;

use App\Http\Repositories\Admin\SalesRepo as Repo;
use App\Http\Repositories\Admin\ItemsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Admin\ProvidersRepo;
use App\Http\Repositories\Admin\PurchasesOrdersRepo;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class SalesController extends Controller
{
    protected $clientsRepo;

    public function __construct(Request $request, Repo $repo, Route $route, PurchasesOrdersRepo $purchasesOrdersRepo,
                                ModelsRepo $modelsRepo, ColorsRepo $colorsRepo, BrandsRepo $brandsRepo, ClientsRepo $clientsRepo,
                                BranchesRepo $branchesRepo, BudgetsRepo $budgetsRepo,ItemsRepo $itemsRepo, SalesItemsRepo $salesItemsRepo,
                                AdditionalsRepo $additionalsRepo,VouchersRepo $vouchersRepo, IvaConditionsRepo $ivaConditionsRepo, ProvinciasRepo $provinciasRepo)
    {

        $this->request = $request;
        $this->repo = $repo;
        $this->route = $route;

        $this->section = 'sales';
        $this->data['section'] = $this->section;

        $this->data['purchasesOrders'] = $purchasesOrdersRepo->ListsData('id', 'id');

        $this->data['models_types'] = $modelsRepo->ListsData('name', 'id');
        $this->data['models_lists'] = $modelsRepo->ListsData('name', 'id');
        //$this->data['colors'] = $colorsRepo->ListsData('name', 'id');
//        $this->data['colors'] = $colorsRepo->ListsData('name', 'id');
        //$this->data['financials'] = $payMethodsRepo->ListsData('name','id');


        $this->data['brands'] = $brandsRepo->getAllWithModels();
        $this->data['branches'] = $branchesRepo->ListsData('name', 'id');
        $this->data['budgets'] = $budgetsRepo->ListsData('id', 'id');

        $this->data['budgets']->prepend("Seleccione presupuesto",0);

        $this->data['additionals'] = $additionalsRepo->ListsData('name','id');

        $this->data['clients'] = $clientsRepo->listForSelect();

//        $this->data['clients'] = $clientsRepo->ListAll()->orderBy('last_name', 'ASC')->get();

        $this->data['vouchers'] = $vouchersRepo->ListAllWhere($this->section,['tipo'=>'R'])->get();

        $this->data['ivaConditions'] = $ivaConditionsRepo->listsData('name','id');

        $this->data['provincias'] = $provinciasRepo->listAll()->get();


        $this->data['status'] = config('status.sales') ;

        $this->data['localidades'] = [];


        $this->modelsRepo = $modelsRepo;
        $this->clientsRepo = $clientsRepo;
        $this->budgetsRepo = $budgetsRepo;
        $this->itemsRepo = $itemsRepo;
        $this->salesItemsRepo = $salesItemsRepo;

    }


    public function edit()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Editar';

        // id desde route
        $id = $this->route->getParameter('id');

        $this->data['models'] = $this->repo->find($id);

        if($this->data['models']->Clients->localidades_id){

            $localidades = Localidades::find($this->data['models']->Clients->localidades_id);

            $this->data['localidades'] = [$localidades->id => $localidades->Municipios->Provincias->name . ' - ' . $localidades->Municipios->name . ' - ' . $localidades->name];
        }

        return view(config('models.'.$this->section.'.editView'))->with($this->data);
    }

    //cambio de Estado

    public function changeStatus()
    {
        $status = $this->request->status;
        $salesId = $this->request->salesId;

        $sale = $this->repo->find($salesId);
        $sale->status =  $status;
        $sale->save();

        return response($sale,200);
    }

   

    public function store()
    {
        $this->request['users_id'] = Auth::user()->id;

        return parent::store(); // TODO: Change the autogenerated stub
    }


    //addItems
    public function addItems(ModelsRepo $modelsRepo)
    {
        $sale = $this->repo->find($this->route->getParameter('sales_id'));
        $this->data['sales'] =  $sale;

        // $this->data['id'] = $id;
        $this->data['activeBread'] = 'Agregar Item';

        return view('admin.sales.modalItemsForm')->with($this->data);
    }

    // items
    public function createItems(SalesItemsRepo $salesItemsRepo, ItemsRepo $itemsRepo)
    {

        $sale = $this->repo->find($this->request->sales_id);

        // asigna items a la venta
        $item = $itemsRepo->asignItem($this->request->models_id, $sale->branches_confirm_id, $sale->id);

        if ($item != false)
        {
            $this->request['items_id'] = $item;
            $salesItems = $salesItemsRepo->create($this->request->all());
        }
        else
        {
            return redirect()->back()->withErrors('El Articulo no se pudo Asignar!');
        }


        return redirect()->route('admin.sales.edit', $this->request->sales_id)->withErrors('Se agregó correctamente el item');


    }

    public function editItems(SalesItemsRepo $salesItemsRepo)
    {
        $this->data['activeBread'] = 'Agregar Item';

        $this->data['salesItems'] = $salesItemsRepo->find($this->route->getParameter('item'));
        $this->data['sales'] = $this->repo->find($this->route->getParameter('salesId'));


        //$this->data['route'] = ['moto.sales.updateItems', $this->route->getParameter('item'), $this->route->getParameter('id')];

        return view('admin.sales.modalItemsForm')->with($this->data);

    }

    public function updateItems(SalesItemsRepo $salesItemsRepo)
    {
        $salesItemsRepo->update($this->request->sales_items_id , $this->request);

        return redirect()->route('admin.sales.edit',$this->request->sales_id);
    }

    public function deleteItems(SalesItemsRepo $salesItemsRepo)
    {
        $salesItemsRepo->destroy($this->route->getParameter('item'));

        return parent::edit();
    }


    //payemnts
    public function createPayment(PaymentsRepo $PaymentsRepo, PayMethodsRepo $payMethodsRepo)
    {

        $this->data['salesId'] = $this->route->getParameter('item');

        $this->data['sales'] =  $this->repo->find($this->route->getParameter('item'));

        $this->data['salesPayment'] = $PaymentsRepo->getModel()->where('sales_id',$this->route->getParameter('item'))->get();

        $this->data['banks']= Banks::Lists('name','id');
        $this->data['financials']= Financials::Lists('name','id');


        $this->data['checkTypes']= [1=>'Portador', 2=>'Cruzado'];


        $this->data['payments']= $payMethodsRepo->ListsData('name','id');
        $this->data['activeBread']= 'Agregar Pago';



        return view('admin.sales.modalPayMethodsForm')->with($this->data);
    }


    public function addPayment(PaymentsRepo $PaymentsRepo)
    {

        $PaymentsRepo->create($this->request);

        return redirect()->route('admin.sales.edit', $this->request->sales_id)->withErrors('Se agregó el método de pago');
    }

    public function editPayment(PaymentsRepo $PaymentsRepo, PayMethodsRepo $payMethodsRepo)
    {

        $this->data['banks']= Banks::Lists('name','id');
        $this->data['financials']= Financials::Lists('name','id');

        $this->data['checkTypes']= [1=>'Portador', 2=>'Cruzado'];

        $this->data['payments']= $payMethodsRepo->ListsData('name','id');
        $this->data['activeBread']= 'Agregar Pago';

        $this->data['modelPays'] = $PaymentsRepo->find($this->route->getParameter('item'));
       // $this->data['routePays'] = ['moto.sales.addPayment', $this->route->getParameter('item')];

        return view('admin.sales.modalPayMethodsForm')->with($this->data);
    }

    public function updatePayment(PaymentsRepo $PaymentsRepo)
    {

        $PaymentsRepo->update($this->request->sales_payments_id , $this->request);

        return redirect()->back()->withErrors('Se Editó el método de pago');


        //return parent::edit();
    }

    public function deletePayment(PaymentsRepo $PaymentsRepo)
    {
        $PaymentsRepo->destroy($this->route->getParameter('item'));

        return parent::edit();
    }

    public function showAside(Request $request, SalesItemsRepo $salesItemsRepo, PaymentsRepo $PaymentsRepo)
    {
        $this->data['route'] = $request->get('route');

        if ($request->get('edit') != 'false') {
            if ($request->get('type') == 'items') {
                $this->data['model'] = $salesItemsRepo->find($request->get('edit'));
            }

            if ($request->get('type') == 'pays') {
                $this->data['model'] = $PaymentsRepo->find($request->get('edit'));
            }


        }

        $this->data['hidden'] = $request->hidden;
        $this->data['type'] = $request->type;

        return view('admin.sales.aside' . ucfirst($this->data['type']))->with($this->data);

    }



    public function storeRecibos(PaymentsRepo $PaymentsRepo, VouchersRepo $vouchersRepo)
    {

        $sales_payments = collect();


        foreach ($this->request->sales_payments_id as $sales_payments_id)
        {
            $sp = $PaymentsRepo->find($sales_payments_id);
            $sp->status = 1;
            $sp->save();

            $sales_id = $sp->sales_id;
            $sales_payments->push($PaymentsRepo->find($sales_payments_id));
        }


        if($vouchersRepo->ListAll()->where('tipo','R')->count() > 0)
        {
            $number = $vouchersRepo->ListAll()->where('tipo','R')->get()->last()->numero + 1;
        }
        else
        {
            $number = '1';
        }

        $voucher = $vouchersRepo->create(['tipo' => 'R','letra' => 'X', 'concepto' => 'Pago', 'fecha' => date('Y-m-d', time()), 'importe_total' => $sales_payments->sum('amount'),'numero' => $number]);

        $voucher->Payments()->attach($this->request->sales_payments_id);

        $voucher->Sales()->attach($sales_id);




        // si el modelo descuenta stock cambia de estado
        $sales = $this->repo->find($sales_id);

        foreach ($sales->Items as $item)
        {
            if($item->Models->stock_discount == 1)
            {
                //cambia  a estado vendido
                $item->status = 3;
                $item->save();
            }
        }



        return redirect()->route('admin.sales.edit',$sales_id)->withErrors('Se creó correctamente el recibo');
    }

    public function deleteRecibos(VouchersRepo $vouchersRepo, PaymentsRepo $PaymentsRepo)
    {
        $voucher = $vouchersRepo->find($this->route->getParameter('recibo'));

        $voucher->Sales()->detach();

        foreach($voucher->payments as $payment){
            $payment->status = null;
            $payment->save();
        }

        $vouchersRepo->destroy($this->route->getParameter('recibo'));

        //breadcrumb activo
        $this->data['activeBread'] = 'Editar';

        // id desde route
        $id = $this->route->getParameter('id');

        $this->data['models'] = $this->repo->find($id);

        return redirect()->back()->with($this->data);
    }


    public function show(Sales $sales)
    {
        $sale = $sales->with('Items')->with('Clients')->with('BranchesConfirm')->with('Vouchers')->with('Payments')->find($this->route->getParameter('id'));

        return response()->json($sale);
    }



    public function createFinancials(FinancialsRepo $financialsRepo)
    {

        $this->data['salesId'] = $this->route->getParameter('id');

        $this->data['sales'] = $this->repo->find($this->route->getParameter('id'));

        $this->data['financials']= Financials::Lists('name','id');

        $this->data['payments']= $financialsRepo->ListsData('name','id');
        $this->data['activeBread']= 'Agregar Pago';

        return view('admin.sales.modalFinancialsForm')->with($this->data);
    }


    public function addFinancials()
    {

        $sales = $this->repo->find($this->request->sales_id);

        $data = ['financials_dues_id'=>$this->request->financials_dues_id , 'amount'=>$this->request->amount , 'amount_dues'=>$this->request->amount_dues];


        $sales->FinancialsDues()->attach([$data]);

        return redirect()->route('admin.sales.edit', $this->request->sales_id)->withErrors('Se agregó el método de pago');
    }


    public function createBudget(PDF $PDF)
    {
        $model = $this->repo->getModel()->with('User','Clients','SalesItems','FinancialsDues')->find($this->route->getParameter('id'));

//        Mail::queue('admin.emails.budgets', ['model'=>$model] , function($message) use($model)
//        {
//            $message->from('info@motonet.com.ar');
//            $message->to($model->Clients->email)->subject('Presupuesto solicitado')
//                ->replyTo(Auth::user()->email, Auth::user()->fullname);
//        });


        $PDF->loadView('admin.reports.'.$this->section.'.budget',compact('model'));

        return $PDF->stream();


    }

}
