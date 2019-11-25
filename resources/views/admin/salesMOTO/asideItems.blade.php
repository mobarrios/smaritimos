    @if(isset($model))
        {!! Form::model($model,['url'=> $route, 'files' =>'true','method' => 'POST']) !!}
    @else
        {!! Form::open(['url'=> $route, 'files' =>'true','method' => 'POST']) !!}
    @endif


    @forelse($hidden as $name => $val)
        {!! Form::hidden($name,$val) !!}
    @empty

    @endforelse


    <div class="col-xs-6  form-group">
        {!! Form::label('Modelo') !!}
        <select id="select_model" name='models_id' class=" select2 form-control" placeholder="Seleccione un modelo">
            <option>Seleccionar...</option>
            @foreach($brands as $br)
                <optgroup label="{{$br->name}}">
                    @foreach($br->Models as $m)
                        @if($m->stock >= 1)
                            <option value="{{$m->id}}"
                                    @if(isset($model) && ($model->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                        @endif
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Color') !!}
        @if(isset($model))
            @if(is_array($colors))
                <select name="colors_id" id="colors" class="form-control select2">
                    @foreach($colors as $id => $color)
                        <option value=' {!! $id  !!} ' @if($id == $model->colors_id) selected = "selected" @endif> {!! $color["color"] !!} ( {!! $color["cantidad"] !!} ) </option>
                    @endforeach
                </select>
            @else
                {!! Form::select('colors_id', [],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
            @endif

        @else
            {!! Form::select('colors_id', [],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
        @endif
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Precio actual') !!}
        {!! Form::number('price_actual', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Patentamiento') !!}
        {!! Form::number('patentamiento', null, ['class'=>'form-control patentamiento']) !!}
    </div>


    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Pack service') !!}
        {!! Form::number('pack_service', null, ['class'=>'form-control']) !!}
    </div>


    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Cédula') !!}
        {!! Form::number('cedula', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Alta patente') !!}
        {!! Form::number('alta_patente', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Adic. Sucursal') !!}
        {!! Form::number('ad_suc', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('LoJack') !!}
        {!! Form::number('lojack', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Alta de seguro') !!}
        {!! Form::number('alta_seguro', null, ['class'=>'form-control']) !!}
    </div>


    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Larga distancia') !!}
        {!! Form::number('larga_distancia', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 col-lg-6 form-group">
        {!! Form::label('Formularios') !!}
        {!! Form::number('formularios', null, ['class'=>'form-control']) !!}
    </div>




    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
        </div>

    {!! Form::close() !!}

<script src="js/asideModelsColors.js"></script>
