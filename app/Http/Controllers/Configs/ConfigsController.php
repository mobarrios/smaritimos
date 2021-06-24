<?php

namespace App\Http\Controllers\Configs;

use App\Entities\Configs\Customs;
use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;


class ConfigsController extends Controller
{

    public function __construct(Route $route, Request $request)
    {
        $this->request = $request;
        $this->route = $route;
    }


    public function customs()
    {
        $data['section'] = $this->route->getParameter('models');

        

        return view('configs.customs.index')->with($data);
    }

    public function customsPost()
    {
        $model = $this->route->getParameter('models');
        $data['section'] = $model;

        $class = Session::get('customs');
        $type = $this->request->type;
        $name = $this->request->name;
        $size = $this->request->size;

        $custom = new Customs();
        $custom->model = $class;
        $custom->label = $name;
        $custom->types_id = $type;
        $custom->size = $size;
        $custom->save();


//        Schema::table('clients',function(Blueprint $table) use ($type, $name,  $size)
//        {
//           $table->$type($name,$size);
//        });


    }
}
