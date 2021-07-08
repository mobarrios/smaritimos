@if(isset($models))
    {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
@else
    {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
@endif

<div class="row">
    <div class="col-xs-12 form-group">
        {!! Form::label('Modelo') !!}
        <select name='models_id' class=" select2 form-control">
            @foreach($brands as $br)
                <optgroup label="{{$br->name}}">
                    @foreach($br->Models as $m)
                        <option value="{{$m->id}}" @if(isset($model) && ($model->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Nro. Motor') !!}
        {!! Form::text('n_motor', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Nro. Cuadro') !!}
        {!! Form::text('n_cuadro', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('Año') !!}
        {!! Form::text('year', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Color') !!}
        {!! Form::select('colors_id',$colors, null, ['class'=>'select2 form-control']) !!}
    </div>
</div>