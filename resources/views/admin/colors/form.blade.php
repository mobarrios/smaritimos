@extends('template.model_form')

    @section('form_title')
        Nuevo Color
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

            <div class="col-xs-12 form-group">
              {!! Form::label('Color') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
@endsection

