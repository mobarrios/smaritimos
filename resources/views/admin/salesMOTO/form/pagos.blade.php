@if(isset($models))
    <a href="{!! route("admin.sales.createPayment", $models->id) !!}" id="agregarPago"
       class="btn btn-sm btn-default"><span class="fa fa-plus"></span> Agregar Pago</a>

    <div class="content">
        <table class="table table-stripped">
            <thead>
            <th></th>
            <th>#</th>
            <th>Fecha</th>
            <th>Forma de Pago</th>
            <th colspan="2"> $ Monto</th>
            <th>Recibo</th>
            </thead>
            <tbody id="tablaPagos">

            @if(isset($models->Payments))
                {!! Form::open(['route'=> config('models.'.$section.'.storeRecibosRoute'),'method' => 'post' , 'id' =>'formRecibos']) !!}
                @foreach($models->Payments as $payment)
                    <tr>
                        <td>
                            @if($payment->status)
                                <input type="checkbox" class="disabled input-red" disabled>
                            @else
                                <input type="checkbox" value="{{$payment->id}}"
                                       name="sales_payments_id[]">
                            @endif
                        </td>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->date}}</td>
                        <td>{{$payment->PayMethods->name}}</td>
                        <td> $ {{number_format($payment->amount, 2)}}</td>
                        <td class="col-xs-1">
                            @if(!$payment->status)
                                <a class="btn btn-xs btn-default"
                                   href="{{route('admin.sales.deletePayment',[$payment->id,$models->id])}}"><span
                                            class="text-danger fa fa-trash"></span></a>
                                <a class="btn btn-xs btn-default"
                                   href="{{route('admin.sales.editPayment',$payment->id )}}"
                                   data-id="{!! $payment->id !!}"><span
                                            class="text-success fa fa-edit"></span></a>
                            @else
                                <span class="label label-success">Pagado <i
                                            class="glyphicon glyphicon-ok-sign"></i></span>

                            @endif
                        </td>
                        <td>
                            @forelse($payment->Vouchers->where('tipo','Remito') as $voucher)
                                #{!! $voucher->numero !!}
                                <div class="btn-group btn-group-xs pull-right">
                                    <a href="{!! route('admin.sales.recibo',$voucher->id) !!}"
                                       target="_blank" class="btn btn-primary"><span
                                                class="fa fa-file-pdf-o"></span></a>

                                    <a class="btn btn-danger"
                                       href="{{route('admin.sales.deleteRecibos',[$voucher->id,$models->id])}}"><span
                                                class="fa fa-trash"></span></a>
                                </div>
                            @empty

                            @endforelse
                        </td>

                        <?php  $pago += $payment->amount;?>
                    </tr>
                @endforeach

                {!! Form::close() !!}
            @endif
            </tbody>
            <tfoot>
            <td colspan="2" align="right">TOTAL ABONADO : <b class="text-success pago" data-pago="{!! $pago !!}">
                    $ {{number_format($pago,2)}}</b>
            </td>
            <td colspan="2" align="right">TOTAL DEUDA : <b class="text-danger " >
                    $ {{number_format($models->Adeudado,2)}}</b>
            </td>
            </tfoot>
        </table>


        <a target="_blank" href="{!! route('admin.'.$section.'.recibo',$models->id) !!}"
           id="generarRecibo"
           class="pull-left btn btn-sm btn-default disabled"
           title="Recibo PDF">
            Generar Recibo
        </a>
    </div>


@endif