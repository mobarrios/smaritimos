<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\PermissionsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class PermissionsController extends Controller
{
    public function  __construct(Repo $repo, Route $route,  Request $request){

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'permissions';
        $this->data['section']  = $this->section;
        
        //data select

    }


    
}
