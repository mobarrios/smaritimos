@if(isset($models))
<div class="content">

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
                        <a target="_blank" class="btn btn-sm btn-default" href="{{route('admin.sales.factura', $voucher->id)}}"><span class="fa fa-file-o"></span></a>
                    @elseif($voucher->tipo == 'Remito')
                        <a target="_blank" class="btn btn-sm btn-default" href="{{route('admin.sales.pdf', $models->id)}}"><span class="fa fa-file-o"></span></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {{--@if((($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount))  - $pago == 0) && $models->pagado === 1)--}}

    @if($models->Vouchers->count() && $models->pagado == 1)
        <a href="{!! route('configs.vouchers.fromSales',$models->id) !!}" class="btn btn-sm btn-default"
           title="Factura PDF">
            <span>Realizar Comprobante</span>
        </a>

        <a target="_blank" href="{!! route('admin.'.$section.'.pdf',$models->id) !!}"
           class="btn btn-sm btn-default" title="Generar Remito">
            <span>Generar remito</span>
        </a>

    @endif
</div>
@endif