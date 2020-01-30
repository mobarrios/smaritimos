<?php

Route::group(['prefix' => 'articulos'], function(){

    Route::get('all',function(){

        $result = [];

        $items = \App\Entities\Admin\Items::all();
dd($items);
        
        foreach ($items as $item)

        if($item->isVencido)
            array_push($result,
                [
                    'id' => $item->id,
                    'marca'=> $item->Models->Brands->name,
                    'modelo'=> $item->Models->name,
                    'f_venciemiento' => $item->f_vencimiento,
                ]);

        return response()->json($result,200);

    });

    Route::get('vencimientos',function(){

        $result = [];

        $items = \App\Entities\Admin\Items::all();

        
        foreach ($items as $item)

        if($item->isVencido)
            array_push($result,
                [
                    'id' => $item->id,
                    'marca'=> $item->Models->Brands->name,
                    'modelo'=> $item->Models->name,
                    'f_venciemiento' => $item->f_vencimiento,
                ]);

        return response()->json($result,200);

    });

     Route::get('id/{articulosId?}',function($articulosId){

        $result = [];

        $items = \App\Entities\Admin\Items::where('id',$articulosId)->get();

        
        foreach ($items as $item)

            array_push($result,
                [
                    'id' => $item->id,
                    'marca'=> $item->Models->Brands->name,
                    'modelo'=> $item->Models->name,
                    'f_vencimiento' => $item->f_vencimiento,
                    'f_emision' => $item->f_emision,
                    'n_serie' => $item->n_serie,
                    'obs' => $item->obs

                ]);

        return response()->json($result,200);

    });

});


// sucursales
Route::group(['prefix' => 'depositos'], function () {

    Route::get('all', function () {
        $result = [];

        $models = \App\Entities\Configs\Branches::all();

        foreach ($models as $model)

            array_push($result,
                [
                    'id' => $model->id,
                    'name' => $model->name,
                    'brands'=> $model->BrandsName,
                    
                ]);

        return response()->json($result,200);
    });
});


// // brands
// Route::group(['prefix' => 'brands'], function () {

//     Route::get('all', function () {
//         return response()->json(\App\Entities\Admin\Brands::get(['id'=>'id','name'=>'name']));
//     });
// });

// // models
// Route::group(['prefix' => 'models'], function () {

//     Route::get('all', function () {

//         $result = [];

//         $models = \App\Entities\Admin\Models::where('stock_min_ec','!=','NULL')->get();

//         foreach ($models as $model)

//                 array_push($result,
//                     [
//                         'id' => $model->id,
//                         'brands' => ['id' => $model->Brands->id, 'name' => $model->Brands->name],
//                         'models' => ['id' => $model->id, 'name' => $model->name, 'images' => $model->imagesAll, 'link_youtube'=>$model->link_youtube,'nombre_fantasia'=>$model->nombre_fantasia],
//                         'price_actual' => (is_null($model->activeListPrice) ? NULL :  $model->activeListPrice->price_net ),
//                         'price_ec' => (is_null($model->activeListPrice) ? NULL : $model->activeListPrice->price_public) ,
//                         'categories' => $model->CategoriesName,
//                         'stock_min' => $model->stock_min_ec,
//                         'specs' => $model->SpecsName,
//                         'types_id' => $model->types_id,
//                     ]);


//         return response()->json($result,200);
//     });

//     Route::get('id/{modelsId}', function ($modelsId) {

//         $result = [];

//         $model = \App\Entities\Admin\Models::find($modelsId);

//             $model->StockByColorsTallesApi();

//             array_push($result,
//             [
//                 'id' => $model->id,
//                 'brands' => ['id'=> $model->Brands->id,'name'=> $model->Brands->name],
//                 'models' => ['id'=> $model->id,'name'=>$model->name,'images'=> $model->imagesAll , 'link_youtube'=>$model->link_youtube,'nombre_fantasia'=>$model->nombre_fantasia],
//                 'price_actual' => (is_null($model->activeListPrice) ? NULL :  $model->activeListPrice->price_net ),
//                 'price_ec' => (is_null($model->activeListPrice) ? NULL : $model->activeListPrice->price_public) ,
//                 'categories'=> $model->CategoriesName,
//                 'stock' => $model->StockByColorsApi(),
//                 'stock_talles' => $model->StockByColorsTallesApi(),
//                 'stock_min' => $model->stock_min_ec,
//                 'adicionales' => $model->AdditionablesApi(),
//                 'specs' => $model->SpecsName,
//                 'types_id' => $model->types_id
//             ]);

//         return response()->json($result,200);
//     });


//     Route::get('categories/{categoriesId}', function ($categoriesId) {

//         $result = [];

//         $models = \App\Entities\Moto\Models::where('stock_min_ec','!=','NULL')->whereHas('Categories',function($q)use($categoriesId){
//             $q->where('categories_id',$categoriesId);
//         })->get();

//         foreach ($models as $model)

