@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td class="col-xs-1">
                    <div class="image">
                        <img src="{{$model->images ? $model->images->path : "../public/vendors/LTE/dist/img/avatar5.png"}}" class="img-rounded" alt="Imagen" width="60px" >
                    </div>
                </td>
                <td>{{$model->id}}</td>
                <td><strong>{{$model->user_name }}</strong></td>
                <td>{{$model->fullName }}</td>
                <td>{{$model->email}}</td>

                <td>
                    @foreach($model->Roles as $rol)
                        {{$rol->name}}
                    @endforeach
                </td>
                <td>
                    {{$model->brancheables->Branches->name or  ''}}
                </td>
                <td>
                    <span class="label label-success">Activo</span>
                </td>
            </tr>
        @endforeach
    @endsection