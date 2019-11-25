<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;

class HomeController extends Controller
{

    public function index()
    {
        $this->data['section'] = 'home';
        $this->data['activeBread'] = '';
       // $this->data['config'] = (object)['sectionName'=>'Home', 'indexRoute'=>'home'];

        return view('home')->with($this->data);
    }

}
