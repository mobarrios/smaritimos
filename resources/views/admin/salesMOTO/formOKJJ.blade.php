@extends('template.model_form')

@section('form_title')
    Nueva Venta
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif

    {!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}

    <div class="col-xs-12">
        <h2 class="text-center"><span>Venta </span> <strong class="text-blue">
                # {{ (  isset($models) ? $models->id : '')}} </strong></h2>
    </div>

    <div class="col-xs-2  form-group">
        {!! Form::label('Fecha Pactada') !!}
        {!! Form::text('date_confirm', null, ['class'=>'datePicker form-control']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Cliente') !!}

        @if(isset($models))
            <input type="text" disabled value="{{$models->Clients->fullName}}" class="form-control">
        @else

            <select id="clients_id" name="clients_id" class="select2 form-control ">
                @foreach($clients  as $client)
                    <option value="{{$client->id}}">
                        {{$client->fullName}}
                        |<strong> {{$client->email}}</strong>
                        | {{$client->dni}}
                    </option>
                @endforeach
            </select>

        @endif
    </div>

    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
        <a href="{{route("moto.clients.create")}}" target="_blank" class="btn btn-default"><span
                    class="fa fa-plus"></span></a>
    </div>

    <div class="col-xs-2 form-group">

        {!! Form::label('Presupuestos ') !!}
        @if(isset($models))
            <input  type="text" disabled value=" # {{$models->budgets_id}}" class="form-control">
        @else
            <select id="budgets_id" name="budgets_id" class="form-control select2">
            </select>


        @endif
    </div>

    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
        <button type="button" id="show_budget" class="btn btn-default"><span class="fa fa-eye"></span></button>
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Sucursal de Entrega') !!}
        {!! Form::select('branches_confirm_id',$branches ,null, ['class'=>' form-control select2','placeholder'=>'Seleccionar...']) !!}
    </div>

    <div class="col-xs-2 form-group">
        {!! Form::label('Tipo de Operación') !!}
        {!! Form::select('type',['Reserva'=>'Reserva', 'Venta' => 'Venta'], null, ['class'=>' form-control select2']) !!}
    </div>

    <div class="col-xs-1 form-group" style="padding-top: 1.5%">
        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
    </div>



    {!! Form::close() !!}


    <div class="col-xs-12 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Artículos

                <div class="pull-right">
                    @if(isset($models))
                        <a href="#" id="agregarItem" data-action="{!! route("moto.sales.addItems") !!}"
                           class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>
                    @endif
                </div>

            </div>

            <div class="panel-body">
                @if(isset($models))

                    <table class="table table-bordered table-striped">
                        <thead>
                        <th>Cod.</th>

                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>N Motor</th>
                        <th>N Cuadro</th>
                        <th>Importe Articulo</th>
                        <th>Patentamiento</th>
                        <th>Pack Service</th>
                        <th colspan="2" class="text-left">S. Total</th>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                        @foreach($models->SalesItems as $item)

                            <tr>
                                <td>{{$item->items_id}}</td>

                                <td>{{$item->Items->Models->Brands->name}}</td>
                                <td>
                                    <a href="{{route('moto.items.edit',$item->Items->id)}}">{{$item->Items->Models->name}}</a>
                                </td>
                                <td>{{$item->Items->Colors->name}}</td>
                                <td>{{$item->Items->n_motor}}</td>
                                <td>{{$item->Items->n_cuadro}}</td>
                                <td>
                                    $ {{number_format($item->price_actual ,2)}}
                                </td>
                                <td>
                                    $ {{number_format($item->patentamiento ,2)}}
                                </td>
                                <td>
                                    $ {{number_format($item->pack_service ,2)}}
                                </td>
                                <td>
                                    $ {{number_format(($item->price_actual +$item->patentamiento+$item->pack_service),2)}}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-default"
                                       href="{{route('moto.sales.deleteItems',[$item->id,$models->id])}}"><span
                                                class="text-danger fa fa-trash"></span></a>
                                    <a class="btn btn-xs btn-default editItems"
                                       href="{{route('moto.sales.editItems',[$item->id,$models->id])}}" data-id="{!! $item->id !!}"><span
                                                class="text-success fa fa-edit"></span></a>
                                </td>
                            </tr>
                            <?php $total += $item->price_actual + $item->patentamiento + $item->pack_service; ?>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <td colspan="11" align="right">TOTAL ADEUDADO : $ <b
                                    class="text-primary">{{number_format($total,2)}}</b></td>
                        </tfoot>
                    </table>

                @endif

            </div>
        </div>
    </div>

    @if(isset($models))
        <div class="col-xs-12 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formas de Pago
                    <div class="pull-right">
                        @if(isset($models))
                            <a href="#" id="agregarPago" data-action="{!! route("moto.sales.addItems") !!}" class="btn btn-xs btn-primary"><span class="fa fa-plus"></span></a>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
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
                                        <td>{{$payment->Financials->name}}</td>
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

                        <a target="_blank" href="{!! route('moto.'.$section.'.pdf',$models->id) !!}" class="pull-left" title="Exportar PDF">
                    <span class="btn btn-danger">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                        </a>
                        <a target="_blank" href="{!! route('moto.'.$section.'.recibo') !!}" class="pull-left" title="Recibo PDF">
                    <span class="btn btn-success">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                        </a>
                        <a target="_blank" href="{!! route('moto.'.$section.'.factura') !!}" class="pull-left" title="Factura PDF">
                    <span class="btn btn-warning">
                        <i class="fa fa-file-pdf-o"></i>
                    </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endif



@endsection






@section('js')
@if(isset($models))
    <script src="js/aside2.js"></script>
    <script>
        $(".editItems").aside2({
            title: 'EDITAR PRODUCTO',
            routeAjax: "{!! route('moto.'.$section.'.showAside') !!}",
            hidden: {
                sales_id: "{!! $models->id !!}",
                branches_confirm_id: "{!! $models->branches_confirm_id !!}"
            },
            typeForm: "items",
            edit: true
        });

        $("#agregarItem").aside2({
            title: 'AGREGAR PRODUCTO',
            routeAjax: "{!! route('moto.'.$section.'.showAside') !!}",
            route: "{!! route('moto.'.$section.'.addItems',$models->id) !!}",
            hidden: {
                sales_id: "{!! $models->id !!}",
                branches_confirm_id: "{!! $models->branches_confirm_id !!}"
            },
            typeForm: "items"
        });

        $("#agregarPago").aside2({
            title: 'METODOS DE PAGO',
            routeAjax: "{!! route('moto.'.$section.'.showAside') !!}",
            route: "{!! route('moto.'.$section.'.addPayment',$models->id) !!}",
            hidden: {
                sales_id: "{!! $models->id !!}",
                date: "{!! Date('Y-m-d') !!}"
            },
            typeForm: "pays"
        });

    </script>
@endif
    <script>



        $('#clients_id').on('change', function () {
            var id = $(this).val();
            var budgets = $('#budgets_id');

            budgets.html("");

            $.ajax({
                method: 'GET',
                url: 'moto/budgetsByClients/' + id,
                success: function (data) {

                    $.each(data, function (i, y) {
                        budgets.append("<option value=" + y.id + ">#" + y.id + " | " + y.created_at + "</option>")
                    });
                }
            })
        });

        $("#show_budget").on('click', function () {

            var id = $('#budgets_id').val();
            window.open('moto/budgets/pdf/' + id, '_blank');


        });

    </script>
@endsection