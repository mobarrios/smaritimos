<div class="box-body">
    <div class="col-xs-12">
        <h1> Pedido # <strong class="text-blue">{{$models->id}}</strong></h1>
    </div>
    <div class="col-xs-4">
        <p>Fecha : <strong>{{$models->date}}</strong></p>
        <p>Proveedor : <strong>{{$models->Providers->name}}</strong></p>
        <p>Sucursal : <strong>{{$models->Branches->name}}</strong></p>
        <p>Usuario : <strong>{{$models->Users->fullName}}</strong></p>
        <p>Actualización : <strong>{{$models->updated_at}}</strong></p>
    </div>

    <div class="col-xs-8">
        <table class="table">
            <thead>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>$ Lista</th>
            <th>% Dto.</th>
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
                    <td>$ {{number_format($item->quantity * $item->price, 2)  }}</td>
                    <td>
                        $ {{number_format(((($item->quantity * $item->price) * $item->discount)/100),2 )}}</td>
                    <td class="text-danger">
                        $ {{number_format(($item->quantity * $item->price)  - ((($item->quantity * $item->price) * $item->discount)/100),2) }}</td>
                    <?php $t += ($item->quantity * $item->price) - ((($item->quantity * $item->price) * $item->discount) / 100);?>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-xs-12">
             <span class="pull-right"><h4>Total : <strong
                             class="text-danger">$ {{number_format($t,2)}}</strong></h4></span>
        </div>
    </div>

</div>


<div class="col-xs-7 content">
    <div class=" box box-primary">
        <div class="box-header">
            Formas de Pago
        </div>

        <div class="box-body">
            @if(isset($models))
                {!! Form::model($models,['route'=> ['admin.purchasesOrders.addPayment', $models->id] , 'files' =>'true']) !!}
                {!! Form::hidden('purchases_orders_id',$models->id) !!}
                {!! Form::hidden('date', Date('Y-m-d')) !!}

            @else
                {!! Form::open(['route'=> 'admin.purchasesOrders.editPayment' , 'files' =>'true']) !!}
            @endif

            <div class="col-xs-3 form-group">
                {!! Form::label('Fecha') !!}
                {!! Form::text('date', null, ['class'=>'datePicker form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
                {!! Form::label('Monto') !!}
                {!! Form::number('amount' ,null, ['class'=>' form-control']) !!}
            </div>

            <div class="col-xs-4 form-group">
                {!! Form::label('Medio de Pago') !!}

                {!! Form::select('pay_methods_id',$pay_methods ,null, ['class'=> 'select2 form-control pay_methods']) !!}

            </div>

            <div id="cheques_form" hidden>
                <div class="col-xs-2 form-group">
                    {!! Form::label('Fecha Cobro') !!}
                    {!! Form::text('fecha_cobro', null, ['class'=>'datePicker form-control']) !!}
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('Nro . Cheque') !!}
                    {!! Form::text('nro_cheque', null, ['class'=>' form-control']) !!}
                </div>
                <div class="col-xs-2 form-group">
                    {!! Form::label('Banco') !!}
                    {!! Form::select('bancos_id', [1=> 'Banco Nacion' , 2 => 'Banco Frances'], null, ['class'=>' form-control  ']) !!}
                </div>
                <div class="col-xs-3 form-group">
                    {!! Form::label('Tipo ') !!}
                    {!! Form::text('tipos_cheque', null, ['class'=>' form-control']) !!}
                </div>
            </div>

            <div id="deposito_form" hidden>
                <div class="col-xs-9 form-group">
                    {!! Form::label('Nro . Cta.') !!}
                    {!! Form::text('nro_cta', null, ['class'=>' form-control']) !!}
                </div>
                <div class="col-xs-2 form-group">
                    {!! Form::label('Banco') !!}
                    {!! Form::select('bancos_id',  [1=> 'Banco Nacion' , 2 => 'Banco Frances'], null, ['class'=>'form-control  ']) !!}
                </div>

            </div>


            <div class="col-xs-1 form-group" style="padding-top: 1.5%">
                <button type="submit" class="btn btn-default"><span
                            class="fa fa-plus"></span></button>
            </div>


            {!! Form::close() !!}


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

                    @if(isset($models->charges))

                        @foreach($models->charges as $payment)
                            <tr>
                                <td>{{$payment->id}}</td>
                                <td>{{$payment->date}}</td>
                                <td>{{$payment->payMethods->name}}</td>
                                <td> $ {{number_format($payment->amount, 2)}}</td>
                                <?php  $pago += $payment->amount;?>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <td colspan="4" align="right">TOTAL ABONADO : <b class="text-success">
                            $ {{number_format($pago,2)}}</b></td>
                    </tfoot>
                </table>

                <h5 class="pull-right">TOTAL A PAGAR : <b class="text-danger">
                        $ {{number_format(($t - $pago),2)}}</b>
                </h5>


            </div>

        </div>

    </div>
</div>

<div class="col-xs-5 content">
    <div class=" box box-primary">
        <div class="box-header with-border">
            <span class="box-title">Remitos</span>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <th>Item Solicitado</th>
                    <th>Remito</th>
                    <th>Item Asignado</th>
                </thead>
                @foreach($models->PurchasesOrdersItems as $items)

                    @foreach($items->DispatchesItems as $dis)
                        <tr>
                            <td> {{$items->Models->name}}</td>
                            <td>
                                @if(!is_null($dis->dispatches_id))
                                    <a href="{{route('admin.dispatches.edit',$dis->dispatches_id)}}" >#{{$dis->Dispatches->number or ''}}</a>
                                @endif
                            </td>
                            <td>
                                @if(!is_null($dis->Items))
                                    <a href="{{route('admin.items.edit',$dis->Items->id)}}"> {{$dis->Items->Models->name or '' }}
                                    : {{$dis->Items->Colors->name or '' }}</a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                @endforeach

            </table>
        </div>

    </div>
</div>

@section('js')
    <script>
        $('.pay_methods').on('change', function () {
            var valor = $(this).val();
            if (valor == 1) {
                $('#cheques_form').hide();
                $('#deposito_form').hide();
            }
            else if (valor == 2) {
                $('#cheques_form').show('hidden');
                $('#deposito_form').hide();

            }
            else if (valor == 3) {
                $('#deposito_form').show();
                $('#cheques_form').hide();

            }


        });
    </script>
@endsection

