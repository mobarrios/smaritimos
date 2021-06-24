@extends('template.model_index')
@section('table')
    @foreach($models as $model)
        <tr>
            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{{$model->id}}</td>
            <td>{{$model->date }}</td>
            <td>{{$model->Providers->name }}</td>
            <td>{{$model->Branches->name }}</td>
            <td>{{$model->Users->fullName }}</td>
            <td>Items Pedidos : <label class="label label-default">{{$model->PurchasesOrdersItems->SUM('quantity') }}</label></td>
            <td><label class="label label-warning">{{$model->statusName}}</label></td></tr>
    @endforeach
@endsection