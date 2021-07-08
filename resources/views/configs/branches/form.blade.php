@extends('template.model_form')

@section('form_title')
    Nueva Sucursal
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
    @else
        {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
    @endif

    <div class="col-xs-12 form-group">
        {!! Form::label('Nombre') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-4 form-group">
        {!! Form::label('Dirección') !!}
        {!! Form::text('address', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-4 form-group">
        {!! Form::label('Telefono') !!}
        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-4 form-group">
        {!! Form::label('Razon Social') !!}
        {!! Form::select('company_id', $razonSocial , null , ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-4 form-group">
        {!! Form::label('Punto de Venta') !!}
        {!! Form::text('punto_venta', null, ['class'=>'form-control']) !!}
    </div>



@endsection

