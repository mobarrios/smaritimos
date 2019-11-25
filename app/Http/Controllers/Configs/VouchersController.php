<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\UtilitiesController;
use App\Http\Helpers\ApiFEHelper;
use App\Http\Repositories\Configs\VouchersRepo as Repo;

use App\Http\Repositories\Admin\SalesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;


class VouchersController extends Controller
{
    protected $apiFe;
    protected $utilities;

    public function __construct(Request $request, Repo $repo, Route $route , UtilitiesController $utilitiesController)
    {

        $this->request = $request;
        $this->repo = $repo;
        $this->route = $route;

        $this->section = 'vouchers';
        $this->data['section'] = $this->section;

        $this->data['tipos'] = config('models.vouchers.tipos');
        $this->data['letras'] = config('models.vouchers.letras');
        $this->data['tipoDocumento'] = config('models.vouchers.tiposDocumento');

        $this->utilities = $utilitiesController;
    }


    public function store()
    {

        if(Auth::user()->BranchesActive->company->fe == 1)
        {
            $api = new ApiFEHelper();
            $data =
                [
                    'punto_venta' => $this->request->punto_venta,
                    'tipo' => $this->request->tipo,
                    'letra' => $this->request->letra,
                    'concepto' => 'P',
                    'tipo_documento' => $this->request->tipo_documento,
                    'numero_documento' => $this->request->dni,
                    'fecha' => date('Ymd', strtotime($this->request->fecha)),
                    'importe_total' => $this->request->importe_total,
                    "importe_total_no_gravado" => 0.0,
                    "importe_total_neto_gravado" => $this->request->importe_total / 1.21,
                    "importe_total_operaciones_exentas" => 0.0,
                    "importe_total_otros_tributos" => 0.0,
                    "importe_total_iva" => ($this->request->importe_total) - ($this->request->importe_total / 1.21),
                    "iva" => [["base_imponible" => $this->request->importe_total / 1.21, "alicuota" => 21.00, "importe" => ($this->request->importe_total) - ($this->request->importe_total / 1.21)]],
                ];

            $api->call('POST', $data);

            $resultado = $api->getResultado();
            if ($resultado->status->estado != 'OK')
            {
                return redirect()->back()->withErrors([$resultado->status]);

            }
                else
            {
                $this->request['numero'] = $resultado->comprobante->numero;
                $this->request['cae'] = $resultado->comprobante->cae;
                $this->request['vencimiento_cae'] = $resultado->comprobante->vencimiento_cae;


            }
        }
            $model =  $this->repo->create($this->request);
            $model->Sales()->attach(['sales_id'=>$this->request->sales_id]);

            return redirect()->route('admin.sales.factura',$model->id);

    }

    public function fromSales(SalesRepo $salesRepo)
    {
        $this->data['activeBread'] = 'Nuevo Comprobante';
        $this->data['sale'] = $salesRepo->find($this->route->getParameter('salesId'));

        return view('configs.vouchers.formFromSales')->with($this->data);
    }

}
