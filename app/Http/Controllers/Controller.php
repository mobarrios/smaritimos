<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ImagesHelper;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $request;
    protected $route;
    protected $config;
    protected $data;
    protected $section;
    
    public function index()
    {   
        
        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        //si request de busqueda
        if( isset($this->request->search) && !is_null($this->request->filter))
        {
            $model = $this->repo->search($this->request);

            if(is_null($model) || $model->count() == 0)
                //si paso la seccion
                $model = $this->repo->listAll($this->section);
        }
        else
        {
            $model  = $this->repo->listAll($this->section);
        }
        

        //guarda en session lo que se busco para exportar
//        Session::put('export',$model->get());
        Session::put('export', ['model' => $this->repo->getModel(),'section' => config('models.'.$this->section.'.sectionName')]);

        //guarda en session class para customs
        //Session::put('customs',$model->getClass());

        //pagina el query
        $this->data['models'] = $model->paginate(config('models.'.$this->section.'.paginate'));

        //return view($this->getConfig()->indexRoute)->with($this->data);
        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);
    }


    public function create()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Nuevo';

        return view(config('models.'.$this->section.'.storeView'))->with($this->data);
    }

    public function edit()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Editar';

        // id desde route
        $id = $this->route->getParameter('id');

        $this->data['models'] = $this->repo->find($id);

        return view(config('models.'.$this->section.'.editView'))->with($this->data);
    }



    // post de create

    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        //crea a traves del repo con el request
        $model = $this->repo->create($this->request);

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);
    }

    /*
    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        //crea a traves del repo con el request
        $model = $this->repo->create($this->request);


                //guarda imagenes
                if(config('models.'.$this->section.'.is_imageable'))
                    $this->createImage($model, $this->request);

                //guarda log
                if(config('models.'.$this->section.'.is_logueable'))
                    $this->repo->createLog($model, 1);

                //si va a una sucursal
                if(config('models.'.$this->section.'.is_brancheable'))
                    $this->repo->createBrancheables($model, Auth::user()->branches_active_id);


        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);
    }
    */
    //post de editar
    public function update()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        $id = $this->route->getParameter('id');

        //edita a traves del repo
        $model = $this->repo->update($id,$this->request);

              /*
                //guarda imagenes
                if(config('models.'.$this->section.'.is_imageable'))
                    $this->createImage($model, $this->request);

                //guarda log
                if(config('models.'.$this->section.'.is_logueable'))
                    $this->repo->createLog($model, 3);

                //si va a una sucursal
                if(config('models.'.$this->section.'.is_brancheable'))
                    $this->repo->createBrancheables($model, Auth::user()->branches_active_id);

              */

        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'),$model->id)->withErrors(['Regitro Editado Correctamente']);
    }


    public function destroy($id)
    {
        $model = $this->repo->destroy($id);

    }

/*
    public function createImage($model, $data )
    {
        $image = new ImagesHelper();

        if(!is_null($data->image))
        {
                $time = time();
                $name = $time.$data->image->getClientOriginalName();

                $image->upload( $name , $data->file('image'), config('models.'.$this->section.'.imagesPath'));
                $this->repo->createImageables($model, config('models.'.$this->section.'.imagesPath') . $name);
        }
    }
*/

}
