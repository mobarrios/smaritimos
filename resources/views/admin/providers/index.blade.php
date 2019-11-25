@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>

                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td class="col-xs-1">
                    <div class="image">
                        <img src="{{$model->images()->first()['path']}}" class="img-rounded" alt="Imagen" width="60px" >
                    </div>
                </td>
                <td>{{$model->name }}</td>
                <td>{{$model->address}}</td>
                <td>{{$model->cuit}}</td>
                <td>{{$model->phone}}</td>
                <td>{{$model->mail}}</td>
                <td><a href="{{route('admin.providers.cc', $model->id)}}" class="btn btn-xs btn-default"><span class="fa fa-cc"></span> </a></td>


            </tr>
        @endforeach
    @endsection