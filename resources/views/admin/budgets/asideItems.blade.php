@if($type == 'items')
    @if(isset($modelItems))
        {!! Form::model($modelItems,['route'=> $routeItems, 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> $routeItems, 'files' =>'true']) !!}
    @endif

    @if($hidden)
        @foreach($hidden as $name => $value)
            {!! Form::hidden($name, $value) !!}
        @endforeach
    @endif


        <div class="col-xs-6  form-group">
            {!! Form::label('Modelo') !!}
            <select id="select_model" name='models_id' class=" select2 form-control" placeholder="Seleccione un modelo">
                <option>Seleccionar...</option>
                @foreach($brands as $br)
                    <optgroup label="{{$br->name}}">
                        @foreach($br->Models as $m)
                            @if($m->stock >= 1)
                                <option value="{{$m->id}}"
                                        @if(isset($modelItems) && ($modelItems->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>

        <div class="col-xs-6 form-group">
            {!! Form::label('Color') !!}
            @if(isset($modelItems))
                @if(is_array($colors))
                    <select name="colors_id" id="colors" class="form-control select2">
                        @foreach($colors as $cant => $color)
                            @foreach($color as $col)
                                <option value=' {!! $col->colors_id  !!} ' @if($col->colors_id == $modelItems->colors_id) selected = "selected" @endif> {!! $col->colors->name !!} ( {!! $color->count() !!} ) </option>
                            @endforeach
                        @endforeach
                    </select>
                @else
                    {!! Form::select('colors_id', [],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
                @endif
                    {{--                {!! Form::select('colors_id', $colors,null, ['class'=>'form-control select2',"id" => "colors"]) !!}--}}
            @else
                {!! Form::select('colors_id', [],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
            @endif
        </div>

        <div class="col-xs-6 col-lg-6 form-group">
            {!! Form::label('Patentamiento') !!}
            {!! Form::number('patentamiento', null, ['class'=>'form-control patentamiento', config('models.'.$section.'.asideItems.patentamiento') => config('models.'.$section.'.asideItems.patentamiento')]) !!}
        </div>

        <div class="col-xs-6 col-lg-6 form-group">
            {!! Form::label('Subtotal') !!}
            {!! Form::number('price_budget', null, ['class'=>'form-control sTotal']) !!}
        </div>

        <div class="col-xs-6 form-group">
            {!! Form::label('Pack service') !!}
            {!! Form::number('pack_service', null, ['class'=>'form-control packService', config('models.'.$section.'.asideItems.pack_service') => config('models.'.$section.'.asideItems.pack_service')]) !!}
        </div>




<div class="col-xs-12 text-center form-group" style="padding-top: 2%">
    <button type="submit" class="btn btn-primary">Agregar</button>
    <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
</div>


{{--<script src="js/asideModelsColors.js"></script>--}}
