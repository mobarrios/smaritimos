@extends('template.model_form')

@section('form_title')
    Upload Lista de Precio
@endsection

@section('form_inputs')


    {!! Form::open(['route'=> config('models.'.$section.'.upload') , 'files'=>'true']) !!}

    {!! Form::hidden('modelsListsPricesId',$modelsListsPricesId) !!}

        <div class="col-xs-12 col-lg-5 form-group">
            {!! Form::label('Archivo XLS') !!}
            {!! Form::file( 'file') !!}
        </div>

        <div class="col-xs-12 ">
            {!! Form::submit('Subir',['class'=>'btn ']) !!}
        </div>
    {!! Form::close() !!}


@endsection

