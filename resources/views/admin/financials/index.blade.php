@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>

                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->name }}</td>
                <td>{{$model->extra_cost}}</td>
            </tr>
        @endforeach
    @endsection