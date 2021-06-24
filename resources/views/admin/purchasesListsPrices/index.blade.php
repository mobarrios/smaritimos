@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->updated_at }}</td>
                <td>{{$model->Providers->name }}</td>
                <td>{{$model->number }}</td>

            </tr>
        @endforeach
    @endsection