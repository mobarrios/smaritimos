@extends('template.model_form')

@section('css')
    <style>
        .autocompletedemoCustomTemplate .autocomplete-custom-template li {
            border-bottom: 1px solid #ccc;
            height: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            white-space: normal; }

        .autocompletedemoCustomTemplate .autocomplete-custom-template li:last-child {
            border-bottom-width: 0; }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title,
        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-metadata {
            display: block;
            line-height: 2; }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title md-icon {
            height: 18px;
            width: 18px; }

        .search{
            color: rgba(0,0,0,0.87);
            background-color: rgb(250,250,250);
            padding: 16px;

        }

        .select2-template-title{
            font-size: 12px;
            font-weight: bold;
            display: block;
            width:100%;
        }

        .select2-template-text{
            font-size: 12px;
            display: block;
            width:100%;
            padding-left:5px;
        }

        .select2-template-container{
            border-bottom: 1px solid #ddd;
        }

        .select2-container--default .select2-results__option[aria-selected=true]{
            background-color: rgba(162,162,162,0.21);

        }

    </style>
@endsection


@section('form_title')
    Venta
@endsection

@section('form_inputs')
    <div ng-app="app" ng-controller="ctl" >

        @if(!isset($models))
            <div class="search">

                <p>Antes de crear un prospecto, busque si ya existe.</p>
                <select id="search" class="select2 form-control">
                    <option value="seleccione">Seleccione... ~  ~ </option>
                    @forelse($clients as $c)
                        <option value="{!! $c->id !!}">
                            {!! $c->fullname !!} ~ {!! $c->dni !!} ~ {!! $c->email !!} ~ {!! $c->phone !!}

                        </option>
                    @empty

                    @endforelse
                </select>
            </div>

        @endif

        <div>
            @if(Session::has('client'))
                {!! Form::model(Session::get('client'),['route'=> [config('models.prospectos.updateRoute')],  'title' =>"Editar cliente", 'id' => 'formClient']) !!}
            @else
                {!! Form::open(['route'=> [config('models.prospectos.storeRoute')],  'title' =>"Crear cliente", 'id' => 'formClient']) !!}
            @endif

            {!! Form::hidden('model',null,['ng-model' => 'model','id' => 'modelId']) !!}

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('last_name', "APELLIDO") !!}
                {!! Form::text('last_name', null, ['class'=>'form-control', 'required' => 'required','ng-model' => 'last_name']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('name', "NOMBRE") !!}
                {!! Form::text('name', null, ['class'=>'form-control','required' => 'required','ng-model' => 'name']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('dni', "DNI") !!}
                {!! Form::text('dni', null, ['class'=>'form-control','required' => 'required','ng-model' => 'dni']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('sexo', "SEXO") !!}
                {!! Form::select('sexo', ['masculino' => 'masculino','femenino' => 'femenino'],'masculino', ['class'=>'form-control','ng-model' => 'sexo']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('email', "EMAIL") !!}
                {!! Form::text('email', null, ['class'=>'form-control','ng-model' => 'email']) !!}
            </div>




            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('nacionality', "NACIONALIDAD") !!}
                {!! Form::text('nacionality', null, ['class'=>'form-control','ng-model' => 'nacionality']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('phone1', "TELÉFONO") !!}
                {!! Form::text('phone1', null, ['class'=>'form-control','ng-model' => 'phone1']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('address', "DIRECCIÓN") !!}
                {!! Form::text('address', null, ['class'=>'form-control','ng-model' => 'address']) !!}
            </div>

            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('city', "CIUDAD") !!}
                {!! Form::text('city', null, ['class'=>'form-control','ng-model' => 'city']) !!}
            </div>



            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('location', "LOCALIDAD") !!}
                {!! Form::text('location', null, ['class'=>'form-control','ng-model' => 'location']) !!}
            </div>




            <div class="col-xs-12 col-lg-3 form-group">
                {!! Form::label('province', "PROVINCIA") !!}
                {!! Form::text('province', null, ['class'=>'form-control','ng-model' => 'province']) !!}
            </div>



            <div class="col-xs-12 col-lg-3 form-group" style="padding-top: 2%;">
                @if(!isset($models))
                    {{--{!! Form::hidden('clients_id', $client->id) !!}--}}
                    <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                    <button type="reset" id="reset" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                @endif

                {!! Form::close() !!}

            </div>
        </div>





        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif

        {!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}





            <div class="col-xs-12 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cabecera
                </div>
                <div class="panel-body">
                    <div class="col-xs-2 form-group">
                        {!! Form::label('Tipo de Operación') !!}
                        {!! Form::select('type',['Reserva'=>'Reserva', 'Venta' => 'Venta'], null, ['class'=>' form-control select2']) !!}
                    </div>

                    <div class="col-xs-5 form-group">
                        {!! Form::label('Cliente') !!}

                        @if(isset($models))
                            <input type="text" disabled value="{{$models->Clients->fullName}}" class="form-control">
                        @else

                            <select id="clients_id" name="clients_id" class="select2 form-control ">
                                <option value="">Seleccionar</option>
                                @foreach($clients  as $c)
                                    <option value="{{$c->id}}">
                                        {{$c->fullName}}
                                        |<strong> {{$c->email}}</strong>
                                        | {{$c->dni}}
                                    </option>
                                @endforeach
                            </select>

                        @endif
                    </div>

                    <div>
                        <div>
                            <div class="col-xs-4 form-group">
                                {!! Form::label('Presupuestos ') !!}
                                {!! Form::select('budgets_id', $budgets, null, ['class'=>'form-control select2','id'=>'budgets_id']) !!}
                            </div>
                            <div class="col-xs-1">
                                <button class="btn btn-default" ng-click="ver()" type="button" id="ver">Ver</button>
                            </div>
                            <div class="col-xs-12">
                                <table class="table">
                                    <tr ng-repeat="items in budgets.all_items">
                                        <td>@{{ items.brands.name }} @{{ items.name }}</td>
                                        <td> $ @{{ items.pivot.price_budget }}</td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-2  form-group">
                        {!! Form::label('Fecha Pactada') !!}
                        {!! Form::text('date_confirm', null, ['class'=>'datePicker form-control']) !!}
                    </div>

                    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
                        <a href="{{route("moto.clients.create")}}" target="_blank" class="btn btn-default"><span
                                    class="fa fa-plus"></span></a>
                    </div>

                    <div class="col-xs-2 form-group">
                        {!! Form::label('Sucursal de Entrega') !!}
                        {!! Form::select('branches_confirm_id',$branches ,null, ['class'=>' form-control select2','placeholder'=>'Seleccionar...']) !!}
                    </div>


                    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
                        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 content">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Artículos
                    <div class="pull-right">
                        @if(isset($models))
                            <a href="#" id="agregarItem" data-action="{!! route("moto.sales.addItems") !!}"
                               class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>
                            <a href="{{route('moto.items.modal')}}" type="button" class="btn btn-default">
                                modal Items
                            </a>


                        @endif
                    </div>

                </div>

                <div class="panel-body">
                    @if(isset($models))

                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>Cod.</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>N Motor</th>
                            <th>N Cuadro</th>
                            <th>Importe Articulo</th>
                            <th colspan="2" class="text-left">S. Total</th>
                            </thead>
                            <tbody>
                            <?php $total = 0; ?>
                            @foreach($models->SalesItems as $item)

                                <tr>
                                    <td>{{$item->items_id}}</td>

                                    <td>{{$item->Items->Models->Brands->name}}</td>
                                    <td>
                                        <a href="{{route('moto.items.edit',$item->Items->id)}}">{{$item->Items->Models->name}}</a>
                                    </td>
                                    <td>{{$item->Items->Colors->name}}</td>
                                    <td>{{$item->Items->n_motor}}</td>
                                    <td>{{$item->Items->n_cuadro}}</td>
                                    <td>
                                        $ {{number_format($item->price_actual ,2)}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-default"
                                           href="{{route('moto.sales.deleteItems',[$item->id,$models->id])}}"><span
                                                    class="text-danger fa fa-trash"></span></a>
                                        <a class="btn btn-xs btn-default editItems"
                                           href="{{route('moto.sales.editItems',[$item->id,$models->id])}}"
                                           data-id="{!! $item->id !!}"><span
                                                    class="text-success fa fa-edit"></span></a>
                                    </td>
                                </tr>
                                <?php $total += $item->price_actual + $item->patentamiento + $item->pack_service; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <td colspan="11" align="right">TOTAL ADEUDADO : $ <b
                                        class="text-primary">{{number_format($total,2)}}</b></td>
                            </tfoot>
                        </table>

                    @endif

                </div>
            </div>
        </div>

        @if(isset($models))
            <div class="col-xs-12 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Formas de Pago
                        <div class="pull-right">
                            @if(isset($models))
                                <a href="#" id="agregarPago" data-action="{!! route("moto.sales.addItems") !!}"
                                   class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Forma de Pago</th>
                                <th> $ Monto</th>
                                </thead>
                                <tbody>
                                <?php $pago = 0 ?>
                                @if(isset($models->SalesPayments))

                                    @foreach($models->SalesPayments as $payment)
                                        <tr>
                                            <td>{{$payment->id}}</td>
                                            <td>{{$payment->date}}</td>
                                            <td>{{$payment->Financials->name}}</td>
                                            <td> $ {{number_format($payment->amount, 2)}}</td>
                                            <?php  $pago += $payment->amount;?>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <td colspan="4" align="right">TOTAL ABONADO : <b class="text-success">
                                        $ {{number_format($pago,2)}}</b></td>
                                </tfoot>
                            </table>

                            <h5 class="pull-right">TOTAL A PAGAR : <b class="text-danger">
                                    $ {{number_format(($total - $pago),2)}}</b>
                            </h5>

                            <a target="_blank" href="{!! route('moto.'.$section.'.pdf',$models->id) !!}"
                               class="pull-left"
                               title="Exportar PDF">
                        <span class="btn btn-danger">
                            <i class="fa fa-file-pdf-o"></i>
                        </span>
                            </a>
                            <a target="_blank" href="{!! route('moto.'.$section.'.recibo') !!}"
                               class="pull-left"
                               title="Recibo PDF">
                        <span class="btn btn-success">
                            <i class="fa fa-file-pdf-o"></i>
                        </span>
                            </a>
                            <a target="_blank" href="{!! route('moto.'.$section.'.factura') !!}"
                               class="pull-left"
                               title="Factura PDF">
                        <span class="btn btn-warning">
                            <i class="fa fa-file-pdf-o"></i>
                        </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endif


    </div>

@endsection

@section('modal')
    @include('moto.partials.modalItems')
@endsection



@section('js')

    <script>

        $("#sendForm").on('click',function (ev) {
            ev.preventDefault();

            $('#formPresupuesto').submit();
        })


        function formatState (state) {

            var datos = state.text.split("~");

            if (!state.id) { return state.text; }
            var span;
            for(var i = 1;i < datos.length; i++) {
                if(i==1)
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

                    +'</span>'
            );
            return $state;
        };

        $("#search").select2({
            templateResult: formatState
        });


        var routeBase = window.location.href.split('moto/')[0]
        var rutaEdit;

        $("#reset").on('click', function () {
            $('#modelId').val("")

            $('#formClient').attr('action',routeBase+'moto/clients/store')
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


            $('#search').on('change', function (ev) {
                $("#search>option[value='seleccione']").remove();
                var select = $(this);
                var option = select.find('option:selected');

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
                        });

            });


            $scope.ver = function () {
                $http.get("moto/budgets/budget/" + $('#budgets_id').val())
                        .then(function (response) {
                            $scope.budgets = response.data;
                            console.table(response.data);
                        });
            };
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


        $('#clients_id').on('change', function () {
            var id = $(this).val();
            var budgets = $('#budgets_id');

            budgets.html("");

            $.ajax({
                method: 'GET',
                url: 'moto/budgetsByClients/' + id,
                success: function (data) {
                    $.each(data, function (i, y) {
                        budgets.append("<option value=" + y.id + ">#" + y.id + " | " + y.created_at + "</option>")
                    });
                }
            })
        });


        $("#show_budget").on('click', function () {
            var id = $('#budgets_id').val();
            //window.open('moto/budgets/pdf/' + id, '_blank');

            //$('#modalBudgetClients .modal-content').load('{{route('moto.budgets.index')}}');

            $('#modalBudgetClients').modal(open);
        });






    </script>

@endsection