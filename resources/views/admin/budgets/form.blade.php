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

        #branches + span.select2-container{
            width: 100% !important;
        }


        .select2-container--default .select2-results__option[aria-selected=true]{
            background-color: rgba(162,162,162,0.21);

        }

/*
        .badgebox
        {
            opacity: 0;
        }

        .badgebox + .badge
        {
            text-indent: -999999px;
            width: 27px;
        }

        .badgebox:focus + .badge
        {
            box-shadow: inset 0px 0px 5px;
        
        }

        .badgebox:checked + .badge
        {
        
            text-indent: 0;
        }
        */

/* Checkbox and Radio buttons */
.form-group input[type="radio"],
.form-group input[type="checkbox"]{
	display: none !important;
}

.form-group input[type="checkbox"] + .btn-group > label,
.form-group input[type="radio"] + .btn-group > label{
	white-space: normal !important;
}

.form-group input[type="checkbox"] + .btn-group > label.btn-default,
.form-group input[type="radio"] + .btn-group > label.btn-default{
	color: #333 !important;
	background-color: #fff !important;
	border-color: #ccc !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-primary,
.form-group input[type="radio"] + .btn-group > label.btn-primary{
	color: #fff !important;
	background-color: #428bca !important;
	border-color: #357ebd !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-success,
.form-group input[type="radio"] + .btn-group > label.btn-success{
	color: #fff !important;
	background-color: #5cb85c !important;
	border-color: #4cae4c !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-info,
.form-group input[type="radio"] + .btn-group > label.btn-info{
	color: #fff !important;
	background-color: #5bc0de !important;
	border-color: #46b8da !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-warning,
.form-group input[type="radio"] + .btn-group > label.btn-warning{
	color: #fff !important;
	background-color: #f0ad4e !important;
	border-color: #eea236 !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-danger,
.form-group input[type="radio"] + .btn-group > label.btn-danger{
	color: #fff !important;
	background-color: #d9534f !important;
	border-color: #d43f3a !important;
}
.form-group input[type="checkbox"] + .btn-group > label.btn-link,
.form-group input[type="radio"] + .btn-group > label.btn-link {
	font-weight: normal !important;
	color: #428bca !important;
	border-radius: 0 !important;
}

.form-group input[type="radio"] + .btn-group > label span:first-child,
.form-group input[type="checkbox"] + .btn-group > label span:first-child{
	display: none !important;
}

.form-group input[type="radio"] + .btn-group > label span:first-child + span,
.form-group input[type="checkbox"] + .btn-group > label span:first-child + span{
	display: inline-block !important;
}

.form-group input[type="radio"]:checked + .btn-group > label span:first-child,
.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child{
	display: inline-block !important;
}

.form-group input[type="radio"]:checked + .btn-group > label span:first-child + span,
.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child + span{
	display: none !important;  
}

.form-group input[type="checkbox"] + .btn-group > label span[class*="fa-"],
.form-group input[type="radio"] + .btn-group > label span[class*="fa-"]{
	width: 15px !important;
	float: left !important;
	margin: 4px 0 2px -2px !important;
}

.form-group input[type="checkbox"] + .btn-group > label span.content,
.form-group input[type="radio"] + .btn-group > label span.content{
	margin-left: 10px !important;
}
/* End::Checkbox and Radio buttons */

    </style>
@endsection


@section('form_title')
    Nuevo Presupuesto
@endsection

@section('form_inputs')

    <div class="modal-body">
        <div>
            <div ng-app="buscador">

                @if(!isset($models))
                    <div class="search" ng-controller="buscadorController" >

                        <p>Antes de crear un prospecto, busque si ya existe.</p>
                        <select id="search" class="select2 form-control">
                            <option value="seleccione">Seleccione... ~  ~ </option>
                            @forelse($prospectos as $prospecto)
                                <option value="{!! $prospecto->id !!}">
                                    {!! $prospecto->fullname !!} ~ {!! $prospecto->dni !!} ~ {!! $prospecto->email !!} ~ {!! $prospecto->phone !!}

                                </option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                @endif

                <div>
                    @if(isset($client))
                        {!! Form::model($client,['route'=> [config('models.prospectos.updateRoute')],  'title' =>"Crear prospecto",'ngApp' => 'buscador','ng-controller' => 'buscadorController', 'id' => 'formClient']) !!}
                    @else
                        {!! Form::open(['route'=> [config('models.prospectos.storeRoute')],  'title' =>"Crear prospecto",'ngApp' => 'buscador','ng-controller' => 'buscadorController', 'id' => 'formClient']) !!}
                    @endif

                    {!! Form::hidden('model',null,['ng-model' => 'model','id' => 'modelId']) !!}
                    {!! Form::hidden('budgets',true) !!}

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('last_name', "APELLIDO") !!}
                        {!! Form::text('last_name', null, ['class'=>'form-control','ng-model' => 'last_name']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('name', "NOMBRE") !!}
                        {!! Form::text('name', null, ['class'=>'form-control','ng-model' => 'name']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('dni', "DNI") !!}
                        {!! Form::text('dni', null, ['class'=>'form-control','ng-model' => 'dni']) !!}
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

                    {{--<div class="col-xs-12 col-lg-2 form-group">--}}
                        {{--{!! Form::label('city', "CIUDAD") !!}--}}
                        {{--{!! Form::text('city', null, ['class'=>'form-control','ng-model' => 'city']) !!}--}}
                    {{--</div>--}}



                    {{--<div class="col-xs-12 col-lg-2 form-group">--}}
                        {{--{!! Form::label('location', "LOCALIDAD") !!}--}}
                        {{--{!! Form::text('location', null, ['class'=>'form-control','ng-model' => 'location']) !!}--}}
                    {{--</div>--}}




                    {{--<div class="col-xs-12 col-lg-2 form-group">--}}
                        {{--{!! Form::label('province', "PROVINCIA") !!}--}}
                        {{--{!! Form::text('province', null, ['class'=>'form-control','ng-model' => 'province']) !!}--}}
                    {{--</div>--}}


                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('localidades_id', "Localidad") !!}
                        {!! Form::select('localidades_id',$localidades,null,['class' => 'filter form-control']) !!}
                    </div>

                    <div class="col-xs-12 col-lg-3 form-group">
                        {!! Form::label('iva_conditions_id', "CONDICIÓN DEL IVA") !!}
                        {!! Form::select('iva_conditions_id', $ivaConditions,null, ['required' => 'required','class'=>'form-control','id' => 'iva']) !!}
                    </div>




                    <div class="col-xs-12 col-lg-2 form-group" style="padding-top: 2%;">
                        @if(!isset($models))
    {{--                        {!! Form::hidden('clients_id', $client->id) !!}--}}
                            <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                            <button type="reset" id="reset" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                        @endif

                            @if(isset($models))
                                <a href="{!! route("admin.".$section.".addItems", $models->id) !!}" class="btn btn-default"><span class="fa fa-plus"></span></a>
                            @endif
                        {!! Form::close() !!}



                    </div>
                </div>


            <span class="clearfix"></span>
            @if(isset($models))

                <hr>

                {!! Form::model($models,["route" => 'admin.'.$section.'.update', 'method' => 'POST', 'id' => 'formPresupuesto']) !!}

                    {!! Form::hidden('clients_id',$client->id) !!}
                    {!! Form::hidden('id',$models->id) !!}
                    {!! Form::hidden('branches_id',Auth::user()->branches_active_id) !!}
                    {!! Form::hidden('users_id',Auth::user()->id) !!}

                    <div>
                        <div ng-controller="myCtrl">
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Marca</td>
                                        <td>Modelo</td>
                                        <td>$ Presupuestado</td>
                                        <td>$ Lista</td>
                                        <td colspan="2">Acciones</td>

                                    </tr>
                                    <tr ng-repeat="models in data" >
                                        <td>@{{ models.brands.name }}</td>
                                        <td>@{{ models.name }}</td>
                                        <td class="text-danger" class="priceBudget">$ @{{ models.pivot.price_budget }}</td>
                                        <td class="text-danger">$ @{{ models.pivot.price_actual }}</td>
                                        <td>
                                            <a href="admin/budgets/deleteItem/@{{ models.pivot.id }}/{{ $models->id }}"><span class="text-danger fa fa-trash"></span></a>
                                        </td>
                                        <td>
                                            <a href="admin/budgets/editItem/@{{ models.pivot.id }}/{{ $models->id }}" class="editItems" data-id="@{{ models.pivot.id }}"><span class="text-success fa fa-edit"></span></a>
                                        </td>
                                    </tr>

                                </table>
                            </div>


                            <span class="clearfix"></span>
                            <hr>


                            @if($models->allItems)
                                @include('admin.partials.additionals',['modelos' => $models->modelsList()])
                            @endif


                            <span class="clearfix"></span>

                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4>Métodos de pago</h4>
                                </div>    
                            </div>    

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total a financiar $</span>

                                        @if($models->a_financiar)
                                            {!! Form::number('a_financiar', null ,['class' => 'form-control','min' => '0','step' => '0.1','id' => 'a_financiar']) !!}
                                        @else
                                            {!! Form::number('a_financiar', $models->allItems->count() > 0 ? $models->totalEfectivo  : "0" ,['class' => 'form-control','min' => '0','step' => '0.1','id' => 'a_financiar']) !!}
                                        @endif

                                    </div>

                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-xs-6 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">EFECTIVO</h3>
                                            </div>
                                            <div class="panel-body">
                                                    <div class="col-xs-12">

                                                        <strong class="content"> $ {{ $models->allItems->count() > 0 ? number_format(($models->totalEfectivo ), 2) : "0"}}</strong>
                                                    </div>
                                            </div>
                                        </div>
                                </div>

                                @foreach($financials as $indice => $financial)
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{!! $financial->name !!}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    @forelse($financial->FinancialsDues as $ind => $financialsDue)

                                                        <div class="col-xs-12" style="margin-top:10px;">
                                                            {!! Form::checkbox('financials_dues_id[]',$financialsDue->id,$models->CheckFinancialsDue($financialsDue->id) or null,['id' => "financials-$financialsDue->id"]) !!}
                                                            
                                                            <div class="btn-group">
                                                                <label for="financials-{!! $financialsDue->id !!}" class="btn btn-default">
                                                                    <span class="fa fa-check-square-o fa-lg"></span>
                                                                    <span class="fa fa-square-o fa-lg"></span>

                                                                    @if($financialsDue->porcent != 0)
                                                                        <span class="content financiamiento" data-due='{!! $financialsDue->due !!}' data-porcent='{!! $financialsDue->porcent !!}' id='{!! $indice. $ind !!}'>{!! $financialsDue->due !!} cuotas de $ {{ number_format(  (($models->a_financiar != null ? $models->a_financiar : $models->total ) + (($models->a_financiar != null ? $models->a_financiar : $models->total * $financialsDue->porcent)/100)) / $financialsDue->due, 2)}}  </span>
                                                                    @else
                                                                        <span class="content financiamiento" data-due='{!! $financialsDue->due !!}' data-coef='{!! $financialsDue->coef !!}' id='{!! $indice. $ind !!}'>{!! $financialsDue->due !!} cuotas de $ {{ number_format(($models->a_financiar != null ? $models->a_financiar : $models->total * $financialsDue->coef) / $financialsDue->due, 2)}}</span>
                                                                    @endif

                                                                </label>
                                                            </div>
                                                        </div>

                                                        
                                                    @empty
                                                        
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>

        

        
	


                            <h3 class="text-blue" ng-bind="modelName"><strong></strong></h3>

                            <!--
                            <div class="col-xs-2 form-group">
                                <label>Descuento (%)</label>
                                {!! Form::number('descuento',null,['class' => 'form-control','ng-model' => 'descuento','ng-change' => 'calcular()','min' => '0']) !!}
                            </div>
                            
                            <div class="col-xs-2 form-group">
                                <label>Anticipo</label>
                                {!! Form::number('anticipo',null,['class' => 'form-control','ng-model' => 'anticipo','ng-change' => 'calcular()','min' => '0']) !!}
                            </div>


                            <div class="col-xs-2 form-group">
                                <label>Total a Financiar <b>($)</b></label>
                                @if($models->a_financiar)
                                    {!! Form::number('a_financiar', $models->a_financiar,['class' => 'form-control','id' => 'aFinanciar','min' => '0','step' => '0.1']) !!}
                                @else
                                    {!! Form::number('a_financiar', $models->allItems->count() > 0 ? $models->totalEfectivo  : "0" ,['class' => 'form-control','id' => 'aFinanciar','min' => '0','step' => '0.1']) !!}
                                @endif
                            </div>

                            <div class="col-xs-2 form-group">
                                <label>Modo de Financiamiento</label>
                            
                                <select name="modo_financiamiento" class="form-control" id="financials">
                                    @foreach($financials as $i => $financial)
                                        <optgroup label="{{$financial->name}}">
                                            @foreach($financial->FinancialsDues as $ind => $dues)
                                                <option value="{{$dues->coef}}" data-id="due{!! $i.$ind !!}" due="{{$dues->due}}">
                                                    {{$dues->due}} cuota/s
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-xs-2 form-group">
                                <label>Importe Cuota</label>
                                {!! Form::text('importe_cuota',null,['class' => 'form-control','readonly','ng-model' => 'importeCuota','ng-change' => 'calcular()', 'id' => 'importeCuota']) !!}
                            </div>
                            
                            
                            
                            <div class="col-xs-2 form-group">
                                <label>Total</label>
                                <div class="col-xs-12 input-group">
                                    {!! Form::text('total',$models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount,['class' => 'form-control','readonly','ng-model' => 'total','ng-change' => 'calcular()']) !!}
                                </div>
                            </div> -->

                        </div>

                    </div>



                {!! Form::close() !!}

                        <div class="col-xs-12">

                            <div class="btn-group" role="group" aria-label="...">
                                <a id="sendForm" class="btn btn-danger" title="Exportar PDF"><i class="fa fa-file-pdf-o"></i></a>
                                <a class="btn btn-success" title="Vender" id="sendVenderPresupuestado"  data-toggle="modal" data-target="#modalVender">
                                    <i class="fa fa-money"></i>
                                </a>


                            </div>
                        </div>


            @endif
            </div>

        </div>
    </div>



@endsection



@if(isset($models))
    @section('modal')
        <div class="modal fade" id="modalVender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    {!! Form::open(['route'=> 'admin.sales.storeFromBudgets']) !!}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Generar venta</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-body">
                                    {!! Form::hidden('clients_id',$models->Clients->id) !!}
                                    {!! Form::hidden('budgets_id',$models->id) !!}
                                    {!! Form::hidden('users_id',Auth::user()->id) !!}

                                    <div class="col-xs-12 col-md-6 form-group">
                                        {!! Form::label('Fecha Pactada') !!}
                                        {!! Form::text('date_confirm', null, ['class'=>'datePicker form-control']) !!}
                                    </div>


                                    <div class="col-xs-12 col-md-6 form-group">
                                        {!! Form::label('Sucursal de Entrega') !!}
                                        {!! Form::select('branches_confirm_id',$branches ,null, ['class'=>' form-control select2','id'=>'branches']) !!}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">
                                Enviar
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    @endsection

@endif


@section('js')
    {{--<script src="js/aside2.js"></script>--}}
    <script src="js/asideModelsColors.js"></script>

    <script>


        $("#a_financiar").on('keyup', function() {
            console.log($(this).val());

            var total = $(this).val();
            var financiamientos = $(".financiamiento");


            financiamientos.each(function (ind, val) {
                var due = $(val).attr("data-due");

                if ($(val).attr("data-porcent")) {
                    var porcent = $(val).attr("data-porcent");
                    var valor = ((total) + ((total * porcent) / 100 )) / due;
                }

                if ($(val).attr("data-coef")) {
                    var coef = $(val).attr("data-coef");
                    var valor = (total * coef) / due;
                }


                $(this).text(due + " cuotas de $ " + valor.toLocaleString("Es-Ar", {maximumFractionDigits: 2}));

            })
        })







            var routeBase = window.location.href.split('admin/')[0]
        var rutaEdit;

        $("#reset").on('click', function () {
            $('#modelId').val("")
            $('#formClient').attr('action',routeBase+'admin/clients/store')
        })

        var app = angular.module("buscador", []);



        app.controller("buscadorController", function ($scope, $http) {
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
            $scope.stotal = {!! isset($models) ? number_format(($models->total), 2) : intval(0) !!}



            @if(isset($client) || $errors->any())
                    $scope.model = "{!! $client->id or ""!!}"
                $scope.last_name = "{!! $client->last_name or old('last_name')!!}"
                $scope.name = "{!! $client->name or old('name') !!}"
                $scope.dni = "{!! $client->dni or old('dni')!!}"
                $scope.email = "{!! $client->email or old('email')!!}"
                $scope.sexo = "{!! $client->sexo or old('sexo')!!}"
                $scope.nacionality = "{!! $client->nacionality or old('nacionality')!!}"
                $scope.phone1 = "{!! $client->phone1 or old('phone1')!!}"
                $scope.address = "{!! $client->address or old('address')!!}"
                $scope.city = "{!! $client->city or old('city')!!}"
                $scope.location = "{!! $client->location or old('location')!!}"
                $scope.province = "{!! $client->province or old('province')!!}"
                $scope.iva_conditions_id = "{!! Session::has('client') ? Session::get('client')->location : old('iva_conditions_id')!!}"
                $scope.localidades_id = "{!! Session::has('client') ? Session::get('client')->location : old('localidades_id')!!}"

                @if(\Illuminate\Support\Facades\Session::has('client'))
                    $('.filter').select2({
                        data: [
                            {
                                id: '{!! \Illuminate\Support\Facades\Session::get('client')->localidades_id !!}',
                                text: '{!! \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->Municipios->Provincias->name . ' - ' . \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->Municipios->name . ' - ' . \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->name !!}'
                            },
                            // ... more data objects ...
                        ]
                    });
                    @elseif(old('localidades_id'))
                       $('.filter').select2({
                        data: [
                            {
                                id: '{!! old('localidades_id') !!}',

                                text: '{!! \App\Entities\Configs\Localidades::find(old('localidades_id'))->Municipios->Provincias->name . ' - ' . \App\Entities\Configs\Localidades::find(old('localidades_id'))->Municipios->name . ' - ' . \App\Entities\Configs\Localidades::find(old('localidades_id'))->name !!}'
                            },
                            // ... more data objects ...
                        ]
                    });
                @endif


        @endif



        $('#search').on('change',function(ev){
                $("#search>option[value='seleccione']").remove();
                var select = $(this);
                var option = select.find('option:selected');

                $('#modelId').val(option.val());

                $http.get("admin/clientsSearch/"+option.val())
                        .then(function (response) {
                            $('#formClient').attr('action',routeBase+'admin/clients/update/'+option.val())
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


                            $scope.location = response.data['localidades_id']
                            //$scope.province = response.data['province']

//                            $scope.iva = response.data['iva_conditions_id']
                            $('#iva').val(response.data['iva_conditions_id'])
                            $('select[name=localidades_id]').val(response.data['localidades_id'])
                            $('select[name=localidades_id]+.select2 span.select2-selection__rendered').html(response.data['localidades'])

                        });

            });


        });


        $("#sendForm").on('click',function (ev) {
            ev.preventDefault();

            $('#formPresupuesto').submit();
        })


                @if(isset($models))
        var coef;

        $("#financials option").each(function(ind, val){
            if($(val).val() == "{!! $models->modo_financiamiento !!}"){
                $(val).attr('selected','selected')
                coef = $(val);
            }
        });


        $("#financials").on('click',function(ev){
            coef = $(this).find('option:selected');

        })

        $("#financials").on('change',function(ev){

            var option = $(this).find("option[data-id='"+$(coef).attr('data-id')+"']");
            var dues = $(this).find("option[data-id='"+$(coef).attr('data-id')+"']").attr('due');
            var aFinanciar = $('#aFinanciar').val();

            $("#financials option").each(function(ind, val){
                if($(val).attr('data-id') == $(coef).attr('data-id'))
                    $(val).attr('selected',false);
            });

//                $(option).attr("selected","selected");

            var importeCuota = ( aFinanciar * $(option).val() ) / dues;
            $('#importeCuota').val(parseFloat(importeCuota).toFixed(2));
        });

        //        var app = angular.module("myApp", []);

        app.controller("myCtrl", function ($scope, $http) {
            $http.get("admin/budgetsItems/{!! $models->id !!}")
                    .then(function (response) {

                        $scope.stotal = parseFloat(response.data[0]['price'])


                        $scope.data = response.data[1]
                        $scope.descuento = {!! $models->descuento or '0' !!}
                        $scope.anticipo = {!! $models->anticipo or '0' !!}
                        $scope.importeCuota = {!! $models->importe_cuota or '0' !!}
                        $scope.aFinanciar = {!! $models->a_financiar or '0' !!}
                        $scope.calcular();
                        $scope.financiamientos();

                    });



                    $scope.calcular = function()
            {
                if( ($scope.descuento != null) && (parseFloat($scope.descuento) != 0)) {
                    var total = parseFloat(($scope.stotal  * $scope.descuento) / 100).toFixed(2);
                    $scope.total = parseFloat($scope.stotal - total).toFixed(2);


                }else
                    $scope.total =  parseFloat(parseFloat($('input[name=total]').attr('value'))+$scope.stotal).toFixed(2);


//                $scope.financiar();
                $scope.financiamientos();
            };

            $scope.financiar = function()
            {
                $scope.aFinanciar = parseFloat($scope.total -  $scope.anticipo).toFixed(2) ;
            };

            $scope.financiamientos = function(){
                var total = $scope.stotal;
                var financiamientos = $(".financiamiento");
                

                financiamientos.each(function(ind,val){
                    var due = $(val).attr("data-due");
                        
                    if($(val).attr("data-porcent")){
                        var porcent = $(val).attr("data-porcent");
                        var valor = ((total) + ((total * porcent) / 100 )) / due;
                    }
                                                                            
                    if($(val).attr("data-coef")){
                        var coef = $(val).attr("data-coef");
                        var valor = (total * coef) / due;
                    }

                    
                    $(this).text(due+" cuotas de $ "+valor.toLocaleString("Es-Ar",{maximumFractionDigits: 2}));
                })
            }    






            var contenedor = $("#adicionales")
            var save = $(".saveAdicionales")
            var remove = $(".adicionales a[btn-danger]")


            var select = contenedor.find('select[name=additionals_id]')
            var amount = contenedor.find('input[name=amount]')
            var entity = contenedor.find('input[name=entity]')
            var id = contenedor.find('input[name=id]')
            var token = contenedor.find('input[name=_token]')

            save.on('click',function(ev){
                ev.preventDefault()

                if(select.val() == "" && mount.val() == "")
                    return false
                else{
                    var data = {
                        additionals_id : select.val(),
                        amount : amount.val(),
                        entity: entity.val(),
                        _token: token.val(),
                        id: id.val()
                    }


                    $.ajax({
                        url: 'admin/addAdditionals',
                        data: data,
                        method: 'POST',
                        success: function(response){
                            $scope.stotal = parseFloat($scope.stotal) +parseFloat(amount.val());

                            $scope.calcular();
                            $scope.financiar();

                            $('input[name=total]').val($scope.total)
                            $('#aFinanciar').val($scope.aFinanciar)

                            $(".adicionales").append($('<tr><td class="text-center">'+response.name+'</td><td class="text-center">$ '+amount.val()+'</td><td><div class="btn-group pull-right"><a href="admin/removeAdditionals/'+response.id+'" class="btn btn-xs btn-danger deleteAdicionales" data-id="'+select.val()+'"><i class="fa fa-trash"></i></a></div></td></tr>'))
                        },
                        error: function (error) {
                            console.log("Error: "+error)
                        }
                    })

                }
            })



            contenedor.on('click','.deleteAdicionales',function(ev){
                ev.preventDefault()

                $(this).attr('disabled',true)

                var contenedor = $(this).parent().parent().parent()

                var data = {
                    additionals_id : $(this).attr('data-id'),
                    entity: entity.val(),
                    _token: token.val(),

                    id: id.val()
                }


                $.ajax({
                    url: 'admin/removeAdditionals',
                    data: data,
                    method: 'POST',
                    success: function(response){

                        $scope.stotal = parseFloat($scope.stotal) - parseFloat(response.amount);

                        $scope.calcular();
                        $scope.financiar();

                        $('input[name=total]').val($scope.total)
                        $('#aFinanciar').val($scope.aFinanciar)


                        $(contenedor).remove()
                    },
                    error: function (error) {
                        console.log("Error: "+error)
                    }
                })

            })

        });

        @endif




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



    </script>
    <script src="js/buscadorLocalidades.js"></script>
>
@endsection