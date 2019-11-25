@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->numero}}</td>
                <td>{{$model->fecha }}</td>
                <td>{{$model->tipo }}</td>
                <td>{{$model->letra}}</td>
                <td>{{$model->concepto}}</td>
                <td>$ {{$model->importe_total}}</td>

            </tr>
        @endforeach
    @endsection