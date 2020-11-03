@extends('template')
@section('css')
<link rel="stylesheet" href="{{ asset('css/datetable/buttons.dataTables.min.css') }}">
{{--
<link rel="stylesheet" href="{{ asset('css/datetable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
--}}
<link rel="stylesheet" href="{{ asset('css/datetable/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">



@endsection
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
                                <a id="btn-nuevo" href="{{ \Illuminate\Support\Facades\Request::segment(2) == 'budgets' ? route('admin.budgets.create') : route(config('models.'.$section.'.createRoute'))}}" class="btn btn-default" title="Nuevo"><i class="fa fa-plus-square-o"></i></a>
                                <button id="btn-destroy" class="destroy_btn btn btn-default" url_destroy = "{{ \Illuminate\Support\Facades\Request::segment(2) == 'budgets' ? route(config('models.'.$section.'.destroyRoute')) : route(config('models.'.$section.'.destroyRoute'))}}" title="Borrar"><i class="fa fa-minus-square-o"></i></button>
                                <button id="edit_btn" route_edit="{{ \Illuminate\Support\Facades\Request::segment(2) == 'budgets' ? route(config('models.'.$section.'.createRoute')) : route(config('models.'.$section.'.editRoute'))}}" class="btn btn-default" title="Editar" ><i class="fa fa-edit"></i></button>
                            </div>

                        </div>
                    </div>
                    {{--

                    <div class="col-xs-4 ">
                        {!! Form::open(['route'=>\Illuminate\Support\Facades\Request::segment(2) == 'prospectos' ? 'admin.prospectos.index' : config('models.'.$section.'.indexRoute'),'method'=>'GET']) !!}

                        <div class="input-group input-group-sm" >
                            <input type="text" name="search" class="form-control pull-right" placeholder="Search" {{(isset($search)? 'value='.$search : '')}}>
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
                    --}}

                </div>
                <div class="box-body table-responsive">
                    <table class="table  dateTable " id="tableIndex">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>N/S</th>
                            <th>Nombre</th>
                            <th>Tipo Capacidad</th>
                            <th>Capacidad</th>

                            <th>Categorias</th>
                            <th>Sucursal</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                @if(is_null($model->deleted_at))
                                    <tr>
                                        <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                                        <td>{{$model->id}}</td>
                                        <td class="col-xs-1">
                                        <div class="image">
                                            @if($model->images->count() > 0 )
                                                <img src="{{$model->images()->first()['path']}}" class="img-rounded" alt="Imagen" width="60px">
                                            @endif
                                        </div>
                                        </td>
                                        <td>N/S : {{$model->n_serie}}</td>
                                        <td>{{$model->Models->Brands->name or '' }} <strong>{{$model->Models->name or '' }}</strong><br></td>
                                        <td> {{ config('status.capacidades_tipo.'. $model->items_capacidad_tipo_id)}}</td>
                                        <td>{{$model->capacidad}}</td>

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
                                @endif
                                @endforeach
                        </tbody>

                    </table>
                    @yield('footTable')
                </div>
                {{--
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
                --}}
            </div>
        </div>
        @yield('box')
    </div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/datetable/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/jquery.mark.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/datatables.mark.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetable/buttons.colVis.min.js') }}"></script>


<script type="text/javascript">


$('.dateTable').DataTable( {
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },
    dom: 'Bfrtip',
    buttons: [
    {
        extend: 'print',
        title: 'Stock',
        text: 'Copiar',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'excel',
        title: 'Stock',
        exportOptions: {
            columns: ':visible'
        }
    },
    {
        extend: 'pdfHtml5',
        title: 'Stock',
        exportOptions: {
            columns: ':visible'
        }
    },

    'colvis'
    ],
    columnDefs: [{
    targets: -1,
    visible: false
    }]

});

</script>

@endsection
