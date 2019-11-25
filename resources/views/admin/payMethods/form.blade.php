@extends('template.model_form')

    @section('form_title')
        Nuevo Artículo
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif

            <div class="col-xs-12 form-group">
              {!! Form::label('Medio de Pago') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>


@endsection

