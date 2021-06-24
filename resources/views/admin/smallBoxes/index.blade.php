@extends('template.model_index')
@section('table')

    <?php
        $in = 0;
        $out = 0;
    ?>
    @foreach($models as $model)
        <tr>
            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{!! $model->date !!}</td>
            <td>{!! $model->typesSmallBoxes->name !!}</td>
            <td>{!! $model->detail !!}</td>
            @if($model->entry == 'Entrada')
                <td><b class="text-success">${!!  number_format($model->amount,2) !!}</b></td>
                    <?php $in += $model->amount ?>
                <td></td>
            @else
                <td> </td>
                <td><b class="text-danger">${!! number_format($model->amount ,2)!!}</b></td>
                <?php $out += $model->amount ?>
            @endif

                <td><span class="label label-lg label-warning">{!!  $model->Brancheables->first()->Branches->name  !!}</span></td>

        </tr>
    @endforeach

    @if(isset($cashFromSales))
        @foreach($cashFromSales as $cash)
            {{--@if($cash->status == 1)--}}
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$cash->id}}" type="checkbox"></td>
                <td>{!! $cash->date !!}</td>
                <td>{{$cash->PayMethods->name}}</td>
                <td><a href="{{route('admin.sales.edit',$cash->sales_id)}}"> Venta # {{$cash->sales_id}}</a></td>
                <td><b class="text-success" > ${!! number_format($cash->amount , 2)!!}</b></td>
                <td></td>

                <td><span class="label label-lg label-warning">{!! $cash->Brancheables->first()->Branches->name  !!}</span></td>
                <?php $in += $cash->amount ?>
            </tr>
            {{--@endif--}}
        @endforeach
    @endif


    <tfoot>
        <tr>
           <td  colspan="4" align="center">
                <b>SUB TOTALES</b>
           </td>
           <td>
               <b>$ {{number_format($in,2)}}</b></td>
           <td>
               <b>$ {{number_format($out,2)}}</b>
            </td>
            <td></td>
        </tr>
        <tr>
            <td  colspan="4" align="center">
                <b>TOTALES</b>
            </td>
            <td>
                <b>$ {{number_format(($in - $out ),2)}}</b></td>
            <td></td>
            <td></td>

        </tr>
    </tfoot>


@endsection

