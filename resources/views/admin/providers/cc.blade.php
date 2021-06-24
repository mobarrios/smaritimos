@extends('template')

@section('sectionContent')

        <div class="box box-primary">
            <div class="box-header">{{$models->name}}</div>
            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Detalle</th>

                    <th>Debe</th>
                    <th>Haber</th>
                    </thead>
                    <tbody>
                    <?php
                    $debe = 0;
                    $haber = 0;
                    ?>
                        @foreach($models->PurchasesOrders as $purchase)
                            <tr>
                                <td>{{$purchase->date}}</td>
                                <td>Deuda</td>
                                <td><a href=" {{route('admin.purchasesOrders.edit',$purchase->id)}}"> Pedido de Mercadería # {{$purchase->id}} </a></td>
                                <td></td>

                                @foreach($purchase->PurchasesOrdersItems as $item)
                                        <?php $debe = $debe + ($item->quantity * $item->price) ?>
                                @endforeach
                                <td class="text-danger">$ {{$debe}}</td>
                                <td></td>
                            </tr>
                            @if(!is_null($purchase->charges))
                                @foreach($purchase->charges as $charge)
                                    <tr>
                                        <td>{{$charge->date}}</td>
                                        <td>Pago</td>
                                        <td><a href=" {{route('admin.purchasesOrders.edit',$purchase->id)}}">Pedido de Mercadería #{{$purchase->id}}</a> </td>
                                        <td>{{$charge->payMethods->name}}</td>
                                        <td></td>
                                        <td class="text-success">$ {{$charge->amount}} </td>
                                        <?php $haber =  $haber + $charge->amount ?>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach

                    </tbody>
                    <tfoot>
                        <td colspan="5">Total</td>
                        <td >$ {{  $haber - $debe}} </td>

                    </tfoot>
                </table>
            </div>

        </div>

@endsection