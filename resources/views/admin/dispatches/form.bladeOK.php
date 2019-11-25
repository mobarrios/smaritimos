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

    <div class="col-xs-2  form-group">
        {!! Form::label('Fecha Remito') !!}
        {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Nro. Remito') !!}
        {!! Form::text('number', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Imagen Remito') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Pedido de Mercaderia') !!}

        <select name="purchases_orders_id" class="form-control" ng-model="itemSelected">
            @foreach($providers as $provider)
                <optgroup label="{{$provider->name}}">
                    @foreach($provider->PurchasesOrdersConfirmed as $purchasesOrder)
                        <option ng-click="onCategoryChange($event)" value="{{$purchasesOrder->id}}">
                            # {{$purchasesOrder->id }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Sucursal') !!}
        {!! Form::select('branches_id',$branches ,null, ['class'=>'select2 form-control']) !!}
    </div>

    <div class="col-xs-2 form-group" style="padding-top: 2%">
        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
        @if(isset($models))
            <a href="#" data-action="{!! route("moto.dispatches.addItems") !!}" data-toggle="control-sidebar"
               class="btn btn-default"><span class="fa fa-plus"></span></a>
        @endif
    </div>

    {!! Form::close() !!}

    @if(isset($models))
        <div class=" panel-default col-xs-12">
            <span>Detalle Pedido # {{$models->PurchasesOrders->id}}</span>

            <table class="table table-striped">
                <thead>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th></th>
                    <th></th>
                    <th></th>


                </thead>
                <tbody>
                @foreach($models->PurchasesOrders->PurchasesOrdersItems as $purchasesOrder)

                    @for($i=0; $i <= $purchasesOrder->quantity; $i++ )
                        <tr>
                            <td>{{$purchasesOrder->Models->Brands->name}}</td>
                            <td>{{$purchasesOrder->Models->name}}</td>
                            <td>{{$purchasesOrder->Colors->name}} </td>
                            <td> <input type="text" placeholder="N Motor"></td>
                            <td> <input type="text" placeholder="N Chasis"></td>
                            <td> <button class="btn"><span class="fa fa-share"></span></button></td>
                        </tr>
                    @endfor

                @endforeach
                </tbody>

            </table>


        </div>
        <div class="col-xs-12">
            <table class="table">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>N Motor</th>
                    <th>N Cuadro</th>
                </tr>
                <tbody>
                @foreach($models->DispatchesItems as $item)
                    <tr>
                        <td>{{$item->Items->Models->Brands->name}}</td>
                        <td>{{$item->Items->Models->name}}</td>
                        <td>{{$item->Items->Colors->name}}</td>
                        <td>{{$item->Items->n_motor}}</td>
                        <td>{{$item->Items->n_cuadro}}</td>

                        <td>
                            <a href="{{route('moto.dispatches.deleteItems',[$item->id,$models->id])}}"><span
                                        class="text-danger fa fa-trash"></span></a>
                        </td>
                        <td>
                            <a href="{{route('moto.dispatches.editItems',[$item->id,$models->id])}}"><span
                                        class="text-success fa fa-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @endsection


        @section('formAside')

        @include('moto.partials.asideOpenForm')

        @if(isset($models))

                <!-- .control-sidebar-menu -->

        @if(isset($modelItems))
            {!! Form::model($modelItems,['route'=> ['moto.dispatches.updateItems', $modelItems->id,$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> ['moto.dispatches.addItems' ], 'files' =>'true']) !!}
        @endif

        {!! Form::hidden('dispatches_id',$models->id) !!}
        {!! Form::hidden('branches_id',$models->Brancheables->first()->Branches->id) !!}

        <div class="col-xs-12 form-group">
            {!! Form::label('Modelo') !!}
            {!! Form::select('models_id', $models_lists, null, ['class'=>'form-control select2']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Color') !!}
            {!! Form::select('colors_id', $colors, null, ['class'=>'form-control select2']) !!}
        </div>

        <div class="col-xs-12 form-group">
            {!! Form::label('N Motor') !!}
            {!! Form::text('n_motor', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('N Cuadro') !!}
            {!! Form::text('n_cuadro', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
        </div>
        {!! Form::close() !!}
                <!-- /.control-sidebar-menu -->
    @endif
    @include('moto.partials.asideCloseForm')


@endsection


