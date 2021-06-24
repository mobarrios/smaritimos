<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\BranchesRepo as Repo;
//use App\Http\Repositories\Configs\UsersRepo;

use App\Http\Repositories\Configs\CompanyRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class BranchesController extends Controller
{
    protected $userRepo;

    public function  __construct(Request $request, Repo $repo, Route $route, CompanyRepo $companyRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
        //$this->userRepo = $usersRepo;

        $this->section          = 'branches';
        $this->data['section']  = $this->section;

        $this->data['razonSocial'] =  $companyRepo->ListsData('razon_social','id');

      //  $this->data['users']    = $usersRepo->listAll()->get();
    }

}
