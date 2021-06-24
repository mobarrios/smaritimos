@extends('template')
]
@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Métodos de pago</h3>
                </div>

                @if(isset($models))
                    {!! Form::model($models,['route' => [config('models.'.$section.'.updatePayMethodsRoute'),$payment,$id],'method' => 'post']) !!}
                @else
                    {!! Form::open(['route' => (config('models.'.$section.'.addPayMethodsRoute')),'method' => 'post']) !!}
                @endif


                {!! Form::hidden($section.'_id', $id) !!}
                {!! Form::hidden('date', Date('Y-m-d')) !!}

                <div class="col-xs-4 form-group">{!! Form::label('Monto') !!}
                    {!! Form::number('amount' ,null, ['class'=>' form-control']) !!}
                </div>

                <div class="col-xs-4 form-group">
                    {!! Form::label('Forma de Pago') !!}
                    {!! Form::select('financials_id',$financials ,null, ['class'=> 'select2 form-control']) !!}
                </div>

                <div class="col-xs-4 form-group">
                    {!! Form::label('Nro . Tarjeta') !!}
                    {!! Form::text('ccn', null, ['class'=>' form-control']) !!}
                </div>

                <div class="col-xs-4 form-group">
                    {!! Form::label('Cod. Seg.') !!}
                    {!! Form::text('ccc', null, ['class'=>' form-control']) !!}
                </div>

                <div class="col-xs-4 form-group">
                    {!! Form::label('Vto.') !!}
                    {!! Form::text('cce', null, ['class'=>' form-control']) !!}
                </div>

                <div class="box-footer clearfix">
                    <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="js/asideModelsColors.js"></script>

@endsection
