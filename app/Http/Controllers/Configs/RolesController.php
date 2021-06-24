<?php

namespace App\Http\Controllers\Configs;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\PermissionsRepo;
use App\Http\Repositories\Configs\RolesRepo as Repo;



class RolesController extends Controller
{
    public function  __construct(Repo $repo, Route $route , Request $request, PermissionsRepo $permission )
    {
        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'roles';
        $this->data['section']  = $this->section;

        //data select
        $this->data['permissions']     = $permission->ListsData('name','id');
        $this->data['permissionsRepo'] = $permission;

    }

}
