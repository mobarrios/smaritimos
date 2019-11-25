@extends('template.model_index')
@section('table')
    @foreach($models as $model)
        <tr>
            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{!! $model->date !!}</td>
            <td>{!! $model->typesSmallBoxes->name !!}</td>
            <td>{!! $model->detail !!}</td>
            <td><b>${!! $model->amount !!}</b></td>
            <td><span class="label label-lg label-warning">{!!  $model->Brancheables->first()->Branches->name  !!}</span></td>
        </tr>
    @endforeach
    @if(isset($cashFromSales))
        @foreach($cashFromSales as $cash)
            @if($cash->status == 1)
                <tr>
                    <td style="width: 1%"><input class="id_destroy" value="{{$cash->id}}" type="checkbox"></td>
                    <td>{!! $cash->date !!}</td>
                    <td>{{$cash->PayMethods->name}}</td>
                    <td><a href="{{route('moto.sales.edit',$cash->sales_id)}}"> Venta # {{$cash->sales_id}}</a></td>
                    <td><b>${!! $cash->amount !!}</b></td>
                    <td><span class="label label-lg label-warning">{!! $cash->Brancheables->first()->Branches->name  !!}</span></td>

                </tr>
            @endif
        @endforeach
    @endif


@endsection

@section('js')

    <script>
        $(document).ready(function(){
            $('#btn-nuevo').attr('href',"{!! route('moto.smallBoxes.create', $entry) !!}")

            $('#btn-destroy').attr('href',"{!! route('moto.smallBoxes.destroy', $entry) !!}")

            $('#edit_btn').attr('route_edit',"{!! route('moto.smallBoxes.edit', $entry) !!}")
        })
    </script>


@endsection
