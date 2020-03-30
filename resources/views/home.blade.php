@extends('template')

@section('sectionContent')
    <div class="row">



        <!-- Default box -->
        <div class="col-xs-12 col-sm-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{!! Auth::user()->images ? Auth::user()->images->path : "vendors/LTE/dist/img/avatar5.png"!!}" alt="User profile picture">

                    <h3 class="profile-username text-center"><a href="{!! route('admin.profiles.index') !!}">{{\Illuminate\Support\Facades\Auth::user()->fullName}}</a></h3>

                    <p class="text-center ">
                        <span class="text-muted">Perfil : </span>

                    @foreach(\Illuminate\Support\Facades\Auth::user()->Roles as $rol)
                            <label class=" label label-primary"> {{$rol->slug}}</label>
                        @endforeach
                    </p>
                    <span >
                        <span class="text-muted">Depositos Asociados : </span>
                      @foreach(\Illuminate\Support\Facades\Auth::user()->brancheables as $branch)
                        <label class=" label label-default">{{$branch->branches->name}}</label>
                      @endforeach
                    </span>

                </div>

            </div>
        </div>

        <div class="col-sm-8 col-xs-12">
            <!-- small box -->
            
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">                      
                        <i class="ion ion-android-calendar"></i> <strong>Proximos Vencimientos</strong></h3>

                                        <a  href="{{route('admin.items.sendMail')}}" class=" pull-right btn btn-xs btn-default"><span class="fa fa-envelope"></span> Enviar Mail  </a>

                </div>
                <div class="box-body">
                <table class="table table-stripped ">
                    <thead>
                        <th class="col-xs-1" >
                            #
                        </th>
                        <th class="col-xs-10" >
                            Articulo
                        </th>
                         <th class="col-xs-1" >
                            Fecha vto.
                        </th>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            @if($item->isVencido)
                                <tr>
                                    <td >{{$item->id}}</td>
                                    <td><a href="{{route('admin.items.edit',$item->id)}}"><strong>{{$item->Models->Brands->name}}</strong>  {{$item->Models->name}}</a></td>
                                    <td>{{$item->f_vencimiento}}</td>
                                    <td><label class="label label-default">{{ config('status.items.' . $item->status) }}</label></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    
                </table>
                </div>
                
            </div>
       </div>

        <div class="col-sm-8 col-xs-12">
            <!-- small box -->
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">                      
                        <i class="ion ion-android-calendar"></i> <strong>Articulos Vencidos</strong></h3>
                </div>
                <div class="box-body">
                <table class="table table-stripped ">
                    <thead>
                        <th class="col-xs-1">
                            #
                        </th>
                        <th class="col-xs-10">
                            Articulo
                        </th>
                         <th class="col-xs-1">
                            Fecha vto.
                        </th>
                    </thead>
                    <tbody>
                        @foreach($anteriores as $ant)
                                <tr>
                                    <td>{{$ant->id}}</td>
                                    <td><a href="{{route('admin.items.edit',$ant->id)}}"><strong>{{$ant->Models->Brands->name}}</strong>  {{$ant->Models->name}}</a></td>
                                    <td>{{$ant->f_vencimiento}}</td>
                                    <td><label class="label label-default">{{ config('status.items.' . $ant->status) }}</label></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
       </div>

       <div class=" col-md-offset-3 col-sm-8 col-xs-12">
            <!-- small box -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">                      
                        <i class="ion ion-android-calendar"></i> <strong>Articulos En Trámite</strong></h3>
                </div>
                <div class="box-body">
                <table class="table table-stripped ">
                    <thead>
                        <th class="col-xs-1">
                            #
                        </th>
                        <th class="col-xs-10">
                            Articulo
                        </th>
                         <th class="col-xs-1">
                            Fecha vto.
                        </th>
                    </thead>
                    <tbody>
                        @foreach($enTramite as $tr)
                                <tr>
                                    <td>{{$tr->id}}</td>
                                    <td><a href="{{route('admin.items.edit',$tr->id)}}"><strong>{{$tr->Models->Brands->name}}</strong>  {{$tr->Models->name}}</a></td>
                                    <td>{{$tr->f_vencimiento}}</td>
                                    <td><label class="label label-default">{{ config('status.items.' . $tr->status) }}</label></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
       </div>

       {{--  <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red-active">
                <div class="inner">
                    <h3>{{\App\Entities\Admin\Sales::all()->count()}}</h3>
                    <p>Ventas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admin.sales.create')}}" class="small-box-footer">Nueva Venta <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}

        {{-- <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-orange ">
                <div class="inner">
                    <h3>{{\App\Entities\Admin\Models::all()->count()}}</h3>
                    <p>Lista de Precios</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{route('admin.models.index')}}" class="small-box-footer">ir a Lista  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> --}}


    </div>
@endsection