//             array_push($result,
//                 [
//                     'id' => $model->id,
//                     'brands' => ['id'=> $model->Brands->id,'name'=> $model->Brands->name],
//                     'models' => ['id'=> $model->id,'name'=>$model->name,'images'=> $model->imagesAll, 'link_youtube'=>$model->link_youtube,'nombre_fantasia'=>$model->nombre_fantasia ],
//                     'price_actual' => (is_null($model->activeListPrice) ? NULL :  $model->activeListPrice->price_net ),
//                     'price_ec' => (is_null($model->activeListPrice) ? NULL : $model->activeListPrice->price_public) ,
//                     'categories'=> $model->CategoriesName
//                 ]);


//         return response()->json($result,200);
//     });


//     Route::get('brands/{brandsId}', function ($brandsId) {

//         $result = [];

//         $models = \App\Entities\Moto\Models::where('stock_min_ec','!=','NULL')->whereHas('Brands',function($q)use($brandsId){
//             $q->where('id',$brandsId);
//         })->get();

//         foreach ($models as $model)

//             array_push($result,
//                 [
//                     'id' => $model->id,
//                     'brands' => ['id'=> $model->Brands->id,'name'=> $model->Brands->name],
//                     'models' => ['id'=> $model->id,'name'=>$model->name,'images'=> $model->imagesAll, 'link_youtube'=>$model->link_youtube,'nombre_fantasia'=>$model->nombre_fantasia ],
//                     'price_actual' => (is_null($model->activeListPrice) ? NULL :  $model->activeListPrice->price_net ),
//                     'price_ec' => (is_null($model->activeListPrice) ? NULL : $model->activeListPrice->price_public) ,
//                     'categories'=> $model->CategoriesName
//                 ]);


//         return response()->json($result,200);
//     });


// });

// // cateogories
// Route::group(['prefix' => 'categories'], function () {

//     Route::get('all', function () {
//         return response()->json(\App\Entities\Moto\Categories::where('visible_ec',1)->get(['id'=>'id','name'=>'name']));
//     });
// });



// Route::group(['prefix'=>'locations'],function(){

//     Route::get('provincias',function(){
//        return response()->json(\App\Entities\Configs\Provincias::get(['id'=>'id','name'=>'name']));
//     });

//     Route::get('municipios/{provincia_id?}',function($provincia_id){
//         return response()->json(\App\Entities\Configs\Municipios::where('provincia_id',$provincia_id)->get(['id'=>'id','name'=>'name']));

//     });

//     Route::get('localidades/{municipio_id?}',function($municipio_id){
//         return response()->json(\App\Entities\Configs\Localidades::where('municipio_id',$municipio_id)->get(['id'=>'id','name'=>'name']));

//     });
// });

// Route::group(['prefix'=>'registros'],function(){

//     Route::get('all',function(){

//         $registros = \App\Entities\Moto\Registros::all();
//         $result = [];

//         foreach ($registros as $registro)
//             {

//             $loc = [];
//             $add = [];


//                 foreach( $registro->Localidades as $localidad)
//                {
//                    array_push($loc, [
//                        'id' => $localidad->id,
//                        'name' => $localidad->name
//                    ]);
//                }

//                array_push($result,
//                    [
//                        'id' => $registro->id,
//                        'name' => ['id' => $registro->id, 'name' => $registro->name],
//                        'localidades_id' => $loc,
//                        'alta_patente' => $registro->alta_patente_importe,
//                        'larga_distancia' => $registro->larga_distancia_importe,
//                        'impuesto_sello_importe' => $registro->impuesto_sello_importe,
//                    ]);
//                }

//         return response()->json($result);
//     });
// });

// Route::group(['prefix'=>'sales'],function(){

//     Route::post('clients',function(\Illuminate\Http\Request $request)
//     {

//         $data = collect([
//             'dni' => $request->dni,
//             'name' => $request->name,
//             'last_name' => $request->last_name,
//             'sexo' => $request->sexo,
//             'phone1' => $request->phone1,
//             'address' => $request->address ,
//             // id de localidades_id del api anterior
//             'localidades_id' => $request->localidades_id,
//             //no
//             'prospecto' => 0,
//             //no
//             'iva_conditions_id' => 1,
//         ]);

//         $clientsRepo = new \App\Http\Repositories\Moto\ClientsRepo();
//         $clients = $clientsRepo->searchForEcommerce($data);

//         return response()->json($clients);
//     });


//     Route::post('items',function(\Illuminate\Http\Request $request)
//     {

//         $request = collect([
//             //fecha de entrega
//             'date_confirm'=>date('Y-m-d'),
//             //usuario a confirmar ( se asigna a rebe )
//             'users_id' => 7 ,
//             //estado RESERVA
//             'status' => 2,
//             //sucursal de entrega
//             'branches_confirm_id'=> $request->branches_confirm_id,
//             //id de cliente , en el caso que no se encuentre se da de alta
//             //automaticamente
//             'clients_id' => $request->clients_id,
//             //no
//             'budgets_id' => 0,
//             'items' =>

