@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>

                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->name}}</td>
                <td>
                    @if($model->additionable)
                        <ul>
                            @foreach($model->additionable as $additionable)
                                <li>{{$additionable->name }}</li>
                            @endforeach
                        </ul>

                    @endif
                </td>
            </tr>
        @endforeach
    @endsection