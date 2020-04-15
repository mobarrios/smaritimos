@extends('template.model_index')

    @section('table')

        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                 <td class="col-xs-1">
                <div class="image">
                    <img src="{{$model->images()->first()['path']}}" class="img-rounded" alt="Imagen" width="60px">
                </div>
                </td> 
                <td>N/S : {{$model->n_serie}}</td>
                <td>{{$model->Models->Brands->name or '' }} <strong>{{$model->Models->name or '' }}</strong><br></td>
                <td>
                   @foreach($model->Models->Categories as $cat) 

                   <span class="label label-success">{{$cat->name}}</span>

                    @endforeach 

                </td>
                <td>
                    @foreach($model->Brancheables as $branch)
                       <label class="label label-default"> {{$branch->branches->name}} </label>
                    @endforeach
                </td>
                <td>
                        <label class="label label-primary"> {{$model->statusName}} </label><br>
                    <p class="text-muted">Vto. : {{$model->f_vencimiento}}</p>

                </td>
                <td>
                    <a href="{{route('admin.items.qr',$model->id)}}" class="btn btn-md btn-default"><p class="fa fa-qrcode"></p></a>
                </td>
            </tr>
        @endforeach


    @endsection