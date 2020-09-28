<?php
namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Certificates;
use App\Entities\Admin\Items;
use App\Entities\Admin\Categories;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\CertificatesRepo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\ItemsRepo as Repo;
use App\Http\Repositories\Admin\ModelsRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Config;

use App\Entities\Configs\Company;
use App\Entities\Configs\Branches;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;



class ItemsController extends Controller
{

    protected  $certificatesRepo;

    public function  __construct(Request $request, Repo $repo, Route $route, ModelsRepo $modelsRepo, ColorsRepo $colorsRepo ,  BrandsRepo $brandsRepo)
    {
        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section                  = 'items';
        $this->data['section']          = $this->section;

        //data
        $this->data['models_types']     = $modelsRepo->ListsData('name','id');
        $this->data['colors']           = $colorsRepo->ListsData('name','id');
        $this->data['brands']           = $brandsRepo->getAllWithModels();
        $this->data['estados']          = config('status.items');
        $this->data['capacidad_tipos']  = config('status.capacidades_tipo');
        $this->data['companies']        = Company::lists('razon_social','id');
        $this->data['branches']         = Branches::lists('name','id');

    }

    public function index()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        $catId = $this->route->getParameter('cat_id');

        if(!is_null($catId))
            Session::put('superCategoriaId', $catId);


    
        //if( Auth::user()->can($this->data['superCategoriaName']) );



        //si request de busqueda
        //
        // if( isset($this->request->search) && !is_null($this->request->filter))
        // {


        if( isset($this->request->search) || $this->route->hasParameter('search'))
        {
            $this->request['search'] = isset($this->request->search) ? $this->request->search : isset($this->request->search) ;  $model = $this->repo->search($this->request);

            $this->data['search'] = $this->request['search'];


            $model = $this->repo->search($this->request);

            if(is_null($model) || $model->count() == 0)
               return redirect()->back()->withErrors(['No se encontraron datos.']);
                //si paso la seccion
                //$model = $this->repo->listAll($this->section);
        }
        else
        {
            $this->data['search'] = null;

            $model  = $this->repo->listAll($this->section);

        }



        //guarda en session lo que se busco para exportar
        Session::put('export', ['search'=> $this->data['search'],'model' => $this->repo->getModel()->getClass(),'section' => config('models.'.$this->section.'.sectionName')]);




        // selecciona superCategoria

         $m = $model->whereHas('Models',function($a){
                    $a->whereHas('Categories',function($c){
                        $c->where('categories.id',Session::get('superCategoriaId'));
                    });
        });

        //echo Session::get('superCategoriaId');



         //dd($m->get());



        //pagina el query
        $this->data['models'] = $m->paginate(config('models.'.$this->section.'.paginate'));
     

        //return view($this->getConfig()->indexRoute)->with($this->data);
        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);


    }

    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        //crea a traves del repo con el request
        $model = $this->repo->create($this->request);

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'))->withErrors(['Regitro Agregado Correctamente']);
    }


    public function update()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        $id = $this->route->getParameter('id');

        //edita a traves del repo
        $model = $this->repo->update($id,$this->request);

        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'))->withErrors(['Regitro Editado Correctamente']);
    }


    public function itemsByModels()
    {
        $id = $this->route->getParameter('id');

        $data = $this->repo->ItemsByModels($id);
        return response()->json($data);
    }

    //busca nro motor
    public function itemsByMotor()
    {
        // busca si el numero de motor existe devuelvo bool

        $nMotor = $this->route->getParameter('nMotor');
        $res = $this->repo->getModel()->where('n_motor', $nMotor)->get();

        if($res->count() == '1')
            return response()->json(true);
        else
            return response()->json(false);
    }


    //busca nro cuadro
    public function itemsByCuadro()
    {
        // busca si el numero de motor existe devuelvo bool

        $nCuadro = $this->route->getParameter('nCuadro');
        $res = $this->repo->getModel()->where('n_cuadro', $nCuadro)->get();

        if($res->count() == '1')
            return response()->json(true);
        else
            return response()->json(false);
    }

    //send mail
    public function sendMail(){

            $pv = $this->repo->ItemsVencidos();
            $it = new Items();
            $v  =  $it->where('status','!=',7)->where('f_vencimiento','<=', date('Y-m-d'))->orderBy('f_vencimiento','DESC')->get();
            $cat = DB::table('categories')->where('main',1)->whereNotNull('mail')->get();

            foreach($cat as $c){

                Mail::send('mails.vto', ['porVencer'=> $pv, 'vencidos' => $v, 'cat_id' => $c->id], function($m) use ($c){
                         $m->from('help@coders.com.ar', 'Aviso de próximos vencimientos');
                         $m->cc($c->mail,'Servicios Maritimos')->subject('Vencimiento de Artículo!');
                });

            }


            // Mail::send('mails.vto', [ 'porVencer' => $pv , 'vencidos' => $v],function ($m) use ($v, $pv){
            //               $m->from('help@coders.com.ar', 'Aviso de próximos vencimientos');

            //               foreach($pv  as $p)
            //               {
            //                 foreach ($p->Models->Categories as $cat) {
            //                     if($cat->main == 1 && $cat->mail != null)
            //                            // echo $cat->name . $cat->mail .'<br>';
            //                           $m->cc($cat->mail,'Servicios Maritimos')->subject('Vencimiento de Artículo!');
            //                     }
            //                }


            //               foreach($v  as $a)
            //               {
            //                 foreach ($a->Models->Categories as $cat) {
            //                     if($cat->main == 1 && $cat->mail != null)
            //                         //echo $cat->name . $cat->mail .'<br>';
            //                           $m->cc($cat->mail,'Servicios Maritimos')->subject('Vencimiento de Artículo!');
            //                }

            //              //  $m->to('vencimientosarmamento@serviciosmaritimos.com','Servicios Maritimos')->subject('Vencimiento de Artículo!');
            //              //   $m->to('manuelobarrios@gmail.com','Servicios Maritimos')->subject('Vencimiento de Artículo!');
            //               }

            // });





     return redirect()->back()->withErrors(['E-mail enviado Correctamente']);
    }


    public function deleteImages(){

                $id = $this->route->getParameter('id');
                $db = DB::table('images')->where('id',$id)->delete();



     return redirect()->back()->withErrors(['Imagen Eliminada Correctamente']);


    }



}
