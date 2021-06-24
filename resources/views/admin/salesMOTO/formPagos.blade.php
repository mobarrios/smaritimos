<div class="col-xs-12 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Formas de Pago
            <div class="pull-right">
                @if(isset($models))
                    <a href="#" id="agregarPago" data-action="{!! route("admin.sales.addItems") !!}" class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>
                @endif
            </div>
        </div>

        <div class="panel-body">
            {{--@if(isset($models))--}}
                {{--{!! Form::model($models,['route'=> ['admin.sales.addPayment', $models->id] , 'files' =>'true']) !!}--}}
                {{--{!! Form::hidden('sales_id',$models->id) !!}--}}
                {{--{!! Form::hidden('date', Date('Y-m-d')) !!}--}}

            {{--@else--}}
                {{--{!! Form::open(['route'=> 'admin.sales.editPayment' , 'files' =>'true']) !!}--}}
            {{--@endif--}}

            {{--<div class="col-xs-2 form-group">--}}
                {{--{!! Form::label('Monto') !!}--}}
                {{--{!! Form::number('amount' ,null, ['class'=>' form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="col-xs-4 form-group">--}}
                {{--{!! Form::label('Forma de Pago') !!}--}}

                {{--{!! Form::select('financials_id',$financials ,null, ['class'=> 'select2 form-control']) !!}--}}

            {{--</div>--}}
            {{--<div class="col-xs-3 form-group">--}}
                {{--{!! Form::label('Nro . Tarjeta') !!}--}}
                {{--{!! Form::text('ccn', null, ['class'=>' form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="col-xs-1 form-group">--}}
                {{--{!! Form::label('Cod. Seg.') !!}--}}
                {{--{!! Form::text('ccc', null, ['class'=>' form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="col-xs-1 form-group">--}}
                {{--{!! Form::label('Vto.') !!}--}}
                {{--{!! Form::text('cce', null, ['class'=>' form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="col-xs-1 form-group" style="padding-top: 1.5%">--}}
                {{--<button type="submit" class="btn btn-default"><span--}}
                            {{--class="fa fa-plus"></span></button>--}}
            {{--</div>--}}


            {{--{!! Form::close() !!}--}}


            <div class="col-xs-12">
                <table class="table table-bordered">
                    <thead>
                         <th>#</th>
                        <th>Fecha</th>
                        <th>Forma de Pago</th>
                        <th> $ Monto</th>
                    </thead>
                    <tbody>
                    <?php $pago = 0 ?>
                    @if(isset($models->SalesPayments))

                        @foreach($models->SalesPayments as $payment)
                            <tr>
                                <td>{{$payment->id}}</td>
                                <td>{{$payment->date}}</td>
                                <td>{{$payment->PayMethods->name}}</td>
                                <td> $ {{number_format($payment->amount, 2)}}</td>
                                <?php  $pago += $payment->amount ;?>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                        <tfoot>
                             <td colspan="4" align="right">TOTAL ABONADO :  <b class="text-success"> $ {{number_format($pago,2)}}</b> </td>
                        </tfoot>
                </table>

                <h5 class="pull-right">TOTAL A PAGAR :  <b class="text-danger"> $ {{number_format(($total - $pago),2)}}</b>
                </h5>

                <a target="_blank" href="{!! route('admin.'.$section.'.pdf',$models->id) !!}" class="pull-left" title="Exportar PDF">
                    <span class="btn btn-danger">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                </a>
                <a target="_blank" href="{!! route('admin.'.$section.'.recibo') !!}" class="pull-left" title="Recibo PDF">
                    <span class="btn btn-success">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                </a>
                <a target="_blank" href="{!! route('admin.'.$section.'.factura') !!}" class="pull-left" title="Factura PDF">
                    <span class="btn btn-warning">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                </a>
            </div>

        </div>

    </div>
</div>