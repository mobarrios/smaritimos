@extends('template')
@section('sectionContent')

    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-xs-8">
                        <div class="row pull-left box-tools ">
                            <button id="check_all" type="button" class="btn btn-sm btn-default" data-toggle="button" aria-pressed="false"><i class="fa fa-check-square-o"></i></button>
                            <div class="btn-group btn-group-sm">
                                <button id="btn-destroy" class="destroy_btn btn btn-default" url_destroy = "{{ route(config('models.'.$section.'.destroyRoute'))}}" title="Borrar"><i class="fa fa-minus-square-o"></i></button>
                                <button id="edit_btn" route_edit="{{route(config('models.'.$section.'.editRoute'))}}" class="btn btn-default" title="Editar" ><i class="fa fa-edit"></i></button>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('utilities.exportToExcel')}}" class="btn btn-default" title="Exportar Excel"><i class="fa bg-success fa-file-excel-o"></i></a>
                                <a href="{{ route('admin.'.$section.'.pdf')}}" target="_blank" class="btn btn-default" title="Exportar PDF"><i class="fa bg-danger fa-file-pdf-o"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-4 ">
                        {!! Form::open(['route'=>\Illuminate\Support\Facades\Request::segment(2) == 'prospectos' ? 'admin.prospectos.index' : config('models.'.$section.'.indexRoute'),'method'=>'GET']) !!}

                        <div class="input-group input-group-sm" >
                            <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @foreach(config('models.'.$section.'.search') as $filter => $v)
                                        @if(!is_array($v))
                                            <li><a ><input name="filter[]" value="{{$v}}"  checked type="checkbox"> {{$filter}}</a></li>
                                        @else

                                            <li><a ><input name="filter[]" value="{{$v[0]}},{{$v[1]}}"  checked type="checkbox"> {{$filter}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td style="width: 1%">
                                        <input class="id_destroy" value="{{$model->id}}" type="checkbox">
                                    </td>
                                    <td>{{$model->dni}}</td>

                                    <td>{{$model->last_name}} {{$model->name }}</td>
                                    <td>{{$model->address}}</td>
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
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <h6 >Total de Registros : <strong>{{$models->count()}}</strong></h6>

                    <ul class="pagination pagination-md no-margin pull-right">
                        @if(isset($search))
                            {!! $models->appends(['search'=> $search])->render() !!}
                        @else
                            {!! $models->render() !!}
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection