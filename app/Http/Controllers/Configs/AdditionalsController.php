<?php

namespace App\Http\Controllers\Configs;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Configs\AdditionalsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class AdditionalsController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'additionals';
        $this->data['section']  = $this->section;

    }

}
