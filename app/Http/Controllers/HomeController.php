<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Facades\DB;
use Session;
use App\Entities\Admin\Items;
use Auth;
use App\Entities\Admin\Categories;

class HomeController extends Controller
{

    public function index()
    {
        $this->data['section']     = 'home';
        $this->data['activeBread'] = '';
        // $this->data['config'] = (object)['sectionName'=>'Home', 'indexRoute'=>'home'];
        //$this->data['items']  		  = Items::whereIn('status',[1,2,6])->get();
                                    //  ->whereHas('Models',function($a){
                                     // $a->whereHas('Categories',function($c){
                                     //     $c->where('categories.id',Session::get('superCategoriaId'));
                                     // });
                                   // });

      
       if (Auth::user()->is('armamento|sistemas|tecnica|tecnica')) { 

        $ids = [];

        foreach (Auth::user()->roles as $key => $value) {

          $categories = Categories::where('name', $value->name)->first();
          if(!is_null($categories)){
            array_push($ids, $categories->id);
          }

        }

        $this->data['items']        = Items::whereIn('status',[1,2,6])
                                        ->whereHas('Models',function($a)use($ids){
                                            $a->whereHas('Categories',function($c)use($ids){
                                                $c->whereIn('categories.id', $ids);
                                            });
                                        })->get();

        $this->data['anteriores']  = Items::whereIn('status',[1,2,6])
                                      ->where('f_vencimiento','<=', date('Y-m-d'))
                                      ->whereHas('Models',function($a)use($ids){
                                        $a->whereHas('Categories',function($c)use($ids){
                                            $c->whereIn('categories.id', $ids);
                                        });
                                      })->orderBy('f_vencimiento','DESC')->get();



        $this->data['enTramite']   = Items::where('status',7)
                                    ->whereHas('Models',function($a)use($ids){
                                      $a->whereHas('Categories',function($c)use($ids){
                                          $c->whereIn('categories.id', $ids);
                                      });
                                    })->orderBy('f_vencimiento','DESC')->get();


      }else{
        
        $this->data['items']        = Items::whereIn('status',[1,2,6])->get();
        $this->data['anteriores'] 	= Items::whereIn('status',[1,2,6])->where('f_vencimiento','<=', date('Y-m-d'))->orderBy('f_vencimiento','DESC')->get();
        $this->data['enTramite'] 	= Items::where('status',7)->orderBy('f_vencimiento','DESC')->get();

      }


        return view('home')->with($this->data);
    }

}
