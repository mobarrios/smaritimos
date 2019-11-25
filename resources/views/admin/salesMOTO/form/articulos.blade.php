    <div class="pull-right">
        @if(isset($models))
            <a href="{{route('admin.sales.addItems', $models->id )}}"
               class="btn btn-sm btn-default"><span class="fa fa-plus"></span> Agregar Artículo</a>
        @endif
    </div>


    @if(isset($models))

        <table class="table table-striped">
            <thead>
            <th>Cod.</th>
            <th>Detalle</th>
            <th colspan="2" class="text-left">S. Total</th>
            </thead>
            <tbody>


            @foreach($models->SalesItems as $item)

                <tr>
                    <td>{{$item->items_id}}</td>
                    <td>

                        {{$item->Items->Models->Brands->name}}

                        <a href="{{route('admin.items.edit',$item->Items->id)}}">{{$item->Items->Models->name}}</a>

                        | {{$item->Items->Colors->name}} <br>

                        @if($item->Items->types_id == 1)
                            <span class="text-muted"> Motor : </span> {{$item->Items->n_motor}}<br>
                            <span class="text-muted"> Motor : </span> {{$item->Items->n_cuadro}}<br>
                        @else
                            <span class="text-muted"> Talle : </span> {{$item->Items->talle}}<br>

                        @endif
                        <span class="pull-right label label-xs label-success">{{$item->Items->Branches}}</span>
                    </td>
                    <td>
                        @if(!is_null($item->sales->budgtes))
                            $ {{ $item->sales->budgets ? number_format($item->sales->budgets->allItems->where('id',$item->items->models_id)->first()->pivot->price_budget ,2) : number_format($item->price_actual ,2)}}
                        @else
                            {{number_format($item->price_actual ,2)}}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-xs btn-default"
                           href="{{route('admin.sales.deleteItems',[$item->id,$models->id])}}"><span
                                    class="text-danger fa fa-trash"></span></a>
                        <a class="btn btn-xs btn-default"
                           href="{{route('admin.sales.editItems',[$item->id,$models->id,])}}"
                           data-id="{!! $item->id !!}"><span
                                    class="text-success fa fa-edit"></span></a>
                    </td>
                </tr>

                @if(!is_null($item->sales->budgtes))
                    <?php $total += $item->sales->budgets ? $item->sales->budgets->allItems->where('id', $item->items->models_id)->first()->pivot->price_budget : $item->price_actual; ?>
                @else
                    <?php $total += $item->price_actual ?>
                @endif
            @endforeach
            </tbody>
        </table>

    @endif


        {{--<div class="box-header with-border">--}}
        {{--<h3 class="box-title"> Adicionales</h3>--}}
        {{--<div class="pull-right">--}}
        {{--@if(isset($models))--}}
        {{--<a href="{{route('admin.sales.addItems', $models->id )}}"--}}
        {{--class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}


    @if(isset($models))

        @include('admin.partials.additionals')


        <table class="table table-striped">
            {{--<thead>--}}
            {{--<th>Detalle</th>--}}
            {{--<th colspan="2" class="text-left">S. Total</th>--}}
            {{--</thead>--}}

            <tfoot>
            <td colspan="11" align="right">TOTAL ADEUDADO : $ <b
                        class="text-primary totalAdeudado"
                        data-precio="{!! $total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount) !!}">{{number_format($total+($models->totalAdditionalsAmount == '0' ? 0 : $models->totalAdditionalsAmount),2)}}</b>
            </td>
            </tfoot>
        </table>

    @endif

