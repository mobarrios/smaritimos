@extends('template.model_form')

@section('form_title')
    Nuevo Remito
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif

    <div ng-app="myApp">
        <div ng-controller="myCtrl">

            <div class="col-xs-2  form-group">
                {!! Form::label('Fecha Remito') !!}
                {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
            </div>

            <div class="col-xs-4 form-group">
                {!! Form::label('Nro. Remito') !!}
                {!! Form::text('number', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-4 form-group">
                {!! Form::label('Imagen Remito') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-2 form-group" style="padding-top: 2%">
                <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
            </div>

            {!! Form::close() !!}

            <div class="col-xs-5 form-group">
                {!! Form::label('Pedido de Mercaderia') !!}

                <select name="purchases_orders_id" class="form-control" ng-model="itemSelected">
                    @foreach($providers as $provider)
                        <optgroup label="{{$provider->name}}">
                            @foreach($provider->PurchasesOrders as $purchasesOrder)
                                <option ng-click="onCategoryChange($event)" value="{{$purchasesOrder->id}}">
                                    # {{$purchasesOrder->id }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>

            <div class="col-xs-12" ng-repeat="x in data">
                <div class="col-xs-12" ng-repeat="a in x.dispatches_items ">
                    <div class="col-xs-5">@{{ x.models.brands.name }} <strong>@{{ x.models.name }}</strong>
                        | @{{ x.colors.name }}</div>
                    <div class="col-xs-3">
                            <input ng-model="n_motor" name="n_motor" type="text" class="form-control input-sm"
                                                 placeholder="N Motor"></div>
                    <div class="col-xs-3">
                            <input ng-model="n_chasis" name="n_chasis" type="text" class="form-control input-sm"
                                                 placeholder="N Chasis"></div>

                    <div class="col-xs-1">
                        <a ng-click="save({{$models->id}},  x.id , a.id )" class="btn btn-xs btn-default"><span
                                    class="fa fa-check-square-o"></span></a>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('js')
    <script>
        var app = angular.module("myApp", []);

        app.controller("myCtrl", function ($scope, $http) {


            $scope.onCategoryChange = function (event) {

                var id = event.currentTarget.getAttribute('value');
                find(id);
            };

            $scope.save = function (a, b, c) {

                var dispatches_id = a;
                var purchases_orders_id = b;
                var purchases_orders_items_id = c;

                $http.get("moto/addItemsFromDispatches/" + dispatches_id + "/" + purchases_orders_id + "/" + purchases_orders_items_id)
                        .then(function (response) {
                            console.log(response.data);
                        });
            };

            function find(id) {
                $http.get("moto/purchasesOrdersFind/" + id)
                        .then(function (response) {
                            $scope.data = response.data.purchases_orders_items;
                        });
            };

        });
    </script>
@endsection
