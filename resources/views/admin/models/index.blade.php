@extends('template.model_index')
@section('table')
    @foreach($models as $model)
        <tr>
            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{{$model->id}}</td>
            <td class="col-xs-1">
                <div class="image">
                    <img src="{{$model->images()->first()['path']}}" class="img-rounded" alt="Imagen" width="60px">
                </div>
            </td>
            <td>
                {{$model->Brands->name }} :
                <strong>{{$model->name}}</strong>
            </td>

            <td>
                @if($model->activeListPrice)
                    <div class="col-xs-12">
                        <strong class="text-danger"> {{$model->activeListPrice->ModelsListsPrices->number }}</strong><br>
                        Lista : <strong class="text-success pull-right">$ {{ number_format($model->activeListPrice->price_list , 2 ) }}</strong><br>
                        Contado : <strong class="pull-right">$ {{ number_format($model->activeListPrice->price_net , 2)}}</strong><br>
                    </div>
                @endif

            </td>
            <td>



            </td>


            <td>
                @if($model->stock == 0 )
                    <label class="label label-danger">Sin Stock</label>
                @else
                    <label class="label label-success">{{$model->statusName}}</label>
                    <label class="label label-success">{{$model->stock}}</label>
                @endif

            </td>

        </tr>
    @endforeach
@endsection

@section('modal')

    !-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Solicitar Modelos</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open() !!}

                    {!! Form::label('Cantidad') !!}
                    {!! Form::number('cantidad',null,['class'=>'form-control']) !!}

                    {!! Form::label('Color') !!}
                    {!! Form::number('cantidad',null,['class'=>'form-control']) !!}

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>


@endsection