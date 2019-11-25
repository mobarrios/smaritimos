@extends('template.model_form')

@section('form_title')
    Nueva Sucursal
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id],'files' => 'true']) !!}
    @else
        {!! Form::open(['route'=>config('models.'.$section.'.storeRoute'),'files' => 'true']) !!}
    @endif

    <div class="col-xs-12 form-group">
        {!! Form::label('Razón Social') !!}
        {!! Form::text('razon_social', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Nombre Fantasia') !!}
        {!! Form::text('nombre_fantasia', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Dirección') !!}
        {!! Form::text('direccion', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Teléfono') !!}
        {!! Form::text('telefono', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('CUIT') !!}
        {!! Form::text('cuit', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('INGRESOS BRUTOS') !!}
        {!! Form::text('ingresos_brutos', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('CONDICION IVA') !!}
        {!! Form::select('iva_conditions_id', $ivaConditions,null, ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Inicio Actividad') !!}
        {!! Form::text('inicio_actividades', null, ['class'=>'form-control datePicker']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Logo') !!}
        {!! Form::file('image') !!}

        @if($models->images->count() > 0)
         <div class="col-xs-12 col-sm-10 col-md-6">
            <img src="{!! $models->images->first()->path !!}" alt="logo" class="img-responsive img-thumbnail">
         </div>
        @endif
    </div>
@endsection

