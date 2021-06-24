@extends('template')

@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Items</h3>
                </div>

                @if(isset($budgetsItems))
                    {!! Form::model($budgetsItems,['route' => config('models.'.$section.'.updateItemsRoute'),'method' => 'post']) !!}
                    {!! Form::hidden('budgets_items_id', $budgetsItems->id) !!}
                @else
                    {!! Form::open(['route' => config('models.'.$section.'.createItemsRoute'),'method' => 'post']) !!}
                @endif

                    {!! Form::hidden('budgets_id', $budgets->id) !!}


                <div class="box-body">
                    <div class="col-xs-6 form-group">
                        {!! Form::label('Modelo') !!}
                        <select id="select_model" name='models_id' class=" select2 form-control"
                                placeholder="Seleccione un modelo">
                            <option>Seleccionar...</option>
                            @foreach($brands as $br)
                                <optgroup label="{{$br->name}}">
                                    @foreach($br->Models as $m)
                                        @if($m->stock >= 1)
                                            <option value="{{$m->id}}"

                                                    @if(isset($budgetsItems) && ($budgetsItems->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-6 form-group">
                        {!! Form::label('Color') !!}

                    @if(isset($budgetsItems))
                            <select name="colors_id" id="colors" class="form-control select2">
                                @foreach($budgetsItems->models->modelsByColors as $id => $color)
                                    <option value=' {!! $id  !!} '
                                            {!! $id == $budgetsItems->colors_id ? 'selected="selected"' : '' !!}>
                                            {!! $color["color"] !!}
                                        ( {!! $color["cantidad"] !!} )
                                    </option>
                                @endforeach
                            </select>

                        @else
                            {!! Form::select('colors_id',[],null, ['class'=>'form-control select2',"id" => "colors"]) !!}
                        @endif
                    </div>

                    <div class="col-xs-6 col-lg-6 form-group">
                        {!! Form::label('Subtotal') !!}
                        {!! Form::number('price_budget', null, ['class'=>'form-control sTotal']) !!}
                    </div>




                    <div class="col-xs-12">
                        <table id="additionals" class="table">

                        </table>
                    </div>

                </div>

                <div class="box-footer clearfix">
                    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}"
                           class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>

        $('#select_model').on('change', function () {

            var id = $(this).val();
            $('#additionals').empty();
            $('#colors').empty();

            $.ajax({
                method: 'GET',
                url: 'admin/modelLists/' + id,

                success: function (data) {

                    $('.sTotal').val(data.active_list_price.price_list);

                    //recorre los adicionales
                    $.each(data.additionables, function (a, b) {
                        $('#additionals').append('<tr><td>' + b.additionals.name + '</td><td>$ <input type="text" name="additionals['+b.additionals.id+']" value="'+ b.amount + '"</td></tr>');
                    });

                    // busca los colores disponibles
                    $.ajax({
                        method: 'GET',
                        url: 'admin/modelAvailables/' + id,
                        success: function (response) {

                            $.each(response, function (x, y) {
                                $('#colors').append('<option value=' + x + ' >' + y.color + ' ( ' + y.cantidad + ' ) </option>');
                            });
                        }
                    })
                }
            })
        });
    </script>

@endsection
