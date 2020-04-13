@extends('template.model_form')

    @section('form_title')
        Nueva Categoría
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif

            <div class="col-xs-12 form-group">
              {!! Form::label('Categoría') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-12 form-group">
              {!! Form::label('Super-Categoría') !!}
              {!! Form::select('main',[ 1 => 'Si' , 0 => 'No' ],null, ['class'=>'form-control select2']) !!}
            </div>




@endsection

