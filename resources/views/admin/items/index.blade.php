@extends('template.model_index')

    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>N/S : {{$model->n_serie}}</td>
                <td>{{$model->Models->Brands->name }} <strong>{{$model->Models->name }}</strong><br></td>
                <td>
                    @foreach($model->Brancheables as $branch)
                       <label class="label label-default"> {{$branch->branches->name}} </label>
                    @endforeach
                </td>
                <td>
                        <label class="label label-primary"> {{$model->statusName}} </label><br>
                    <p class="text-muted">ingreso : {{$model->fechaIngreso}}</p>
                </td>
                <td>
                    <a href="{{route('admin.items.edit',$model->id)}}" class="btn btn-md btn-default"><p class="fa fa-qrcode"></p></a>
                </td>
            </tr>
        @endforeach


    @endsection