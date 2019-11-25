@extends('template.model_form')

    @section('form_title')
        Nuevo Rol
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

            <div class="col-xs-6 form-group">
              {!! Form::label('Nombre') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">

                {!! Form::label('Descripción') !!}
                {!! Form::text('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Nivel') !!}
                {!! Form::text('level', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-6 form-group">
                {!! Form::label('Permisos') !!}
                {!! Form::select('permissions_id[]',$permissions,null, ['class'=>'select2 form-control' ,'multiple'=>'']) !!}


            </div>

@endsection

