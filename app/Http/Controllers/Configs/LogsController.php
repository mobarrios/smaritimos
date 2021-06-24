<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\LogsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\Configs\UsersRepo;



class LogsController extends Controller
{
    protected $usersRepo;

    public function  __construct(Repo $repo, Route $route, Request $request,  UsersRepo $usersRepo)
    {
        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
        $this->section          = 'logs';
        $this->data['section']  = $this->section;

    }

    
}
