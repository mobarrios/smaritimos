@extends('template.model_form')

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> ['configs.customs.post',$section]]) !!}
    @else
        {!! Form::open(['route'=>['configs.customs.post',$section]]) !!}
    @endif

    <div class="col-xs-3 form-group">
        {!! Form::label('Label') !!}
        {!! Form::text('label', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-3 form-group">
        {!! Form::label('Nombre') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-3 form-group">
        {!! Form::label('Tipo') !!}
        {!! Form::select('type', ['string'=> 'string', 'integer' => 'integer', 'double' => 'double'],null, ['class'=>'select2 form-control']) !!}
    </div>
    <div class="col-xs-3 form-group">
        {!! Form::label('Tamaño') !!}
        {!! Form::text('size', null, ['class'=>' form-control']) !!}
    </div>

    <div class="col-xs-12">
        <table class="table">
            <thead>
                <th>Label</th>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
            </thead>
            <tbody>
            @foreach($models->customs as $custom)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

@endsection

