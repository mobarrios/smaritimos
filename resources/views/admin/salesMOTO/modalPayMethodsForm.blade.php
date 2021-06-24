@extends('template')
@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Pago</h3>
                </div>

                @if(isset($modelPays))
                    {!! Form::model($modelPays,['route' => 'admin.sales.updatePayment','method' => 'post']) !!}
                    {!! Form::hidden('sales_payments_id', $modelPays->id , ['id'=>'model']) !!}
                @else
                    {!! Form::open(['route' => 'admin.sales.addPayment','method' => 'post']) !!}
                    {!! Form::hidden('sales_id', $salesId) !!}
                @endif



                {!! Form::hidden('date', Date('Y-m-d')) !!}

                <div class="col-xs-4 form-group">
                    {!! Form::label('Monto') !!}
                    {!! Form::number('amount' ,null, ['class'=>' form-control']) !!}
                </div>

                <div class="col-xs-8 form-group">
                    {!! Form::label('Forma de Pago') !!}
                    {!! Form::select('pay_methods_id',$payments ,null, ['class'=> ' select2 form-control','id'=>'payMethods' ,'placeholder'=>'Seleccionar']) !!}
                </div>


                <div id="number" class="hidden col-xs-3 form-group">
                    {!! Form::label('Nro.') !!}
                    {!! Form::text('number', null, ['class'=>' form-control']) !!}
                </div>
                <div id="bank" class="hidden col-xs-3 form-group">
                    {!! Form::label('Banco') !!}
                    {!! Form::select('banks_id', $banks,null,  ['class'=>' form-control']) !!}
                </div>

                <div id="cheques" class="hidden">
                    <div class="col-xs-3 form-group">
                        {!! Form::label('Fecha Cheque') !!}
                        {!! Form::text('check_date', null, ['class'=>'datePicker form-control']) !!}
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('Fecha Cobro') !!}
                        {!! Form::text('check_pay_date', null, ['class'=>'datePicker form-control']) !!}
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('Tipo') !!}
                        {!! Form::select('check_types_id', $checkTypes, null,['class'=>' form-control']) !!}
                    </div>
                </div>

                <div id="plazo" class="hidden col-xs-4 form-group">
                    {!! Form::label('Plazo') !!}
                    {!! Form::text('term', null, ['class'=>' form-control']) !!}
                </div>

                <div id="depositos" class="hidden">
                    <div class="col-xs-4 form-group">
                        {!! Form::label('Fecha Transferencia') !!}
                        {!! Form::text('transf_date', null, ['class'=>'datePicker form-control']) !!}
                    </div>
                </div>

                <div id="creditos" class="hidden">

                    <div class="col-xs-4 form-group">
                        {!! Form::label('Financiera') !!}
                        {!! Form::select('financials_id', $financials,null, ['class'=>' form-control']) !!}
                    </div>

                </div>


                <div class="box-footer clearfix">
                    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
                        <button type="submit" class="btn btn-default">Agregar</button>
                        <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}"
                           class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="js/asideModelsColors.js"></script>

    <script>


        if ($('#model').length){
            show({!! $modelPays->pay_methods_id  or ''!!});
        }


        $('#payMethods').on('change', function () {
            var id = $(this).val();

            show(id);
        });

        function show(id) {

            if (id == 1) {
                $('#cheques').addClass('hidden');
                $('#tarjetas').addClass('hidden');
                $('#depositos').addClass('hidden');
                $('#creditos').addClass('hidden');
                $('#number').addClass('hidden');
                $('#bank').addClass('hidden');
                $('#plazo').addClass('hidden');

                $("#cheques input").prop('disabled',true).attr('disabled',true);
                $("#cheques select").prop('disabled',true).attr('disabled',true);

                $("#depositos input").prop('disabled',true).attr('disabled',true);

                $("#creditos select").prop('disabled',true).attr('disabled',true);

                $("#number input").prop('disabled',true).attr('disabled',true);

                $("#bank select").prop('disabled',true).attr('disabled',true);

                $("#plazo input").prop('disabled',true).attr('disabled',true);
            }
            if (id == 2) {
                $('#number').removeClass('hidden');
                $('#bank').removeClass('hidden');
                $('#cheques').removeClass('hidden');

                $('#plazo').addClass('hidden');
                $('#tarjetas').addClass('hidden');
                $('#depositos').addClass('hidden');
                $('#creditos').addClass('hidden');


                $("#cheques input").prop('disabled',false).attr('disabled',false);
                $("#cheques select").prop('disabled',false).attr('disabled',false);

                $("#depositos input").prop('disabled',true).attr('disabled',true);

                $("#creditos select").prop('disabled',true).attr('disabled',true);

                $("#number input").prop('disabled',false).attr('disabled',false);

                $("#bank select").prop('disabled',false).attr('disabled',false);

                $("#plazo input").prop('disabled',true).attr('disabled',true);


            }
            if (id == 3 || id == 4) {

                $('#tarjetas').removeClass('hidden');
                $('#number').removeClass('hidden');
                $('#bank').removeClass('hidden');
                $('#plazo').removeClass('hidden');


                $('#cheques').addClass('hidden');
                $('#depositos').addClass('hidden');
                $('#creditos').addClass('hidden');


                $("#cheques input").prop('disabled',true).attr('disabled',true);
                $("#cheques select").prop('disabled',true).attr('disabled',true);

                $("#depositos input").prop('disabled',true).attr('disabled',true);

                $("#creditos select").prop('disabled',true).attr('disabled',true);

                $("#number input").prop('disabled',false).attr('disabled',false);

                $("#bank select").prop('disabled',false).attr('disabled',false);

                $("#plazo input").prop('disabled',false).attr('disabled',false);


            }
            if (id == 5 || id == 6) {

                $('#depositos').removeClass('hidden');
                $('#bank').removeClass('hidden');
                $('#number').removeClass('hidden');

                $('#plazo').addClass('hidden');
                $('#cheques').addClass('hidden');
                $('#tarjetas').addClass('hidden');
                $('#creditos').addClass('hidden');

                $("#cheques input").prop('disabled',true).attr('disabled',true);
                $("#cheques select").prop('disabled',true).attr('disabled',true);

                $("#depositos input").prop('disabled',false).attr('disabled',false);

                $("#creditos select").prop('disabled',true).attr('disabled',true);

                $("#number input").prop('disabled',false).attr('disabled',false);

                $("#bank select").prop('disabled',false).attr('disabled',false);

                $("#plazo input").prop('disabled',true).attr('disabled',true);
            }
            if (id == 7) {
                $('#creditos').removeClass('hidden');
                ;
                $('#bank').addClass('hidden');
                $('#number').removeClass('hidden');
                $('#plazo').removeClass('hidden');


                $('#cheques').addClass('hidden');
                $('#tarjetas').addClass('hidden');
                $('#depositos').addClass('hidden');

                $("#cheques input").prop('disabled',true).attr('disabled',true);
                $("#cheques select").prop('disabled',true).attr('disabled',true);

                $("#depositos input").prop('disabled',true).attr('disabled',true);

                $("#creditos select").prop('disabled',false).attr('disabled',false);

                $("#number input").prop('disabled',false).attr('disabled',false);

                $("#bank select").prop('disabled',true).attr('disabled',true);

                $("#plazo input").prop('disabled',false).attr('disabled',false);
            }

        }
        ;

    </script>

@endsection
