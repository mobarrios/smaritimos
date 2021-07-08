@extends('template')

@section('sectionContent')
    <div class="row" ng-app="myApp">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border text-center">
                    <h3 class="box-title">
                        <strong>{!! isset($models) ? "Remito # ". $models->id :  'Nuevo Remito' !!}</strong></h3>
                </div>
                <div class="box-body">

                    <div>
                        <div ng-controller="myCtrl">
                            @if(isset($models))
                                {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
                            @else
                                {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
                            @endif

                            <div class="col-xs-2  form-group">
                                {!! Form::label('Fecha Remito') !!}
                                {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
                            </div>

                            <div class="col-xs-3 form-group">
                                {!! Form::label('Nro. Remito') !!}
                                {!! Form::text('number', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="col-xs-3 form-group">
                                {!! Form::label('Proveedor') !!}
                                {!! Form::select('providers_id', $providers, null, ['class'=>'provider select2 form-control']) !!}
                            </div>

                            <div class="col-xs-2 form-group">
                                {!! Form::label('Imagen Remito') !!}
                                {!! Form::file('image',['class'=>'form-control']) !!}
                            </div>

                            {!! Form::hidden('branches_id', \Illuminate\Support\Facades\Auth::user()->BranchesActive->id ) !!}

                            <div class="col-xs-2 form-group" style="padding-top: 2%">
                                <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                                @if(isset($models))
                                    <a href="#" data-action="{!! route("moto.dispatches.addItems") !!}"
                                       data-toggle="control-sidebar"
                                       class="btn btn-default"><span class="fa fa-plus"></span></a>
                                @endif
                            </div>

                            {!! Form::close() !!}

                            <div class=" col-xs-12 form-group">
                                {!! Form::label('Pedido de Mercaderia') !!}
                                <select class="form-control">
                                    <option>Seleccionar...</option>

                                        <option ng-repeat="a in data" ng-click="onCategoryChange(a.id)">
                                            # @{{ a.id }}</option>

                                </select>
                            </div>

                            <div ng-show="purchases" class="col-xs-12 ">
                                <table class="table ">
                                    <thead>
                                    <th>#</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>N Motor</th>
                                    <th>N Cuadro</th>
                                    <th></th>
                                    </thead>
                                    <tbody>

                                    <tr ng-repeat="purchase in purchases ">
                                        <td>@{{ purchase.id }}</td>
                                        <td>@{{ purchase.purchases_orders_items.models.brands.name }}</td>
                                        <td>@{{ purchase.purchases_orders_items.models.name }}</td>
                                        <td>@{{ purchase.purchases_orders_items.colors.name }}</td>
                                        <td>
                                            <input class="form-control input-sm n_motor_@{{ purchase.id }}" type="text"
                                                   placeholder="N Motor">
                                            <small class="error_n_motor_@{{ purchase.id }} text-danger "></small>
                                        </td>
                                        <td>
                                            <input class="form-control input-sm n_cuadro_@{{ purchase.id }}" type="text"
                                                   placeholder="N Cuadro">
                                            <small class="error_n_cuadro_@{{ purchase.id }} text-danger"></small>
                                        </td>
                                        <td>
                                            <button class="btn" ng-click="addITem(purchase)"><span
                                                        class="fa fa-share"></span></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- Button trigger modal -->


                            @if(isset($models))

                                <div class="col-xs-12">
                                    <hr>
                                    <label>Articulos en el Remito</label>

                                    <table class="table">
                                        <thead>
                                        <th></th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Color</th>
                                        <th>N Motor</th>
                                        <th>N Cuadro</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($models->DispatchesItems as $item)
                                            <tr>
                                                <td><input class='invoice' type="checkbox" value="{{$item->Items->id}}"
                                                           name="dispatchesInvoiced[{{$item->Items->id}}]">
                                                </td>
                                                <td>{{$item->Items->Models->Brands->name}}</td>
                                                <td>{{$item->Items->Models->name}}</td>
                                                <td>{{$item->Items->Colors->name}}</td>
                                                <td>{{$item->Items->n_motor}}</td>
                                                <td>{{$item->Items->n_cuadro}}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-default"
                                                       href="{{route('admin.dispatches.deleteItems',[$item->id,$models->id])}}">
                                                        <span class="text-danger fa fa-trash"></span></a>
                                                    <a class="btn btn-xs btn-default"
                                                       href="{{route('admin.dispatches.editItems',[$item->id,$models->id])}}">
                                                        <span class="text-success fa fa-edit"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button class="btn btn-block" ng-click="asignarFactura()">Asignar Factura de
                                        Compra
                                    </button>

                                </div>
                                @endif

                                @endsection


                                @section('formAside')

                                @include('admin.partials.asideOpenForm')

                                @if(isset($models))

                                        <!-- .control-sidebar-menu -->

                                @if(isset($modelItems))
                                    {!! Form::model($modelItems,['route'=> ['admin.dispatches.updateItems', $modelItems->id,$models->id], 'files' =>'true']) !!}
                                @else
                                    {!! Form::open(['route'=> ['admin.dispatches.addItems' ], 'files' =>'true']) !!}
                                @endif

                                {!! Form::hidden('dispatches_id',$models->id ,['class'=>'dispatches_id']) !!}
                                {!! Form::hidden('branches_id',$models->Brancheables->first()->Branches->id) !!}

                                <div class="col-xs-12 form-group">
                                    {!! Form::label('Modelo') !!}
                                    {!! Form::select('models_id', $modelos, null, ['class'=>'form-control select2','id' => 'models_id']) !!}
                                </div>
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('Color') !!}
                                    {!! Form::select('colors_id', $colors, null, ['class'=>'form-control select2']) !!}
                                </div>

                                <div class="col-xs-12 form-group motos">
                                    {!! Form::label('N Motor') !!}
                                    {!! Form::text('n_motor', null, ['class'=>'form-control']) !!}
                                </div>
                                <div class="col-xs-12 form-group motos">
                                    {!! Form::label('N Cuadro') !!}
                                    {!! Form::text('n_cuadro', null, ['class'=>'form-control']) !!}
                                </div>


                                <div class="col-xs-12 form-group accesorios">
                                    {!! Form::label('Talle') !!}
                                    {!! Form::text('talle', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
                                </div>
                                {!! Form::close() !!}
                                        <!-- /.control-sidebar-menu -->
                            @endif
                            @include('admin.partials.asideCloseForm')
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-footer clearfix">
                <button type="submit" class="btn btn-default">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>



@endsection


@section('js')
    <script>
        var app = angular.module("myApp", []);

        app.controller("myCtrl", function ($scope, $http) {


            $("#models_id").on('change',function(ev){
                var id = ev.target.selectedOptions[0].value;

                $http.get("moto/models/show/" + id)
                        .then(function (response) {
                            if(response.data.types_id == "1"){


                                $(".motos input").attr('disabled',false).prop('disabled',false);
                                $(".motos").stop().fadeIn(400, function(){
                                    $(".accesorios input").attr('disabled',true).prop('disabled',true);
                                    $(".accesorios").stop().fadeOut();
                                });
                            }else {
                                $(".motos input").attr('disabled',true).prop('disabled',true);
                                $(".motos").fadeOut(400,function(){
                                    $(".accesorios").stop().fadeIn();
                                    $(".accesorios input").attr('disabled',false).prop('disabled',false);
                                });

                            }

                        });
            });

            //$('.provider').on('change',function()
            //{
                var id = $('.provider').val();
                $http.get("moto/purchasesOrdersByProviders/" + id)
                        .then(function (response) {
                            $scope.data = response.data;

                            console.table(response.data);
                        });
           // });





            $scope.onCategoryChange = function (id)
            {
                $http.get("moto/dispatchesItems/" + id)
                        .then(function (response) {
                            $scope.purchases = response.data;
                            console.log(response.data);
                        });
            };

            $scope.addITem = function (purchase) {

                var n_motor = $('.n_motor_' + purchase.id).val();
                var n_cuadro = $('.n_cuadro_' + purchase.id).val();
                var dispatches_id = $('.dispatches_id').val();


                if (n_motor == '' || n_cuadro == '') {
                    if (!n_motor == "") {

                        //valida nmotor unique
                        $http.get("moto/items/findMotor/" + n_motor)
                                .then(function (response) {
                                    if (response.data)
                                        $('.error_n_motor_' + purchase.id).text('El Nro. de MOTOR ya se encuentra ingresado');
                                });

                    } else {
                        $('.error_n_motor_' + purchase.id).text('* Requerido');

                    }

                    if (!n_cuadro == "") {
                        //valida nmotor unique
                        $http.get("moto/items/findCuadro/" + n_cuadro)
                                .then(function (response) {
                                    if (response.data)
                                        $('.error_n_cuadro_' + purchase.id).text('El Nro. de CUADRO ya se encuentra ingresado');
                                });
                    }
                    else {
                        $('.error_n_cuadro_' + purchase.id).text('* Requerido');
                    }
                }
                else {

                    $http.post("moto/dispatches/addNew", {
                        ajax: true,
                        n_motor: n_motor,
                        n_cuadro: n_cuadro,
                        models_id: purchase.purchases_orders_items.models_id,
                        colors_id: purchase.purchases_orders_items.colors_id,
                        dispatches_id: dispatches_id,
                        dispatches_items_id: purchase.id

                    }).success(function (data) {
                        window.location.href = "moto/dispatches/edit/" + dispatches_id;

                    });
                }

            };

            $scope.asignarFactura = function () {

                $("input:checkbox").each(function () {

                    if ($(this).prop('checked'))
                        console.log($(this).val());

                });

            };

        });
    </script>
@endsection
