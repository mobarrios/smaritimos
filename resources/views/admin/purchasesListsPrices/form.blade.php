@extends('template.model_form')

@section('form_title')
    Nueva Lista de Precio Compra
@endsection

@section('form_inputs')

    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif

    <div class="col-xs-12 col-lg-5 form-group">
        {!! Form::label('Nombre Lista de Precio') !!}
        {!! Form::text('number', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-12 col-lg-3 form-group">
        {!! Form::label('Proveedor') !!}
        {!! Form::select('providers_id', $providers,null, ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-12 col-lg-4  form-group" style="padding-top: 2%">
        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
        @if(isset($models))
            <a href="#" data-action="{!! route("admin.purchasesListsPrices.addItems") !!}" data-toggle="control-sidebar"
               class="btn btn-default"><span class="fa fa-plus"></span></a>
        @endif
    </div>

    {!! Form::close() !!}

    @if(isset($models))
        <div class="col-xs-12">
            <table class="table">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>$ Lista</th>
                    <th>$ Contado</th>
                    <th>Dto. Max</th>
                    <th>Obs.</th>
                </tr>
                <tbody>
                @foreach($models->PurchasesListsPricesItems as $item)
                    <tr>
                        <td>{{$item->Models->Brands->name}}</td>
                        <td>{{$item->Models->name}}</td>
                        <td>$ {{number_format($item->price_list,2)}}</td>
                        <td>$ {{ number_format($item->price_net,2)}}</td>
                        <td>% {{$item->max_discount}}</td>
                        <td>{{$item->obs}}</td>
                        <td>
                            <a href="{{route('admin.purchasesListsPrices.deleteItems',[$item->id,$models->id])}}"><span
                                        class="text-danger fa fa-trash"></span></a>
                        </td>
                        <td>
                            <a href="{{route('admin.purchasesListsPrices.editItems',[$item->id,$models->id])}}"><span
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
        @include('admin.partials.asideOpenForm')
        @if(isset($models))

                <!-- .control-sidebar-menu -->

        @if(isset($modelItems))
            {!! Form::model($modelItems,['route'=> ['admin.purchasesListsPrices.updateItems', $modelItems->id,$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> ['admin.purchasesListsPrices.addItems' ], 'files' =>'true']) !!}
        @endif

        {!! Form::hidden('purchases_lists_prices_id',$models->id) !!}
        <div class="col-xs-12 form-group">
            {!! Form::label('Modelo') !!}
            {!! Form::select('models_id', $models->Providers->ModelsByProviders, null, ['class'=>'form-control select2']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Precio de Lista') !!}
            {!! Form::text('price_list', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Precio de Contado') !!}
            {!! Form::text('price_net', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Dto. Máximo') !!}
            {!! Form::text('max_discount', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Observaciones') !!}
            {!! Form::text('obs', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
        </div>
        {!! Form::close() !!}
                <!-- /.control-sidebar-menu -->
    @endif
    @include('admin.partials.asideCloseForm')


@endsection

