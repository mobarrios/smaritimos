<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:39
 */

namespace App\Http\Repositories;

use App\Entities\Configs\Brancheables;
use App\Entities\Configs\Logs;
use App\Http\Helpers\ImagesHelper;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseRepo
{

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();


    public function create($data)
    {

        $model = new $this->model();

        if(is_object($data))
            $model->fill($data->all());
        else
            $model->fill($data);

        $model->save();


        //guarda imagenes
        if(config('models.'.$model->section.'.is_imageable'))
            $this->createImage($model, $data);

        //guarda log
        if(config('models.'.$model->section.'.is_logueable'))
            $this->createLog($model, 1);

        //si va a una sucursal
        if(config('models.'.$model->section.'.is_brancheable'))
            $this->createBrancheables($model, Auth::user()->branches_active_id);


        return $model;
    }



    /*
    public function create($data)
    {
        $model = new $this->model();

        if(is_object($data))
            $model->fill($data->all());
        else
            $model->fill($data);
        
        $model->save();

        return $model;
    }
    */


    public function update($id, $data)
    {
        $model = $this->model->find($id);
        
        if(is_object($data))
            $model->fill($data->all());
        else
            $model->fill($data);


            // valida si el dato nuevo es diferente al original y lo guarda en updateables
                $a = $model['original'];
                $c = $model['attributes'];


                $diffs = array_diff($a, $c);

                foreach ($diffs as $diff => $a)
                {
                    $col = $diff;
                    $data = $a;

                    $model->Updateables()->create(['column' => $col, 'data_old' => $data]);
                }
            //---

                $model->save();

                //guarda imagenes
                if(config('models.'.$model->section.'.is_imageable'))
                    $this->createImage($model, $data);

                //guarda log
                if(config('models.'.$model->section.'.is_logueable'))
                    $this->createLog($model, 3);

                //si va a una sucursal
                if(config('models.'.$model->section.'.is_brancheable'))
                    $this->createBrancheables($model, Auth::user()->branches_active_id);



        return $model;
    }


    public function destroy($id)
    {
        $model = $this->model->find($id);

        $model->delete();

        //elimina images
        if(config('models.'.$model->section.'.is_imageable'))
            $model->images()->delete();

        if($model){
            //guarda log
            $this->createLog($model, 2);
            return "ok";
        }else
            return "error";

    }


    public function ListAll($section = null)
    {
        if (config('models.' . $section . '.is_brancheable')) {
            return $this->model->whereHas('Brancheables', function ($q) {

                // lista todos los branches del usuario
                //$q->whereIn('branches_id',Auth::user()->branches_id );\

                // lista en el branch actual del usuario
                $q->where('branches_id', Auth::user()->branches_active_id);

            });

        } else {
            return $this->model;
        }
    }

    public function ListAllWhere($section = null, $columnAndValue = [])
    {
        $model = $this->model;

        foreach ($columnAndValue as $colum => $value)
            $model = $model->where($colum, $value);


        if (config('models.' . $section . '.is_brancheable'))
        {

            return $model->whereHas('Brancheables', function ($q)
            {
                $q->whereIn('branches_id', Auth::user()->branches_id);
            });

        } else
        {
            return $model;
        }
    }

    public function ListsData($data, $id)
    {
        // para agregar un campo adelatnte return $this->model->lists($data, $id)->prepend('Seleccionar...','');
        return $this->model->lists($data, $id);
    }

    public function ListsDataWhere($data, $id, $columnAndValue = [])
    {
        $model = $this->model;

        foreach ($columnAndValue as $colum => $value)
            $model = $model->where($colum, $value);

        // para agregar un campo adelatnte return $this->model->lists($data, $id)->prepend('Seleccionar...','');
        return $model->lists($data, $id);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }


    // search
    public function search($data)
    {

        //get column to search in model repo
        //$columns = $this->getColumnSearch();
        $columns = $data->filter;


        $q = $this->model->where('id', 'like', '%' . $data->search . '%');


        foreach ($columns as $column => $k) {
            $ex = explode(',', $k);


            if (isset($ex[1])) {
                if ($ex[0] == "branches") {
                    $q->orWhereHas('Brancheables', function ($r) use ($ex, $data) {
                        $r->whereHas('Branches', function ($b) use ($ex, $data) {
                            $b->where($ex[1], 'like', '%' . $data->search . '%');
                        });
                    });


                } else {

                    $q->orWhereHas($ex[0], function ($q) use ($ex, $data) {
                        $q->where($ex[1], 'like', '%' . $data->search . '%');
                    });
                }
            } else {

                $q->orWhere($ex[0], 'like', '%' . $data->search . '%');

            }


            /*
            if(is_array($k))
            {


                foreach ($k as $relation => $col)
                {
                    $q->orWhereHas($relation, function($q) use ($col , $data){
                        $q->where($col ,'like','%'.$data->search.'%');
                    });
                }
            } else
            {

                $q->orWhere($k ,'like','%'.$data->search.'%');
            }
            */
        }


        // dd($q->first()->Brancheables()->first()->Branches()->first()->name);


        //no hago get pq lo hace en el controller para paginar
        return $q;
    }

    // searchWhere
    public function searchWhere($data, $columnAndValue = [])
    {

        $q = $this->model;

        foreach ($columnAndValue as $colum => $value)
            $q = $q->where($colum, $value);


        //get column to search in model repo
        //$columns = $this->getColumnSearch();
        $columns = $data->filter;

        $q->where('id', 'like', '%' . $data->search . '%');

        foreach ($columns as $column => $k) {

            if (is_array($k)) {

                foreach ($k as $relation => $col) {

                    $q->orWhereHas($relation, function ($q) use ($col, $data)
                    {
                        $q->where($col, 'like', '%' . $data->search . '%');
                    });
                }
            } else {

                $q->orWhere($k, 'like', '%' . $data->search . '%');
            }
        }

        //no hago get pq lo hace en el controller para paginar
        return $q;
    }


    public function createLog($model, $log)
    {
        $logData = config('logs.' . $log);
        $model->logs()->create(['user_id' => Auth::user()->id, 'log' => $logData]);
    }


    public function createBrancheables($model, $branches_id)
    {
        $model->brancheables()->delete();

        if (!is_array($branches_id)) {
            $model->brancheables()->create(['branches_id' => $branches_id]);
        } else {
            foreach ($branches_id as $id)
            {
                $model->brancheables()->create(['branches_id' => $id]);
            }
        }


    }

    public function createImageables($model, $image)
    {
        if ($model->images)
            $model->images()->delete();

        $model->images()->create(['path' => $image]);
    }


    public function createAdditionables($model, $addition_id)
    {
        $model->additionables()->attach($addition_id);
    }

    public function deleteAdditionables($model, $addition_id)
    {
        $model->additionables()->detach($addition_id);
    }

    public function createImage($model, $data )
    {
        $image = new ImagesHelper();

        if(isset($data->image) && !is_null($data->image) && !is_null($data->files) )
        {
            $time = time();
            $name = $time.$data->image->getClientOriginalName();

            $image->upload( $name , $data->file('image'), config('models.'.$model->section.'.imagesPath'));
            $this->createImageables($model, config('models.'.$model->section.'.imagesPath') . $name);
        }
    }


    public function createCustomizables($model, $addition_id)
    {
        $model->customizables()->attach($addition_id);
    }

}