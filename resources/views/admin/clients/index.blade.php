@extends('template.model_index_sin_create')
@section('table')

    @foreach($models as $model)
        <tr>

            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{{$model->dni}}</td>

            <td>{{$model->last_name}} {{$model->name }}</td>

            <td>{{$model->address}}, {{$model->Localidades->name or ''}} , {{$model->Localidades->Municipios->name or ''}} , {{$model->Localidades->Municipios->Provincias->name or ''}}</td>
            <td>tel. {{$model->phone1}} <br> tel. {{$model->phone2}}</td>
            <td>{{$model->email}}</td>
            <td>
                <div class="btn-group">
                        {{--<a href="{{route('admin.budgets.create',$model->id)}}" class="btn btn-default"><span class="fa fa-file-o"></span></a>--}}
                    @if($model->budgets->count() > 0)
                    <a href="{{route('admin.budgets.indexProspectos',$model->id)}}" class="btn btn-default"><span class="fa fa-file-text-o"></span></a>
                    @endif

                </div>
            </td>


    @endforeach
@endsection