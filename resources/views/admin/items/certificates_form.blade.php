@extends('template.model_form')

    @section('form_title')
        Nuevo Certificado
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

        {!! Form::hidden('items_id', $items_id) !!}
        <div class="row">
            <div class="col-xs-4 form-group">
                {!! Form::label('Número Certificado') !!}
                {!! Form::text('number', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-4 form-group">
                {!! Form::label('Fecha') !!}
                {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
                {!! Form::label('Modelo Técnico') !!}
                {!! Form::text('tecnic_model', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
                {!! Form::label('Año') !!}
                {!! Form::text('year',  null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
                {!! Form::label('Tipo') !!}
                {!! Form::select('type', ['Digital'=>'Digital', 'Papel'=> 'Papel'], null, ['class'=>'select2 form-control']) !!}
            </div>

        </div>

@endsection

