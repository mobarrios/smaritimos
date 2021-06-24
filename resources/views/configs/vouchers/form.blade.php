@extends('template.model_form')

@section('form_title')
    Nuevo Comprobante
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
    @else
        {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
    @endif

    <div class="col-xs-12 form-group">
        {!! Form::label('Número') !!}
        {!! Form::text('numero', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-2 form-group">
        {!! Form::label('Fecha') !!}
        {!! Form::text('fecha', null, ['class'=>'datePicker form-control']) !!}
    </div>
    <div class="col-xs-2 form-group">
        {!! Form::label('Tipo') !!}
        {!! Form::select('tipo', $tipos, null, ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-2 form-group">
        {!! Form::label('Letra') !!}
        {!! Form::select('letra', $letras,null, ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-4 form-group">
        {!! Form::label('Concepto') !!}
        {!! Form::text('concepto', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-2 form-group">
        {!! Form::label('Importe Total') !!}
        {!! Form::text('importe_total', null, ['class'=>'form-control']) !!}
    </div>

@endsection

