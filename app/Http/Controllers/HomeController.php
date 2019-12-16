<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Facades\DB;

use App\Entities\Admin\Items;

class HomeController extends Controller
{

    public function index()
    {
        $this->data['section'] = 'home';
        $this->data['activeBread'] = '';
       // $this->data['config'] = (object)['sectionName'=>'Home', 'indexRoute'=>'home'];
       // 
       
       $this->data['items']  = Items::all();


        return view('home')->with($this->data);
    }

}
