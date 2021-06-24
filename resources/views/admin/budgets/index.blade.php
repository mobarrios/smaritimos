@extends('template.model_index_sin_create')
@section('table')
    @foreach($models as $model)
            <tr>

                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>

                <td>{{$model->id}}</td>

                <td>{{$model->date }}</td>
                <td><strong>{{$model->Clients->fullName}}</strong></td>
                <td>
                    <ul>
                        @forelse($model->allItems as $item)
                            <li> {!! $item->name !!}</li>
                        @empty

                        @endforelse
                    </ul>
                </td>

                <td> <label class="label label-default">{{$model->Brancheables->first()->Branches->name}}</label> : {{$model->Users ? $model->Users->fullName : ''}}</td>
                <td>
                    <a href="{{route('admin.budgets.pdf',$model->id)}}" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
                </td>
            </tr>
        @endforeach
    @endsection