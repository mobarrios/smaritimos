@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td><strong>{{$model->razon_social }}</strong></td>
                <td>{{$model->nombre_fantasia}}</td>
                <td>{{$model->cuit}}</td>
                <td>{{$model->direccion}}</td>
                <td>{{$model->IvaConditions->name}}</td>
                <td>{{$model->ingrsos_brutos}}</td>



            </tr>
        @endforeach
    @endsection