<?php

namespace App\Http\Controllers\Utilities;

use App\Entities\Configs\Vouchers;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel;


class UtilitiesController extends Controller
{

    public function exportToExcel(Route $route , Excel $excel){

        $datos = Session::get('export');

        $model = (new $datos['model'])->all();
        $company = Auth::user()->BranchesActive->company;

        $export = config('models.'.$model->first()->section.'.export');

        $data = ['model' => $model,'company' => $company,'section' => $model->first()->section,'export' => $export];

        $excel->create($model->first()->section, function($excel) use ($model,$data) {

            $excel->sheet($model->first()->section, function($sheet) use ($data){
                $sheet->setOrientation('landscape');
                $sheet->loadView('template.listExportxls',$data);

            });

        })->export('xls');

    }


    public function exportListToPdf(Route $route , PDF $pdf){

        $datos = Session::get('export');

        $model = (new $datos['model'])->all();
        $company = Auth::user()->BranchesActive->company;

        $export = config('models.'.$model->first()->section.'.export');

        $pdf->loadView('template.listExport',['model' => $model,'company' => $company,'section' => $model->first()->section,'export' => $export] );

        return $pdf->stream();
    }


    public function exportToPdf($id,Request $request,Route $route , PDF $pdf){

        
        $entidad = 'App\Entities\Admin\\'.ucfirst($request->segment(2));

        $model = new $entidad;

        $model = $model->find($id);

        $pdf->setPaper('a4', 'portrait')->loadView(config('models.'.$request->segment(2).'.exportPdfRoute'),compact('model'));

        return $pdf->stream();
    }

    public function reciboPdf($id,Vouchers $vouchers,Request $request,Route $route , PDF $pdf){

        $model = $vouchers->with('sales')->find($id);
        dd($model);
        $client = $model->sales->first()->clients;

        $pdf->setPaper('a5', 'landscape')->loadView('admin.vouchers.reciboPdf',compact('model','client'));

        return $pdf->stream();
    }

    public function facturaPdf($id,Vouchers $vouchers,Request $request,Route $route , PDF $pdf){

        $model = $vouchers->with('sales')->find($id);

        $pdf->setPaper('A4', 'portrait')->loadView('admin.vouchers.facturaPdf',compact('model'));

        return $pdf->stream();
    }
}