//                     $request->items
//                     /*[
//                         //id modelo
//                         'models_id' => $request->items->models_id,
//                         //id color
//                         'colors_id' => $request->items->colors_id,
//                         //talle
//                         'talles' => $request->items->talles,
//                     ]*/
//                 ,
//             //los adicionales se toman de api anterior de modelos

//             'additionals' => $request->additionals,
//                 /*[
//                     [
//                         'id'=> 5 ,
//                         'amount' => 2500
//                     ],
//                     [
//                         'id'=> 7 ,
//                         'amount' => 2305
//                     ]
//                 ],*/
//             //array de pagos con pagos realizados
//             'payments' => $request->payments,
//                 /*[
//                     [
//                         'date'=> 2018-06-11 ,
//                         'amount' => 1500,
//                         'financials_id' => 4,
//                         'status_id' => 1 ,
//                         'pay_methods_id' => 3,
//                         'type' => 0,
//                         'banks_id' => 1 ,
//                         'number' => 1 ,
//                         'term' => 12,
//                     ]
//                 ],*/
//         ]);

//         \Illuminate\Support\Facades\Auth::loginUsingId(1,true);

//         $salesRepo =  new \App\Http\Repositories\Moto\SalesRepo();
//         $sale = $salesRepo->createFromEcommerce($request);

//         return response()->json($sale);
//     });
// });



/*//items
Route::group(['prefix' => 'items'], function () {

    Route::get('id/{itemsId}', function ($itemsId) {

        $result = [];

        $item = \App\Entities\Moto\Items::find($itemsId);

        array_push($result,
            [
                'id' => $item->id,
                'brands' => ['id'=> $item->Models->Brands->id,'name'=> $item->Models->Brands->name],
                'models' => ['id'=> $item->Models->id,'name'=>$item->Models->name,'images'=> $item->Models->imagesAll ],
                'year' => $item->year,
                'price_actual' => (is_null($item->Models->activeListPrice) ? NULL : $item->Models->activeListPrice->price_net),
                'categories'=> $item->Models->CategoriesName
            ]);

        return response()->json($result,200);

    });


    Route::get('brands/{brandsId?}', function ($brandsId) {

        $result = [];

        $items = \App\Entities\Moto\Items::whereHas('Models', function ($model) use ($brandsId) {
            $model->whereHas('Brands', function ($brand) use ($brandsId) {
                $brand->where('id', $brandsId);
            });
        })->get();

        foreach ($items as $item)
        {
            array_push($result,
                [
                    'id' => $item->id,
                    'brands' => ['id'=> $item->Models->Brands->id,'name'=> $item->Models->Brands->name],
                    'models' => ['id'=> $item->Models->id,'name'=>$item->Models->name,'images'=> $item->Models->imagesAll ],
                    'year' => $item->year,
                    'price_actual' => (is_null($item->Models->activeListPrice) ? NULL : $item->Models->activeListPrice->price_net),
                    'categories'=> $item->Models->CategoriesName

                ]);
        }


        return response()->json($result,200);
    });

    Route::get('models/{modelsId?}', function ($modelsId) {

        $result = [];

        $items = \App\Entities\Moto\Items::whereHas('Models', function ($model) use ($modelsId) {
            $model->where('id', $modelsId);
        })->get();

        foreach ($items as $item)
        {
            array_push($result,
                [
                    'id' => $item->id,
                    'brands' => ['id'=> $item->Models->Brands->id,'name'=> $item->Models->Brands->name],
                    'models' => ['id'=> $item->Models->id,'name'=>$item->Models->name,'images'=> $item->Models->imagesAll ],
                    'year' => $item->year,
                    'price_actual' => (is_null($item->Models->activeListPrice) ? NULL : $item->Models->activeListPrice->price_net),
                    'categories'=> $item->Models->CategoriesName

                ]);
        }

        return response()->json($result,200);
    });

    Route::get('categories/{categoriesId?}', function ($categoriesId) {

        $result = [];
        $items = \App\Entities\Moto\Items::with('Models', 'Models.Categories')->whereHas('Models', function ($model) use ($categoriesId) {
            $model->whereHas('Categories', function ($categories) use ($categoriesId) {
                $categories->where('models_categories.categories_id', $categoriesId);
            });
        })->get();


        foreach ($items as $item)
        {
            array_push($result,
                [
                    'id' => $item->id,
                    'brands' => ['id'=> $item->Models->Brands->id,'name'=> $item->Models->Brands->name],
                    'models' => ['id'=> $item->Models->id,'name'=>$item->Models->name,'images'=> $item->Models->imagesAll ],
                    'year' => $item->year,
                    'price_actual' => (is_null($item->Models->activeListPrice) ? NULL : $item->Models->activeListPrice->price_net),
                    'categories'=> $item->Models->CategoriesName

                ]);
        }

        return response()->json($result, 200);
    });

});*/