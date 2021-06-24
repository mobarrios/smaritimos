@extends('template')

@section('sectionContent')

    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Pedido de Mercaderia</h3>
                </div>
                @if(isset($models) && $models->status == 3)
                    @include('admin.purchasesOrders.detail')
                @else
                    <div class="box-body">

                        @if(isset($models))
                            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
                            <h4> Pedido # <strong class="text-blue">{{$models->id}}</strong></h4>
                        @else
                            {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
                        @endif

                        {!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}
                        {!! Form::hidden('branches_id',\Illuminate\Support\Facades\Auth::user()->branches_active_id) !!}


                        <div class="col-xs-3 form-group">
                            {!! Form::label('Fecha') !!}
                            {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
                        </div>

                        <div class="col-xs-3 form-group">
                            {!! Form::label('Proveedor') !!}
                            {!! Form::select('providers_id', $providers, null, ['class'=>'select2 form-control']) !!}
                        </div>
                        <div class="col-xs-3 form-group" style="padding-top: 2%">
                            <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
                            @if(isset($models))
                                <a href="#" data-action="{!! route("admin.purchasesOrders.addItems") !!}"
                                   data-toggle="control-sidebar" class="btn btn-default"><span
                                            class="fa fa-plus"></span></a>
                            @endif
                        </div>

                        {!! Form::close() !!}


                        @if(isset($models))
                            <div class="col-xs-12">
                                <table class="table">
                                    <thead>
                                    <th>Cantidad</th>

                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>$ Lista</th>
                                    <th>% Dto.</th>
                                    {{--<th>Color</th>--}}
                                    <th>S.Total Neto</th>
                                    <th>Total Dto.</th>
                                    <th>S.Total</th>


                                    </thead>
                                    <tbody>
                                    <?php $t = 0;?>
                                    @foreach($models->PurchasesOrdersItems as $item)

                                        <tr>
                                            <td>{{$item->quantity}}</td>

                                            <td>{{$item->Models->Brands->name}}</td>
                                            <td>{{$item->Models->name}}</td>
                                            <td>$ {{number_format($item->price,2)}}</td>
                                            <td>% {{$item->discount}}</td>
                                            {{--<td>{{$item->colors->name}}</td>--}}
                                            <td>$ {{number_format($item->quantity * $item->price, 2)  }}</td>
                                            <td>
                                                $ {{number_format(((($item->quantity * $item->price) * $item->discount)/100),2 )}}</td>
                                            <td class="text-danger">
                                                $ {{number_format(($item->quantity * $item->price)  - ((($item->quantity * $item->price) * $item->discount)/100),2) }}</td>
                                            <?php $t += ($item->quantity * $item->price) - ((($item->quantity * $item->price) * $item->discount) / 100);?>

                                            <td>
                                                <a class="btn btn-xs btn-default"
                                                   href="{{route('admin.purchasesOrders.deleteItems',[$item->id,$models->id])}}"><span
                                                            class="text-danger fa fa-trash"></span></a>
                                                <a class="btn btn-xs btn-default"
                                                   href="{{route('admin.purchasesOrders.editItems',[$item->id,$models->id])}}"><span
                                                            class="text-success fa fa-edit"></span></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="col-xs-11">
                                    <span class="pull-right">Total : <strong
                                                class="text-danger">$ {{number_format($t,2)}}</strong></span>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="box-footer clearfix">
                        @if(isset($models))
                            @if($models->status != 2 )
                                <a href="{{route('admin.purchasesOrders.sendToProviders',$models->id)}}" type="button"
                                   class="btn btn-default">Enviar</a>

                                <a href="{{route('admin.purchasesOrders.confirm',$models->id)}}" type="button"
                                   class="btn btn-default">Confirmar</a>

                            @elseif($models->status == 2)
                                <a href="{{route('admin.purchasesOrders.confirm',$models->id)}}" type="button"
                                   class="btn btn-default">Confirmar</a>
                            @endif
                            <span class="pull-right">Pedido por : <strong
                                        class="text"> {{$models->Users->fullName}}</strong>
                            |
                        <b class="text-muted">{{$models->created_at}}</b>
                        </span>

                        @endif
                    </div>
                    {!! Form::close() !!}
            </div>
            @endif
        </div>
    </div>
    @endsection

    @section('formAside')
    @include('admin.partials.asideOpenForm')
    @if(isset($models))

            <!-- .control-sidebar-menu -->

    @if(isset($modelItems))
        {!! Form::model($modelItems,['route'=> ['admin.purchasesOrders.updateItems', $modelItems->id,$models->id], 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> ['admin.purchasesOrders.addItems' ], 'files' =>'true']) !!}
    @endif

    {!! Form::hidden('purchases_orders_id',$models->id) !!}

    <!-- <div class="col-xs-12 form-group">
        {!! Form::label('Tipo') !!}
        {!! Form::select('types_id', config('models.models.types'), null, ['class'=>'form-control select2']) !!}
    </div> -->

    <div class="col-xs-12 form-group">
        {!! Form::label('Modelo') !!}
        {!! Form::select('models_id', $models->Providers->ModelsByProviders, null, ['class'=>'form-control select2']) !!}
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('Precio') !!}
        {!! Form::text('price', null, ['class'=>'form-control' , 'id' => 'actualPrice']) !!}
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('Cantidad') !!}
        {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('Descuento') !!}
        {!! Form::text('discount', null, ['class'=>'form-control']) !!}
    </div>
    {{--<div class="col-xs-12 form-group">--}}
        {{--{!! Form::label('Color') !!}--}}
        {{--{!! Form::select('colors_id', $colors, null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}
    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
    </div>
    {!! Form::close() !!}
            <!-- /.control-sidebar-menu -->
    @endif
    @include('admin.partials.asideCloseForm')


@endsection

@section('js')
    <script>

        $("select[name='models_id']").on('change', function (ev) {

            $("#select_model>option").remove();

            var id = $(this).val();

            var parent = $(this).parent().parent();

            $.ajax({
                method: 'GET',
                url: 'admin/modelActualCost/' + id,

                success: function (data) {
                    $('#actualPrice').val(data.price_list);
                }
            })
        });

    </script>
@endsection