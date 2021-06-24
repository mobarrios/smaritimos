@extends('template.model_form')


    @section('form_title')
        Nuevo Cliente
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
        @endif


        @if($section == 'prospectos')
            {!! Form::hidden('prospectos',true) !!}
        @endif

        <div class="col-xs-3 form-group">
            {!! Form::label('DNI') !!}
            {!! Form::text('dni', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-3 form-group">
            {!! Form::label('Apellido') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-3 form-group">
            {!! Form::label('Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-3 form-group">
            {!! Form::label('Email') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-xs-3 form-group posRelative">
            {!! Form::label('Localidad') !!}

            {!! Form::select('localidades_id',$localidades,null,['class' => 'filter form-control']) !!}
        </div>


        <div class="col-xs-3 form-group">
            {!! Form::label('Dirección') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>


        <div class="col-xs-3 form-group">
            {!! Form::label('Telefono') !!}
            {!! Form::text('phone1', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-3 form-group">
            {!! Form::label('Telefono de Contacto') !!}
            {!! Form::text('phone2', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-xs-3 form-group">
            {!! Form::label('Condición IVA') !!}
            {!! Form::select('iva_conditions_id', $ivaConditions,null,  ['class'=>'form-control select2', 'placeholder'=> 'Seleccionar']) !!}
        </div>

@endsection

@section('js')
    <script src="js/buscadorLocalidades.js"></script>
@endsection
