@extends('template.model_form')

@section('css')
    <style>
        .autocompletedemoCustomTemplate .autocomplete-custom-template li {
            border-bottom: 1px solid #ccc;
            height: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            white-space: normal;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template li:last-child {
            border-bottom-width: 0;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title,
        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-metadata {
            display: block;
            line-height: 2;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title md-icon {
            height: 18px;
            width: 18px;
        }

        .search {
            color: rgba(0, 0, 0, 0.87);
            background-color: rgb(250, 250, 250);
            padding: 16px;

        }

        .select2-template-title {
            font-size: 12px;
            font-weight: bold;
            display: block;
            width: 100%;
        }

        .select2-template-text {
            font-size: 12px;
            display: block;
            width: 100%;
            padding-left: 5px;
        }

        .select2-template-container {
            border-bottom: 1px solid #ddd;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: rgba(162, 162, 162, 0.21);

        }


    </style>
@endsection


@section('form_title')
    {{ (isset($models)? 'Venta # '. $models->id : 'Nueva Venta' )  }}
@endsection

@section('form_inputs')
    <div ng-app="app" ng-controller="ctl">

        <div class="col-xs-12 content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Datos Personales</h3>
                </div>

                <div class="box-body">


                    @if(!isset($models))
                        <div class="search">

                            <p>Antes de crear un prospecto, busque si ya existe.</p>
                            <select id="search" class="select2 form-control">
                                <option value="seleccione">Seleccione... ~ ~</option>
                                @forelse($clients as $c)
                                    <option value="{!! $c->id !!}">
                                        {!! $c->fullname !!} ~ {!! $c->dni !!} ~ {!! $c->email !!} ~ {!! $c->phone !!}

                                    </option>
                                @empty

                                @endforelse
                            </select>
                        </div>

                    @endif



                    @if(Session::has('client'))
                        {!! Form::model(Session::get('client'),['route'=> [config('models.clients.updateRoute')],  'title' =>"Editar cliente", 'id' => 'formClient']) !!}
                    @elseif(isset($models))
                        {!! Form::model($models->clients,['route'=> [config('models.clients.updateRoute')],  'title' =>"Editar cliente", 'id' => 'formClient']) !!}
                    @else
                        {!! Form::open(['route'=> [config('models.clients.storeRoute')],  'title' =>"Crear cliente", 'id' => 'formClient']) !!}
                    @endif



                    {!! Form::hidden('model',null,['ng-model' => 'model','id' => 'modelId']) !!}
                    {!! Form::hidden('validation','Sales') !!}

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('last_name', "APELLIDO") !!}
                        {!! Form::text('last_name', old('last_name') ? old('last_name') : null, ['class'=>'form-control','ng-model' => 'last_name']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('name', "NOMBRE") !!}
                        {!! Form::text('name', old('name') ? old('name') : null, ['class'=>'form-control','ng-model' => 'name']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('dni', "DNI") !!}
                        {!! Form::text('dni', old('dni') ? old('dni') : null, ['class'=>'form-control','ng-model' => 'dni']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('sexo', "SEXO") !!}
                        {!! Form::select('sexo', ['masculino' => 'masculino','femenino' => 'femenino'],old('sexo') ? old('sexo') : 'masculino', ['class'=>'form-control','ng-model' => 'sexo']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('email', "EMAIL") !!}
                        {!! Form::text('email', old('email') ? old('email') : null, ['class'=>'form-control','ng-model' => 'email']) !!}
                    </div>


                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('nacionality', "NACIONALIDAD") !!}
                        {!! Form::text('nacionality', old('nacionality') ? old('nacionality') : null, ['class'=>'form-control','ng-model' => 'nacionality']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('phone1', "TELÉFONO") !!}
                        {!! Form::text('phone1',  old('phone1') ? old('phone1') : null, ['class'=>'form-control','ng-model' => 'phone1']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('address', "DIRECCIÓN") !!}
                        {!! Form::text('address',  old('address') ? old('address') : null, ['class'=>'form-control','ng-model' => 'address']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('city', "CIUDAD") !!}
                        {!! Form::text('city',  old('city') ? old('city') : null, ['class'=>'form-control','ng-model' => 'city']) !!}
                    </div>


                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('location', "LOCALIDAD") !!}
                        {!! Form::text('location',  old('location') ? old('location') : null, ['class'=>'form-control','ng-model' => 'location']) !!}
                    </div>


                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('province', "PROVINCIA") !!}
                        {!! Form::text('province',  old('province') ? old('province') : null, ['class'=>'form-control','ng-model' => 'province']) !!}
                    </div>


                    <div class="col-xs-12 col-lg-3 form-group" style="padding-top: 2%;">


                        @if(!isset($models))

                            <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                            <button type="reset" id="reset" class="btn btn-danger"><span class="fa fa-trash"></span>
                            </button>
                        @endif

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>


        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif



        {!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}

        @if(Session::has('client'))
            {!! Form::hidden('clients_id', Session::get('client')->id) !!}
        @elseif(isset($models))
            {!! Form::hidden('clients_id', $models->clients->id) !!}
        @else
            {!! Form::hidden('clients_id',  null) !!}
        @endif

        <div class="col-xs-12 content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Cabecera</h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 col-md-6 form-group">
                        {!! Form::label('Tipo de Operación') !!}
                        {!! Form::select('type',['Reserva'=>'Reserva', 'Venta' => 'Venta'], null, ['class'=>' form-control select2']) !!}
                    </div>


                    <div class="col-xs-12 col-md-5 form-group">
                        {!! Form::label('Presupuestos ') !!}
                        {!! Form::select('budgets_id', $budgets, null, ['class'=>'form-control select2','id'=>'budgets_id']) !!}
                    </div>

                    <div class="col-xs-12 col-md-1 form-group">
                        <br>
                        <button class="btn btn0btn-default" ng-click="ver()" type="button" id="ver">Ver</button>
                    </div>

                    <div class="col-xs-12">
                        <table class="table">
                            <tr ng-repeat="items in budgets.all_items">
                                <td>@{{ items.brands.name }} @{{ items.name }}</td>
                                <td> $ @{{ items.pivot.price_budget }}</td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-xs-6  form-group">
                        {!! Form::label('Fecha Pactada') !!}
                        {!! Form::text('date_confirm', null, ['class'=>'datePicker form-control']) !!}
                    </div>


                    <div class="col-xs-6 form-group">
                        {!! Form::label('Sucursal de Entrega') !!}
                        {!! Form::select('branches_confirm_id',$branches ,null, ['class'=>' form-control select2','id'=>'branches_confirm_id']) !!}
                    </div>


                    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
                        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 content">
            <div class="box ">
                <div class="box-header with-border">
                    <h3 class="box-title"> Artículos</h3>
                    <div class="pull-right">
                        @if(isset($models))
                            <a href="{{route('moto.sales.addItems', $models->id )}}"
                               class="btn btn-sm btn-default"><span class="fa fa-plus"></span> Agregar Artículo</a>
                        @endif
                    </div>
                </div>


                <div class="box-body">
                    @if(isset($models))

                        <table class="table table-striped">
                            <thead>
                            <th>Cod.</th>
                            <th>Detalle</th>
                            <th colspan="2" class="text-left">S. Total</th>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
                            @foreach($models->SalesItems as $item)

                                <tr>
                                    <td>{{$item->items_id}}</td>
                                    <td>

                                        {{$item->Items->Models->Brands->name}}

                                        <a href="{{route('moto.items.edit',$item->Items->id)}}">{{$item->Items->Models->name}}</a>

                                        | {{$item->Items->Colors->name}} <br>

                                        @if($item->Items->types_id == 1)
                                            <span class="text-muted"> Motor : </span> {{$item->Items->n_motor}}<br>
                                            <span class="text-muted"> Motor : </span> {{$item->Items->n_cuadro}}<br>
                                        @else
                                            <span class="text-muted"> Talle : </span> {{$item->Items->talle}}<br>

                                        @endif
                                        <span class="pull-right label label-xs label-success">{{$item->Items->Branches}}</span>
                                    </td>
                                    <td>
                                        @if(!is_null($item->sales->budgtes))
                                            $ {{ $item->sales->budgets ? number_format($item->sales->budgets->allItems->where('id',$item->items->models_id)->first()->pivot->price_budget ,2) : number_format($item->price_actual ,2)}}
                                        @else
                                            {{number_format($item->price_actual ,2)}}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-default"
                                           href="{{route('moto.sales.deleteItems',[$item->id,$models->id])}}"><span
                                                    class="text-danger fa fa-trash"></span></a>
                                        <a class="btn btn-xs btn-default"
                                           href="{{route('moto.sales.editItems',[$item->id,$models->id,])}}"
                                           data-id="{!! $item->id !!}"><span
                                                    class="text-success fa fa-edit"></span></a>
                                    </td>
                                </tr>

                                @if(!is_null($item->sales->budgtes))
                                    <?php $total += $item->sales->budgets ? $item->sales->budgets->allItems->where('id', $item->items->models_id)->first()->pivot->price_budget : $item->price_actual; ?>
                                @else
                                    <?php $total += $item->price_actual ?>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-12 content">
            <div class="box">
                {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title"> Adicionales</h3>--}}
                {{--<div class="pull-right">--}}
                {{--@if(isset($models))--}}
                {{--<a href="{{route('moto.sales.addItems', $models->id )}}"--}}
                {{--class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--</div>--}}


                <div class="box-body">
                    @if(isset($models))

                        @include('moto.partials.additionals')


                        <table class="table table-striped">
                            {{--<thead>--}}
                            {{--<th>Detalle</th>--}}
                            {{--<th colspan="2" class="text-left">S. Total</th>--}}
                            {{--</thead>--}}

                            <tfoot>
                            <td colspan="11" align="right">TOTAL ADEUDADO : $ <b
                                        class="text-primary totalAdeudado"
                                        data-precio="{!! $total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount) !!}">{{number_format($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount),2)}}</b>
                            </td>
                            </tfoot>
                        </table>

                    @endif

                </div>
            </div>
        </div>

        @if(isset($models))
            <div class="col-xs-12 content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-pay"></i> Formas de Pago</h3>
                        <div class="pull-right">

                            <a href="{!! route("moto.sales.createPayment", $models->id) !!}" id="agregarPago"
                               class="btn btn-sm btn-default"><span class="fa fa-plus"></span> Agregar Pago</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-xs-12">
                            <table class="table table-stripped">
                                <thead>
                                <th></th>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Forma de Pago</th>
                                <th colspan="2"> $ Monto</th>
                                <th>Recibo</th>
                                </thead>
                                <tbody id="tablaPagos">
                                <?php $pago = 0 ?>
                                @if(isset($models->Payments))
                                    {!! Form::open(['route'=> config('models.'.$section.'.storeRecibosRoute'),'method' => 'post' , 'id' =>'formRecibos']) !!}
                                    @foreach($models->Payments as $payment)
                                        <tr>
                                            <td>
                                                @if($payment->status)
                                                    <input type="checkbox" class="disabled input-red" disabled>
                                                @else
                                                    <input type="checkbox" value="{{$payment->id}}"
                                                           name="sales_payments_id[]">
                                                @endif
                                            </td>
                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->date}}</td>
                                            <td>{{$payment->PayMethods->name}}</td>
                                            <td> $ {{number_format($payment->amount, 2)}}</td>
                                            <td class="col-xs-1">
                                                @if(!$payment->status)
                                                    <a class="btn btn-xs btn-default"
                                                       href="{{route('moto.sales.deletePayment',[$payment->id,$models->id])}}"><span
                                                                class="text-danger fa fa-trash"></span></a>
                                                    <a class="btn btn-xs btn-default"
                                                       href="{{route('moto.sales.editPayment',$payment->id )}}"
                                                       data-id="{!! $payment->id !!}"><span
                                                                class="text-success fa fa-edit"></span></a>
                                                @else
                                                    <span class="label label-success">Pagado <i
                                                                class="glyphicon glyphicon-ok-sign"></i></span>

                                                @endif
                                            </td>
                                            <td>
                                                @forelse($payment->Vouchers->where('tipo','Remito') as $voucher)
                                                    #{!! $voucher->numero !!}
                                                    <div class="btn-group btn-group-xs pull-right">
                                                        <a href="{!! route('moto.sales.recibo',$voucher->id) !!}"
                                                           target="_blank" class="btn btn-primary"><span
                                                                    class="fa fa-file-pdf-o"></span></a>

                                                        <a class="btn btn-danger"
                                                           href="{{route('moto.sales.deleteRecibos',[$voucher->id,$models->id])}}"><span
                                                                    class="fa fa-trash"></span></a>
                                                    </div>
                                                @empty

                                                @endforelse
                                            </td>

                                            <?php  $pago += $payment->amount;?>
                                        </tr>
                                    @endforeach

                                    {!! Form::close() !!}
                                @endif
                                </tbody>
                                <tfoot>
                                <td colspan="4" align="right">TOTAL ABONADO : <b class="text-success pago"
                                                                                 data-pago="{!! $pago !!}">
                                        $ {{number_format($pago,2)}}</b></td>
                                </tfoot>
                            </table>


                            <a target="_blank" href="{!! route('moto.'.$section.'.recibo',$models->id) !!}"
                               id="generarRecibo"
                               class="pull-left btn btn-sm btn-default disabled"
                               title="Recibo PDF">
                                Generar Recibo
                            </a>


                            <h5 class="pull-right">TOTAL A PAGAR : <b class="text-danger total"
                                                                      data-precio="{!! ($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount) ) - $pago !!}">
                                    $ {{number_format(($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount)  - $pago),2)}}</b>
                            </h5>

                        </div>
                    </div>

                </div>

            </div>


            <div class="col-xs-12">

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Comprobante</th>
                        <th>Numero</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models->Vouchers as $voucher)
                        <tr>
                            <td>{{$voucher->id}}</td>
                            <td>{{$voucher->fecha}}</td>
                            <td>{{$voucher->tipo}} : {{$voucher->letra}} </td>
                            <td>{{$voucher->numero}}</td>
                            <td>$ {{number_format($voucher->importe_total,2)}}</td>

                        </tr>
                    @endforeach
                    </tbody>


                </table>

                @if((($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount))  - $pago == 0) && $models->pagado === 1)

                    <a href="{!! route('configs.vouchers.fromSales',$models->id) !!}" class="btn btn-sm btn-default"
                       title="Factura PDF">
                        <span>Realizar Comprobante</span>
                    </a>

                    <a target="_blank" href="{!! route('moto.'.$section.'.pdf',$models->id) !!}"
                       class="btn btn-sm btn-default" title="Generar Remito">
                        <span>Generar remito</span>
                    </a>

                    <div class="btn-group">
                        @if(!$models->files)
                            {!! Form::open(['route'=> [config('models.files.storeRoute')]]) !!}

                            {!! Form::hidden('sales_id',$models->id) !!}

                            <button type="submit" class="btn btn-sm btn-default">Crear legajo</button>

                            {!! Form::close() !!}
                        @else
                            <a href="{!! route('moto.files.edit',$models->files->id) !!}"
                               class="btn btn-sm btn-default">Ver legajo</a>
                        @endif
                    </div>
                @endif
            </div>

        @endif


    </div>

@endsection

@section('modal')
    @include('moto.partials.modalItems')
@endsection



@section('js')

    <script>


        $("#sendForm").on('click', function (ev) {
            ev.preventDefault();

            $('#formPresupuesto').submit();
        })


        function formatState(state) {

            var datos = state.text.split("~");

            if (!state.id) {
                return state.text;
            }
            var span;
            for (var i = 1; i < datos.length; i++) {
                if (i == 1)
                    span = '<span class="select2-template-text">' + datos[i] + '</span>';
                else
                    span += '<span class="select2-template-text">' + datos[i] + '</span>';
            }


            var $state = $(
                    '<span class="select2-template-container">' +
                    '<span class="select2-template-title">' +
                    datos[0]
                    + '</span>' +

                    span

                    + '</span>'
            );
            return $state;
        }
        ;

        $("#search").select2({
            templateResult: formatState
        });


        var routeBase = window.location.href.split('moto/')[0]
        var rutaEdit;

        $("#reset").on('click', function () {
            $('#modelId').val("")

            $('#formClient').attr('action', routeBase + 'moto/clients/store')
        })

        var app = angular.module("app", []);


        app.controller("ctl", function ($scope, $http) {
            $scope.model = ""
            $scope.last_name = ""
            $scope.name = ""
            $scope.dni = ""
            $scope.email = ""
            $scope.sexo = ""
            $scope.nacionality = ""
            $scope.phone1 = ""
            $scope.address = ""
            $scope.city = ""
            $scope.location = ""
            $scope.province = ""
            $scope.province = ""

            @if(Session::has('client') || $errors->any())
                    $scope.model = "{!! Session::has('client') ? Session::get('client')->id : ""!!}"
            $scope.last_name = "{!! Session::has('client') ? Session::get('client')->last_name :  old('last_name')!!}"
            $scope.name = "{!! Session::has('client') ? Session::get('client')->name :  old('name') !!}"
            $scope.dni = "{!! Session::has('client') ? Session::get('client')->dni :  old('dni')!!}"
            $scope.email = "{!! Session::has('client') ? Session::get('client')->email : old('email')!!}"
            $scope.sexo = "{!! Session::has('client') ? Session::get('client')->sexo : old('sexo')!!}"
            $scope.nacionality = "{!! Session::has('client') ? Session::get('client')->nacionality : old('nacionality')!!}"
            $scope.phone1 = "{!! Session::has('client') ? Session::get('client')->phone1 : old('phone1')!!}"
            $scope.address = "{!! Session::has('client') ? Session::get('client')->address : old('address')!!}"
            $scope.city = "{!! Session::has('client') ? Session::get('client')->city : old('city')!!}"
            $scope.location = "{!! Session::has('client') ? Session::get('client')->location : old('location')!!}"
            $scope.province = "{!! Session::has('client') ? Session::get('client')->province : old('province')!!}"


            @endif

                    @if(isset($models))
                    $scope.model = "{!! $models->clients->id !!}"
            $scope.last_name = "{!! $models->clients->last_name !!}"
            $scope.name = "{!! $models->clients->name !!}"
            $scope.dni = "{!! $models->clients->dni !!}"
            $scope.email = "{!! $models->clients->email !!}"
            $scope.sexo = "{!! $models->clients->sexo !!}"
            $scope.nacionality = "{!! $models->clients->nacionality !!}"
            $scope.phone1 = "{!! $models->clients->phone1 !!}"
            $scope.address = "{!! $models->clients->address !!}"
            $scope.city = "{!! $models->clients->city !!}"
            $scope.location = "{!! $models->clients->location !!}"
            $scope.province = "{!! $models->clients->province !!}"


            @endif


            $('#search').on('change', function (ev) {

                $("#search>option[value='seleccione']").remove();
                var select = $(this);
                var option = select.find('option:selected');

                $('#clients_id').val(option.val())

                $('#modelId').val(option.val());

                $http.get("moto/clientsSearch/" + option.val())
                        .then(function (response) {
                            $('#formClient').attr('action', routeBase + 'moto/clients/update/' + option.val())
                            $scope.model = option.val()
                            $scope.last_name = response.data['last_name']
                            $scope.name = response.data['name']
                            $scope.dni = response.data['dni']
                            $scope.email = response.data['email']
                            $scope.sexo = response.data['sexo']
                            $scope.nacionality = response.data['nacionality']
                            $scope.phone1 = response.data['phone1']
                            $scope.address = response.data['address']
                            $scope.city = response.data['city']
                            $scope.location = response.data['location']
                            $scope.province = response.data['province']

                            $('input[name=clients_id]').val(option.val())
                        });


                var budgets = $('#budgets_id');

                budgets.html("");

                $.ajax({
                    method: 'GET',
                    url: 'moto/budgetsByClients/' + option.val(),
                    success: function (data) {
                        $.each(data, function (i, y) {
                            budgets.append("<option value=" + y.id + ">#" + y.id + " | " + y.created_at + "</option>")
                        });
                    }
                })
            });


            $scope.ver = function () {
                $http.get("moto/budgets/budget/" + $('#budgets_id').val())
                        .then(function (response) {
                            $scope.budgets = response.data;


                        });
            };

                    {{--@if(isset($models))--}}
                    {{--@if($models->SalesItems->count() > 0)--}}
                    {{--$http.get("moto/budgets/budget/" + $('#budgets_id').val())--}}
                    {{--.then(function (response) {--}}
                    {{--$scope.budgets = response.data;--}}

                    {{--var modelos = [];--}}


                    {{--for(var m in $scope.budgets.all_items) {--}}
                    {{--var obj = {--}}
                    {{--modelo : $scope.budgets.all_items[m].id,--}}
                    {{--color : $scope.budgets.all_items[m].pivot.colors_id--}}
                    {{--}--}}

                    {{--modelos.push(obj)--}}
                    {{--}--}}

                    {{--$.ajax({--}}
                    {{--method: 'get',--}}
                    {{--data: $.extend({},modelos),--}}
                    {{--url: 'moto/branchesWithStockByModels',--}}
                    {{--success: function(data){--}}
                    {{--$("#branches_confirm_id option").remove();--}}

                    {{--for(var i in data){--}}
                    {{--if(i == {!! $models->branches_confirm_id !!})--}}
                    {{--$("#branches_confirm_id").append($("<option value='"+i+"' selected>"+data[i]+"<option>"))--}}
                    {{--else--}}
                    {{--$("#branches_confirm_id").append($("<option value='"+i+"'>"+data[i]+"<option>"))--}}
                    {{--}--}}

                    {{--}--}}
                    {{--})--}}

                    {{--});--}}
                    {{--@endif--}}
                    {{--@endif--}}



            var contenedor = $("#adicionales")
            var save = $(".saveAdicionales")
            var remove = $(".adicionales a[btn-danger]")


            var select = contenedor.find('select[name=additionals_id]')
            var amount = contenedor.find('input[name=amount]')
            var entity = contenedor.find('input[name=entity]')
            var id = contenedor.find('input[name=id]')
            var token = contenedor.find('input[name=_token]')

            save.on('click', function (ev) {
                ev.preventDefault()

                $(this).attr('disabled', true)
                $(this).prop('disabled', true)


                if (select.val() == "" && mount.val() == "")
                    return false
                else {
                    var data = {
                        additionals_id: select.val(),
                        amount: amount.val(),
                        entity: entity.val(),
                        _token: token.val(),
                        id: id.val()
                    }


                    $.ajax({
                        url: 'moto/addAdditionals',
                        data: data,
                        method: 'POST',
                        success: function (response) {

                            var totalAdeudado = $(".totalAdeudado");
                            var total = $(".total");


                            totalAdeudado.text((parseFloat(totalAdeudado.attr('data-precio')) + parseFloat(amount.val())).toLocaleString(undefined, {minimumFractionDigits: 2}))

                            totalAdeudado.attr('data-precio', (parseFloat(totalAdeudado.attr('data-precio')) + parseFloat(amount.val())))

                            total.text('$' + ((parseFloat(total.attr('data-precio')) + parseFloat(amount.val())).toLocaleString(undefined, {minimumFractionDigits: 2})))

                            total.attr('data-precio', parseFloat(total.attr('data-precio')) + parseFloat(amount.val()))

                            $(".adicionales").append($('<tr><td class="text-center">' + response.name + '</td><td class="text-center">$ ' + amount.val() + '</td><td><div class="btn-group pull-right"><a href="moto/removeAdditionals/' + response.id + '" class="btn btn-xs btn-danger deleteAdicionales" data-id="' + select.val() + '"><i class="fa fa-trash"></i></a></div></td></tr>'))


                            $(save).attr('disabled', false)
                            $(save).prop('disabled', false)
                        },
                        error: function (error) {
                            console.log("Error: " + error)

                            $(save).attr('disabled', false)
                            $(save).prop('disabled', false)
                        }
                    })

                }
            })


            contenedor.on('click', '.deleteAdicionales', function (ev) {
                ev.preventDefault()

                $(this).attr('disabled', true)
                $(this).prop('disabled', true)

                var contenedor = $(this).parent().parent().parent()

                var data = {
                    additionals_id: $(this).attr('data-id'),
                    entity: entity.val(),
                    _token: token.val(),

                    id: id.val()
                }


                $.ajax({
                    url: 'moto/removeAdditionals',
                    data: data,
                    method: 'POST',
                    success: function (response) {


                        var totalAdeudado = $(".totalAdeudado");
                        var total = $(".total");


                        totalAdeudado.text((parseFloat(totalAdeudado.attr('data-precio')) - parseFloat(response.amount)).toLocaleString(undefined, {minimumFractionDigits: 2}))

                        totalAdeudado.attr('data-precio', parseFloat(totalAdeudado.attr('data-precio')) - parseFloat(response.amount))

                        total.text('$' + ((parseFloat(total.attr('data-precio')) - parseFloat(response.amount)).toLocaleString(undefined, {minimumFractionDigits: 2})))

                        total.attr('data-precio', parseFloat(total.attr('data-precio')) - parseFloat(response.amount))


                        $(contenedor).remove();

                        $(this).attr('disabled', false)
                        $(this).prop('disabled', false)
                    },
                    error: function (error) {
                        console.log("Error: " + error)
                        $(this).attr('disabled', false)
                        $(this).prop('disabled', false)
                    }

                })

            })

        });


        //        app.controller("ctl", function ($scope, $http) {
        //
        //            $scope.ver = function () {
        //                $http.get("moto/budgets/budget/" + $('#budgets_id').val())
        //                        .then(function (response) {
        //                            $scope.budgets = response.data;
        //                            console.table(response.data);
        //                        });
        //            };
        //        });


        $('#ver').on('click', function () {
            $.get("moto/budgets/budget/" + $('#budgets_id').val(), function (res) {

            });
        });

        $('#budgets_id').on('change', function () {
            $.get("moto/budgets/budgetsClients/" + $(this).val(), function (res) {
                $("#clients_id ").val(res).trigger("change");
            });
        });


        $("#show_budget").on('click', function () {
            var id = $('#budgets_id').val();
            //window.open('moto/budgets/pdf/' + id, '_blank');

            //$('#modalBudgetClients .modal-content').load('{{route('moto.budgets.index')}}');

            $('#modalBudgetClients').modal(open);
        });


        var inputsPagos = $("#tablaPagos input[type=checkbox]");
        /*
         $.each(inputsPagos,function (pos, input) {

         })
         */

        $(inputsPagos).parent().on('click', function (ev) {

            var checkbox = new Array();

            if ($(this).prop('checked')) {
                $(this).prop('checked', false)
            } else {
                $(this).prop('checked', true)
            }


            $.each(inputsPagos, function (pos, input) {
                checkbox[pos] = $(input).prop('checked');
            })

            for (var inputs in checkbox) {
                if (checkbox[inputs]) {
                    $("#generarRecibo").removeClass('disabled');
                    return
                } else {
                    $("#generarRecibo").addClass('disabled');
                }
            }
        });

        $("#generarRecibo").on('click', function (ev) {
            ev.preventDefault()

            $("#formRecibos").submit();

        })


    </script>

@endsection