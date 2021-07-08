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

                            <div class="col-xs-4 form-group">
                                {!! Form::label('Proveedor') !!}
                                {!! Form::select('providers_id', $providers, null, ['class'=>'provider select2 form-control']) !!}
                            </div>

                            <div class="col-xs-3 form-group">
                                {!! Form::label('Imagen Remito') !!}
                                {!! Form::file('image',['class'=>'form-control']) !!}
                            </div>

                            {!! Form::hidden('branches_id', \Illuminate\Support\Facades\Auth::user()->BranchesActive->id ) !!}

                            <div class="col-xs-12 form-group">
                                <button type="submit" class="btn btn-sm btn-default"><span class="fa fa-save"></span>
                                    Guardar
                                </button>
                            </div>
                            {!! Form::close() !!}

                            @if(isset($models))
                                <div class=" col-xs-12">
                                    {!! Form::label('Pedido de Mercadería') !!}
                                    <div class='input-group'>
                                        {!! Form::select('dispatches', $providers_dispatches , null , ['class'=>'select2 form-control', 'id' => 'purchasesOrdersId']) !!}
                                        <buton id="dispatches_items" class="btn btn-default input-group-addon">
                                            <span class="fa fa-eye"></span>
                                        </buton>
                                    </div>

                                </div>
                            @endif


                        </div>

                    </div>

                    <!-- Button trigger modal -->


                    @if(isset($models))

                        <div class="col-xs-12">
                            <hr>
                            <label>Articulos en el Remito</label>

                            {{--
                            <button type="button" class="pull-right btn btn-xs btn-primary " data-toggle="modal"
                                    data-target="#myModal"><span class="fa fa-plus"></span> Agregar Artículos
                            </button>
                            --}}

                            <table class="table">
                                <thead>
                                {{--<th></th>--}}
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Datos</th>
                                {{--<th></th>--}}
                                </thead>
                                <tbody>

                                @foreach($models->DispatchesItems as $item)
                                    <tr>
                                        {{--
                                        <td><input class='invoice' type="checkbox" value="{{$item->Items->id}}"
                                                   name="dispatchesInvoiced[{{$item->Items->id}}]">
                                        </td>
                                       --}}
                                        <td>{{$item->Items->Models->Brands->name}}</td>
                                        <td>{{$item->Items->Models->name}}</td>


                                            <td> NSerie : {{$item->Items->serial_number}}</td>

                                        {{--
                                        <td>
                                            <a class="btn btn-xs btn-default"
                                               href="{{route('moto.dispatches.deleteItems',[$item->id,$models->id])}}">
                                                <span class="text-danger fa fa-trash"></span></a>
                                            <a class="btn btn-xs btn-default"
                                               href="{{route('moto.dispatches.editItems',[$item->id,$models->id])}}">
                                                <span class="text-success fa fa-edit"></span></a>
                                        </td>
                                        --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <hr>
                            @if(!is_null($models->Invoices))
                                <h6><strong>Factura de Compra</strong></h6>
                                    <table class="table">
                                        <tr>
                                            <td>{!! $models->Invoices->date !!}</td>
                                            <td>{!! $models->Invoices->number !!}</td>
                                            <td>$ {!! $models->Invoices->total !!}</td>
                                        </tr>
                                    </table>
                            @endif


                            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modalFactura">
                                <span class="fa fa-file-o"></span> Asignar Factura de Compra
                            </button>


                        </div>
                    @endif

                    @endsection


                    @section('modal')

                        <div class="modal fade " id="modalFactura" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Datos de Factura</h4>
                                    </div>
                                    <div class="modal-body">

                                        {!! Form::open(['route'=>'admin.dispatches.invoice']) !!}


                                            {!! isset($models) ? Form::hidden('dispatches_id', $models->id ) : '' !!}

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Fecha') !!}
                                            {!! Form::text('date', null, ['class'=>'datePicker form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Nro. Factura') !!}
                                            {!! Form::text('number', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Tipo Comprobante') !!}
                                            {!! Form::text('number', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-6">
                                            {!! Form::label('SubTotal') !!}
                                            {!! Form::text('sub_total', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-6">
                                            {!! Form::label('Total') !!}
                                            {!! Form::text('total', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-6">
                                            {!! Form::label('Flete') !!}
                                            {!! Form::text('flete', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-6">
                                            {!! Form::label('Seguro') !!}
                                            {!! Form::text('seguro', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-3">
                                            {!! Form::label('IVA 21%') !!}
                                            {!! Form::text('iva_total', null, ['class'=>'form-control' ]) !!}
                                        </div>
                                        <div class="form-group col-xs-6 col-md-3">
                                            {!! Form::label('IVA 10,5%') !!}
                                            {!! Form::text('iva_total', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-3">
                                            {!! Form::label('Total Gravado 21%') !!}
                                            {!! Form::text('iva_total', null, ['class'=>'form-control' ]) !!}
                                        </div>
                                        <div class="form-group col-xs-6 col-md-3">
                                            {!! Form::label('Total Gravado 10,5%') !!}
                                            {!! Form::text('iva_total', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Percepcion IVA') !!}
                                            {!! Form::text('iva_percepcion', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Percepcion IIBB') !!}
                                            {!! Form::text('iibb_percepcion', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="form-group col-xs-6 col-md-4">
                                            {!! Form::label('Impuestos Internos ') !!}
                                            {!! Form::text('iibb_percepcion', null, ['class'=>'form-control' ]) !!}
                                        </div>

                                        <div class="modal-footer">
                                            <a data-toggle="control-sidebar" class="btn btn-default">Cancelar</a>
                                            {!! Form::submit('Agregar', ['class'=> 'btn btn-primary']) !!}

                                        </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>


                            {{--
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Seleccionar Artículo</h4>
                                            </div>
                                            <div class="modal-body">
                                                @if(isset($models))
                                                    @if(isset($modelItems))
                                                        {!! Form::model($modelItems,['route'=> ['moto.dispatches.updateItems', $modelItems->id,$models->id], 'files' =>'true']) !!}
                                                    @else
                                                        {!! Form::open(['route'=> ['moto.dispatches.addItems' ], 'files' =>'true']) !!}
                                                    @endif

                                                    {!! Form::hidden('dispatches_id',$models->id ,['class'=>'dispatches_id']) !!}
                                                    {!! Form::hidden('branches_id',$models->Brancheables->first()->Branches->id) !!}

                                                    <div class="col-xs-12">
                                                        {!! Form::label('Modelo') !!}
                                                        {!! Form::select('models_id', $modelos, null, ['class'=>'form-control ','id' => 'models_id']) !!}
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        {!! Form::label('Color') !!}
                                                        {!! Form::select('colors_id', $colors, null, ['class'=>'form-control ']) !!}
                                                    </div>
                                                    <div class="col-xs-12  motos">
                                                        {!! Form::label('N Motor') !!}
                                                        {!! Form::text('n_motor', null, ['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="col-xs-12  motos">
                                                        {!! Form::label('N Cuadro') !!}
                                                        {!! Form::text('n_cuadro', null, ['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="col-xs-12 form-group accesorios">
                                                        {!! Form::label('Talle') !!}
                                                        {!! Form::text('talle', null, ['class'=>'form-control']) !!}
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="modal-footer">
                                                <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                                --}}
                            @endsection





                            @section('js')
                                <script>

                                    $('#dispatches_items').on('click', function () {
                                        var purchasesOrdersId = $('#purchasesOrdersId').val();
                                        window.location.href = 'admin/dispatches/purchasesItems/' + purchasesOrdersId + '/' + '{{ isset($models)? $models->id : '' }}';
                                    });


                                    var app = angular.module("myApp", []);

                                    app.controller("myCtrl", function ($scope, $http) {


                                        $("#models_id").on('change', function (ev) {
                                            var id = ev.target.selectedOptions[0].value;

                                            $http.get("admin/models/show/" + id)
                                                    .then(function (response) {
                                                        if (response.data.types_id == "1") {


                                                            $(".motos input").attr('disabled', false).prop('disabled', false);
                                                            $(".motos").stop().fadeIn(400, function () {
                                                                $(".accesorios input").attr('disabled', true).prop('disabled', true);
                                                                $(".accesorios").stop().fadeOut();
                                                            });
                                                        } else {
                                                            $(".motos input").attr('disabled', true).prop('disabled', true);
                                                            $(".motos").fadeOut(400, function () {
                                                                $(".accesorios").stop().fadeIn();
                                                                $(".accesorios input").attr('disabled', false).prop('disabled', false);
                                                            });

                                                        }

                                                    });
                                        });

                                        //$('.provider').on('change',function()
                                        //{
                                        var id = $('.provider').val();
                                        $http.get("admin/purchasesOrdersByProviders/" + id)
                                                .then(function (response) {
                                                    $scope.data = response.data;

                                                    console.table(response.data);
                                                });
                                        // });


                                        $scope.onCategoryChange = function (id) {
                                            $http.get("admin/dispatchesItems/" + id)
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
                                                    $http.get("admin/items/findMotor/" + n_motor)
                                                            .then(function (response) {
                                                                if (response.data)
                                                                    $('.error_n_motor_' + purchase.id).text('El Nro. de MOTOR ya se encuentra ingresado');
                                                            });

                                                } else {
                                                    $('.error_n_motor_' + purchase.id).text('* Requerido');

                                                }

                                                if (!n_cuadro == "") {
                                                    //valida nmotor unique
                                                    $http.get("admin/items/findCuadro/" + n_cuadro)
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

                                                $http.post("admin/dispatches/addNew", {
                                                    ajax: true,
                                                    n_motor: n_motor,
                                                    n_cuadro: n_cuadro,
                                                    models_id: purchase.purchases_orders_items.models_id,
                                                    colors_id: purchase.purchases_orders_items.colors_id,
                                                    dispatches_id: dispatches_id,
                                                    dispatches_items_id: purchase.id

                                                }).success(function (data) {
                                                    window.location.href = "admin/dispatches/edit/" + dispatches_id;

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
