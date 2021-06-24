@extends('template.model_form')

@section('form_title')
    Nueva Caja Chica
@endsection

@section('form_inputs')

    @if(isset($models))
        {!! Form::model($models,['route'=> config('models.'.$section.'.updateRoute'), $models->id , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif

    {!! Form::hidden('branches_id',\Illuminate\Support\Facades\Auth::user()->branches_active_id) !!}

    <div class="col-xs-3 form-group">
        {!! Form::label('Tipo de caja') !!}
        {!! Form::select('entry', [1 => 'Cobro',0 => 'Pago'] , null ,['class'=>'select2 form-control ']) !!}
    </div>

    {{--{!! Form::hidden('entry',$entry) !!}--}}

    <div class="col-xs-3 form-group">
        {!! Form::label('Fecha') !!}
        {!! Form::text('date', null ,['class'=>'datePicker form-control ']) !!}
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Importe') !!}
        {!! Form::number('amount', null ,['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Tipo') !!}
        {!! Form::select('types_small_boxes_id', $typesSmallBoxes, null ,['class'=>'select2 form-control ']) !!}
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Detalle') !!}
        {!! Form::text('detail', null ,['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Proveedores') !!}

        {!! Form::select('providers_id',  $providers , null ,['class'=>'select2 form-control', 'placeholder'=> 'Seleccionar']) !!}

    </div>



@endsection


@section('js')

    <script>
        $('.datepicker').datepicker({
            language: 'es',
//            format: 'dd-mm-yyyy',
//            startDate: 0


        })
    </script>

@endsection





