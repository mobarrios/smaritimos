<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\ProvidersPaymentsRepo;
use App\Http\Repositories\Admin\ProvidersRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ProvidersController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, ProvidersPaymentsRepo $providersPaymentsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'providers';
        $this->data['section']  = $this->section;
        $this->data['providersPayments'] =  $providersPaymentsRepo->ListsData('name','id');
    }


    public function getCc()
    {
        $this->data['activeBread'] = 'Listar';
        $this->data['models'] = $this->repo->find($this->route->getParameter('id'));
        return view('admin.providers.cc')->with($this->data);
    }
}