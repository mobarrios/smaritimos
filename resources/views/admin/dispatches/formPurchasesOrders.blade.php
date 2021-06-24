@extends('template')

@section('sectionContent')

    <div class="box box-default">
        <div class="box header"></div>

        <div class="box-body">

            <table class="table table-bordered">
                <thead>
                <th >#</th>
                <th>Tipo</th>
                <th>Marca Modelo</th>
                <th>Datos</th>
                </thead>
                <tbody>
                @foreach($purchasesOrders as $item)
                    @foreach($item->DispatchesItems as $dispatchesItem)
                        @if(is_null($dispatchesItem->dispatches_id))
                        <tr>
                            <td>
                                <input class='check' type="checkbox"
                                       data-id="{{$dispatchesItem->id}}"
                                       data-models-id="{{$dispatchesItem->PurchasesOrdersItems->Models->id}}"
                                       data-dispatches-id="{{$dispatchesId}}"
                                >
                            </td>
                            <td>{{$dispatchesItem->PurchasesOrdersItems->Models->TypesName}}</td>
                            <td>{{$dispatchesItem->PurchasesOrdersItems->Models->Brands->name}}
                                : {{$dispatchesItem->PurchasesOrdersItems->Models->name}}
                            </td>
                            {{--@if($dispatchesItem->PurchasesOrdersItems->Models->types_id == 1)--}}
                                {{--<td>--}}
                                    {{--<input class="m{{$dispatchesItem->id}}" type="text" placeholder="N Motor">--}}
                                    {{--<input class="c{{$dispatchesItem->id}}" type="text" placeholder="N Cuadro">--}}
                                {{--</td>--}}
                            {{--@elseif($dispatchesItem->PurchasesOrdersItems->Models->types_id == 2)--}}
                                {{--<td>--}}
                                    {{--{!! Form::select('sizes_id',$sizes,null,['class'=>'t'.$dispatchesItem->id.' select2' , 'placeholder'=>'Talle']) !!}--}}
                                {{--</td>--}}
                            {{--@elseif($dispatchesItem->PurchasesOrdersItems->Models->types_id == 3)--}}
                                {{--<td> </td>--}}
                                <td>
                                    {!! Form::text('serial_number',null,['class'=> 'sn'.$dispatchesItem->id.' ', 'placeholder'=>'N Serie']) !!}
                                </td>
                            {{--@endif--}}
                        </tr>
                        @endif
                    @endforeach

                @endforeach
                </tbody>
                <tfoot>
                    <td colspan="5">
                        <button  class="add btn btn-xs">Asignar a Remito</button>
                    </td>
                </tfoot>
            </table>

        </div>

        <div class="box-footer"></div>
    </div>

@endsection

@section('js')
    <script>

        $('.add').on('click', function()
        {
            $('.check:checked').each(function()
            {

                var id = $(this).attr('data-id');
                //var n_motor = $('.m' + id).val();
               // var n_cuadro = $('.c' + id).val();
                //var talle = $('.t' + id ).val();
                var serial = $('.sn' + id ).val();
                var models_id = $(this).attr('data-models-id');
                var dispatches_id = $(this).attr('data-dispatches-id');

                console.log(id , serial , models_id ,  dispatches_id);

                $.get("admin/dispatches/addNew", {
                    ajax: true,
                   // n_motor: n_motor,
                   // n_cuadro: n_cuadro,
                   // talle : talle,
                    serial_number : serial,
                    models_id: models_id,
                    dispatches_id: dispatches_id,
                    dispatches_items_id: id

                });

            });

           window.location.reload();


        });


//        $('.add').on('click', function () {
//
//
//            var id = $(this).attr('data-id');
//            var n_motor = $('.m' + id).val();
//            var n_cuadro = $('.c' + id).val();
//            var talle = $('.t' + id ).val();
//            var serial = $('.sn' + id ).val();
//
//            var models_id = $(this).attr('data-models-id');
//            var colors_id = $(this).attr('data-colors-id');
//
//            var dispatches_id = $(this).attr('data-dispatches-id');
//
//            if (n_motor == '' || n_cuadro == '') {
//                if (!n_motor == "") {
//
//                    //valida nmotor unique
//                    $.get("moto/items/findMotor/" + n_motor)
//                            .then(function (response) {
//                                if (response.data)
//                                    alert('El Nro. de MOTOR ya se encuentra ingresado');
//                            });
//
//                } else {
//                    alert('N Motor Requerido');
//                }
//
//                if (!n_cuadro == "") {
//                    //valida nmotor unique
//                    $.get("moto/items/findCuadro/" + n_cuadro)
//                            .then(function (response) {
//                                if (response.data)
//                                   alert('El Nro. de CUADRO ya se encuentra ingresado');
//                            });
//                }
//                else {
//                    alert('N Cuadro Requerido');
//                }
//            }
//            else {
//
//                $.get("moto/dispatches/addNew", {
//                    ajax: true,
//                    n_motor: n_motor,
//                    n_cuadro: n_cuadro,
//                    talle : talle,
//                    serial_number : serial,
//                    models_id: models_id,
//                    colors_id: colors_id,
//                    dispatches_id: dispatches_id,
//                    dispatches_items_id: id
//                }).success(function (data)
//                {
//                    window.location.href = "moto/dispatches/edit/" + dispatches_id;
//
//                }).error(function(data){
//                    alert('Error Inesperado!');
//                });
//            }
//
//        });
    </script>
@endsection


