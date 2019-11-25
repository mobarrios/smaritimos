@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->created_at }}</td>
                <td>{{$model->log}}</td>
                <td>{{$model->logeable_type}} : {{$model->logeable_id}}</td>
                <td>{{ $model->User->fullName }}</td>
            </tr>
        @endforeach
    @endsection