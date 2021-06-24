<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\FinancialsDuesRepo;
use App\Http\Repositories\Admin\FinancialsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class FinancialsController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'financials';
        $this->data['section']  = $this->section;
    }

    public function addDue(FinancialsDuesRepo $financialsDuesRepo)
    {
        $financialsDuesRepo->create($this->request);

        return redirect()->route('moto.financials.edit',$this->request->financials_id);
    }

    public function editDue(FinancialsDuesRepo $financialsDuesRepo)
    {
        $this->data['modelItems'] = $financialsDuesRepo->find($this->route->getParameter('item'));

        return parent::edit();
    }

    public function updateDue(FinancialsDuesRepo $financialsDuesRepo,$id)
    {
        $financialsDuesRepo->update($id,$this->request);

        return parent::edit();
    }

    public function deleteDue(FinancialsDuesRepo $financialsDuesRepo)
    {
        $financialsDuesRepo->destroy($this->route->getParameter('item'));

        return parent::edit();
    }


}
