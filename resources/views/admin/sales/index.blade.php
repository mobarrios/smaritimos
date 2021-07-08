@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{ $model->user ? $model->user->fullName : null }}</td>


                <td>
                    @if($model->Clients)
                        <a href="{{route('admin.clients.edit',$model->clients_id) }}" >{{$model->Clients->fullName}}</a>
                    @endif
                </td>
                {{--<td>Sucursal de Entrega : {{$model->BranchesConfirm->name}}</td>--}}

                <td>Total : $ {{number_format($model->total,2)}}</td>


            </tr>
        @endforeach
    @endsection