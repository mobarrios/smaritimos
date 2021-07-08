@extends('template')
@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Financiamientos</h3>
                </div>

                <div class="box-body">
                @if(isset($modelPays))
                    {!! Form::model($modelPays,['route' => 'admin.sales.updateFinancials','method' => 'post']) !!}
                    {!! Form::hidden('sales_payments_id', $modelPays->id , ['id'=>'model']) !!}
                @else
                    {!! Form::open(['route' => 'admin.sales.addFinancials','method' => 'post']) !!}
                    {!! Form::hidden('sales_id', $salesId) !!}
                @endif

                <div class="col-xs-12 form-group" >
                    <h3>Total  <strong>$ {{$sales->Total}}</strong></h3>
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('$ a Financiar') !!}
                    {!! Form::number('amount' ,null, ['class'=>'form-control','id'=>'aFinanciar']) !!}
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('Financiamiento') !!}
                    {!! Form::select('financials_id',$financials ,null, ['class'=> ' select2 form-control','id'=>'payMethods' ,'placeholder'=>'Seleccionar']) !!}
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('Plazo') !!}
                    {!! Form::select('financials_dues_id',[null] ,null, ['class'=> ' select2 form-control','id'=>'dues' ,'placeholder'=>'Seleccionar']) !!}
                </div>
                    {!! Form::hidden('amount_dues',null, ['class'=> 'form-control','id'=>'amountDues' ]) !!}
                </div>

                <div class="box-footer ">
                    <div class="col-xs-12 form-group" >
                        <button type="submit" class="btn  btn-sm btn-default"><span class="fa fa-save"></span> Guardar</button>
                        <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}"
                           class="btn btn-sm  btn-danger">Cancelar</a>
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

        $('#dues').on('change',function(){

           $('#amountDues').val($('option:selected', this).attr('data'));
        });


        function coef(coef , importe, dues)
        {
            res = (coef * importe) / dues;
            return res.toFixed(2);
        }

        function porcent(por, importe, dues)
        {
            res = (parseInt(importe) + ((por * importe)/100) )/ dues;
            return res.toFixed(2);
        }



        $('#payMethods').on('change', function ()
        {
            var id = $(this).val();
            var importe = $('#aFinanciar').val();
            $('#dues').empty();

            $.ajax({
                method: 'GET',
                url: 'admin/findDues/' + id,
                success: function (data)
                {
                    $.each(data ,function (i , item)
                    {
                        if(item.porcent == 0)
                        {
                             $('#dues').append('<option value='+item.id+' data='+coef(item.coef, importe, item.due) +'>'+ item.due +' Coutas de :  $ '+ coef(item.coef, importe, item.due) +'</option>');
                        }
                        else
                        {
                            $('#dues').append('<option value='+item.id+' data='+porcent(item.coef, importe, item.due) +'>'+ item.due +' Coutas de :  $ '+ porcent(item.porcent, importe, item.due) +'</option>');

                        }
""
                    });
                }
            })
        });





    </script>

@endsection
