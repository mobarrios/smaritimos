<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\FinancialsRepo;
use App\Http\Repositories\Admin\PayMethodsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class PayMethodsController extends Controller {


    public function __construct(Request $request, Repo $repo, Route $route)
    {
        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'payMethods';
        $this->data['section']  = $this->section;
        $this->data['financials']  = $repo->ListsData('name','id');

    }


    public function modal($section,$id,$payment = null){
        $modelo = 'App\Entities\Moto\\'.ucfirst($section);

        $modelo = new $modelo;


        if($payment != null){
            $this->data['models'] = $modelo->find($id)->SalesPayments()->where('id',$payment)->first();
            $this->data['payment'] = $payment;
        }

        $this->data['section'] = $section;
        $this->data['id'] = $id;
        $this->data['activeBread'] = 'Métodos de pago';

        return view('moto.payMethods.modalPayMethodsForm')->with($this->data);
    }


}