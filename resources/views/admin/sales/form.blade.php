@extends('template')

@section('css')
    <style>
        .autocompletedemoCustomTemplate .autocomplete-custom-template li:last-child {
            border-bottom-width: 0;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title,
        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-metadata {
            display: block;
            line-height: 2;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title md-icon {
            height: 18px;
            width: 18px;
        }

        .search {
            color: rgba(0, 0, 0, 0.87);
            background-color: rgb(250, 250, 250);
            padding: 16px;

        }

        .select2-template-title {
            font-size: 12px;
            font-weight: bold;
            display: block;
            width: 100%;
        }

        .select2-template-text {
            font-size: 12px;
            display: block;
            width: 100%;
            padding-left: 5px;
        }

        .select2-template-container {
            border-bottom: 1px solid #ddd;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: rgba(162, 162, 162, 0.21);

        }


    </style>
@endsection

@section('sectionContent')

    <div class="row">
        <div class="{!! !isset($models) ? "col-xs-12" : "col-xs-6" !!}">
            <div class=" box box-solid">
                <div class="box-header bg-gray-light ">
                    <h3 class="box-title">Cliente</h3>
                </div>
                <div class="box-body">

                    @if(isset($models))
                        {!! Form::model($models,['route' => ['admin.sales.update',$models->id],'method' => 'post']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.sales.store','method' => 'post']) !!}
                    @endif

                    <div class="input-group form-group">
                        {!! Form::select('clients_id',$clients,null,['class'=> 'form-control select2','id' => 'search-client']) !!}
                        <span class="input-group-btn">
                                    <a id="search-btn" href="{!! route('admin.prospectos.create') !!}"
                                       class="btn btn-default btn-flat"><i class="fa fa-plus"></i></a>
                                </span>
                    </div>

                    <div class="form-group">
                        <table class="table table-client" @if(!isset($models)) style="display:none" @endif>
                            <tr>
                                <td><span class="text-muted"> Apellido, Nombre</span></td>
                                <td><strong id="nya">{!! isset($models) ? $models->clients->fullName : '' !!}</strong>
                                </td>
                            </tr>

                            <tr>
                                <td><span class="text-muted"> DNI/CUIT/CUIL</span></td>
                                <td><strong id="dni">{!! isset($models) ? $models->clients->dni : '' !!}</strong></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted"> Dirección</span></td>
                                <td>
                                    <strong id="dir">{!! isset($models) ? $models->clients->full_address : 'nada' !!}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-muted"> Mail</span></td>
                                <td><strong id="mail">{!! isset($models) ? $models->clients->email : '' !!}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-flat">Continuar</button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {!! Form::close()!!}

                </div>

            </div>
        </div>

        @if(isset($models))

            <div class="col-xs-6">
                <div class=" box box-solid">
                    <div class="box-header bg-red ">
                        <h3 class="box-title">Resumen</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group ">
                            <table class="table">
                                <tr>
                                    <td><span class="text-muted"> Venta</span></td>
                                    <td><strong>$ {{number_format($models->Total,2)}}</strong></td>
                                </tr>
                                <tr>
                                    <td><span class="text-muted"> Pago</span></td>
                                    <td><strong>$ {{number_format($models->Payments->sum('amount'),2)}}</strong></td>
                                </tr>
                                <tr>
                                    <td><span class="text-muted"> Total</span></td>
                                    <td><strong>$ {{number_format($models->Total-$models->Payments->sum('amount'),2)}}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-12">
                <div class=" box box-solid">
                    <div class="box-header bg-gray-light">
                        <h3 class="box-title">Articulos</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-xs-12  form-group">
                            <table class="table ">
                                <thead>
                                <th>Cant.</th>
                                <th>Cod.</th>
                                <th>Detalle</th>
                                <th>$ Unit</th>
                                <th>$ S.Total</th>
                                <th></th>
                                </thead>
                                <tbody>
                                <?php $total = 0 ?>
                                @foreach($models->SalesItems as $items)
                                    <tr>
                                        <td>{{$items->cant}}</td>
                                        <td>{{$items->Items->id}}</td>
                                        <td>{{$items->Items->Models->Brands->name}} {{$items->Items->Models->name}}
                                            <span class="text-muted">s/n {{$items->Items->serial_number}}</span></td>
                                        <td>$ {{number_format($items->price_actual,2)}}</td>
                                        <td>$ {{number_format($items->price_actual * $items->cant , 2)}}</td>

                                        <td>

                                            <a href="{!! route('admin.sales.editItems',[$items->id,$models->id]) !!}"
                                               class="btn btn-default btn-xs"><i
                                                        class="fa fa-edit text-success"></i></a>

                                            <a href="{!! route("admin.sales.deleteItems",[$items->id,$models->id]) !!}"
                                               class="btn btn-default btn-xs"><i
                                                        class="fa fa-trash text-danger"></i></a>

                                        </td>

                                        <?php $total += $items->cant * $items->price_actual ?>

                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4"><strong>Total</strong></td>
                                    <td colspan="2"><strong class="text-danger"> $ {{number_format($total,2)}}</strong>
                                    </td>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! route('admin.sales.addItems',$models->id) !!}" class="btn btn-default btn-sm "><i
                                    class="fa fa-plus"></i> Artículos</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class=" box box-solid">
                    <div class="box-header bg-gray-light ">
                        <h3 class="box-title">Financiamientos</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group ">
                            <table class="table">
                                <thead>
                                <th>Fianciación</th>
                                <th>Periodo</th>
                                <th>$ total</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($models->FinancialsDues as $financial)
                                    <tr>
                                        <td>{{$financial->Financials->name}}</td>
                                        <td>{{$financial->due}} cuotas de $ {{$financial->pivot->amount_dues}}</td>
                                        <td>$ {{number_format($financial->pivot->amount,2)}}</td>
                                        <td></td>
                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! route('admin.sales.createFinancials',$models->id) !!}"
                           class="btn btn-default btn-sm "><i class="fa fa-plus"></i> Financiamientos</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class=" box  box-solid">
                    <div class="box-header bg-green ">
                        <h3 class="box-title ">Pagos</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group ">
                            <table class="table">
                                <thead>
                                <th>Fecha</th>
                                <th>Medio de Pago</th>
                                <th>$ total</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($models->Payments as $payment)
                                    <tr>
                                        <td>{{$payment->date}}</td>
                                        <td>{{$payment->PayMethods->name}} </td>
                                        <td>$ {{number_format($payment->amount,2)}}</td>
                                        <td></td>
                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! route('admin.sales.createPayment',$models->id) !!}"
                           class="btn btn-default btn-sm "><i class="fa fa-plus"></i> Pago</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class=" box  box-solid">
                    <div class="box-header bg-green ">
                        <h3 class="box-title ">Comprobantes</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Comprobante</th>
                                <th>Numero</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models->Vouchers as $voucher)
                                <tr>
                                    <td>{{$voucher->id}}</td>
                                    <td>{{$voucher->fecha}}</td>
                                    <td>{{$voucher->tipo}} : {{$voucher->letra}} </td>
                                    <td>{{$voucher->numero}}</td>
                                    <td>$ {{number_format($voucher->importe_total,2)}}</td>
                                    <td>
                                        @if($voucher->tipo == 'Factura')
                                            <a target="_blank" class="btn btn-sm btn-default"
                                               href="{{route('admin.sales.factura', $voucher->id)}}"><span
                                                        class="fa fa-file-o"></span></a>
                                        @elseif($voucher->tipo == 'Remito')
                                            <a target="_blank" class="btn btn-sm btn-default"
                                               href="{{route('admin.sales.pdf', $models->id)}}"><span
                                                        class="fa fa-file-o"></span></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        {{--@if((($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount))  - $pago == 0) && $models->pagado === 1)--}}

                    </div>
                    <div class="box-footer">
                        <a href="{!! route('configs.vouchers.fromSales',$models->id) !!}" class="btn btn-sm btn-default"
                           title="Factura PDF"><span>Realizar Comprobante</span></a>
                        {{--<a target="_blank" href="{!! route('admin.'.$section.'.pdf',$models->id) !!}"--}}
                           {{--class="btn btn-sm btn-default" title="Generar Remito"><span>Generar remito</span></a>--}}
                    </div>
                </div>
            </div>


            <div class="col-xs-12">
                <div class=" box ">
                    <div class="box-body">
                        <a class="btn btn-sm btn-default" target="_blank"
                           href="{!! route('admin.sales.createBudget',$models->id) !!}"><span
                                    class="fa fa-print"></span> Presupuestar</a>
                        {{--<a class="btn btn-sm btn-default" href="{!! route('admin.sales.createPayment',$models->id) !!}"><span class="fa fa-money"></span> Vender</a>--}}
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection

@section('js')
    <script>
        var searchClient = $('#search-client');

        searchClient.on('change', function (ev) {

            $.ajax({
                url: 'admin/clientsSearch/' + searchClient.val(),
                method: 'get',
                success: function (data) {
                    $('#nya').html(data.fullName);
                    $('#dni').html(data.dni);
                    $('#dir').html(data.dir);
                    $('#mail').html(data.email);


                    $('.table-client').show(300);
                }
            })

        })


    </script>


@endsection
