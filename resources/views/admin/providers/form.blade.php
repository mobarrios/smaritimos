@extends('template.model_form')

    @section('form_title')
       {{ isset($models) ?  $models->name : 'Nuevo Proveedor'}}
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif

        <div class="col-xs-6 form-group">
            {!! Form::label('Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('Dirección') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('CUIT') !!}
            {!! Form::text('cuit', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('Mail') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('Telefono') !!}
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('Tipo de Pago') !!}
            {!! Form::select ('providers_payments_id', $providersPayments ,null, ['class'=>'select2 form-control', 'placeholder'=>'Seleccionar...']) !!}
        </div>
        <div class="col-xs-6 form-group">
            {!! Form::label('Imagen') !!}
            {!! Form::file('image') !!}
        </div>

@endsection

