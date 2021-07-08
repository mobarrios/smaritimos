@extends('template')

@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Items</h3>
                </div>

                @if(isset($models))
                    {!! Form::model($models,['route' => [config('models.'.$section.'.updateItemsRoute'),$item,$id],'method' => 'post']) !!}
                @else
                    {!! Form::open(['route' => (config('models.'.$section.'.addItemsRoute')),'method' => 'post']) !!}
                @endif

                {!! Form::hidden('branches_confirm_id', $models->branches_confirm_id) !!}
                {!! Form::hidden($section.'_id', $id) !!}


                <div class="box-body">
                    <div class="col-xs-6 col-md-3  form-group">
                        {!! Form::label('Modelo') !!}
                        <select id="select_model" name='models_id' class=" select2 form-control" placeholder="Seleccione un modelo">
                            <option>Seleccionar...</option>
                            @foreach($brands as $br)
                                <optgroup label="{{$br->name}}">
                                    @foreach($br->Models as $m)
                                        @if($m->stock >= 1)
                                            <option value="{{$m->id}}"
                                                    @if(isset($models) && ($models->items->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Color') !!}
                        @if(isset($models))
                            <select name="colors_id" id="colors" class="form-control select2">
                                @foreach($models->items->models->modelsByColors as $id => $color)
                                    <option value=' {!! $id  !!} ' @if($id == $models->items->colors_id) selected = "selected" @endif> {!! $color["color"] !!} ( {!! $color["cantidad"] !!} ) </option>
                                @endforeach
                            </select>

                        @else
                            {!! Form::select('colors_id', [],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
                        @endif
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Precio actual') !!}
                        {!! Form::number('price_actual', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Patentamiento') !!}
                        {!! Form::number('patentamiento', null, ['class'=>'form-control patentamiento']) !!}
                    </div>


                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Pack service') !!}
                        {!! Form::number('pack_service', null, ['class'=>'form-control']) !!}
                    </div>


                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Cédula') !!}
                        {!! Form::number('cedula', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Alta patente') !!}
                        {!! Form::number('alta_patente', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Adic. Sucursal') !!}
                        {!! Form::number('ad_suc', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('LoJack') !!}
                        {!! Form::number('lojack', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Alta de seguro') !!}
                        {!! Form::number('alta_seguro', null, ['class'=>'form-control']) !!}
                    </div>


                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Larga distancia') !!}
                        {!! Form::number('larga_distancia', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 col-md-3 form-group">
                        {!! Form::label('Formularios') !!}
                        {!! Form::number('formularios', null, ['class'=>'form-control']) !!}
                    </div>




                </div>

                <div class="box-footer clearfix">
                    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="js/asideModelsColors.js"></script>

@endsection
