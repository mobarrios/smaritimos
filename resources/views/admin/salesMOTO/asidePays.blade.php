@if(isset($model))
    {!! Form::model($model,['url'=> $route, 'files' =>'true','method' => 'POST']) !!}
@else
    {!! Form::open(['url'=> $route, 'files' =>'true','method' => 'POST']) !!}
@endif

@forelse($hidden as $name => $val)
    {!! Form::hidden($name,$val) !!}
@empty

@endforelse


        <div class="col-xs-6 form-group">{!! Form::label('Monto') !!}
            {!! Form::number('amount' ,null, ['class'=>' form-control']) !!}
        </div>

         <div class="col-xs-6 form-group">
             {!! Form::label('Forma de Pago') !!}
             {!! Form::select('financials_id',$financials ,null, ['class'=> 'select2 form-control']) !!}
          </div>

        <div class="col-xs-6 form-group">
            {!! Form::label('Nro . Tarjeta') !!}
            {!! Form::text('ccn', null, ['class'=>' form-control']) !!}
        </div>

        <div class="col-xs-6 form-group">
            {!! Form::label('Cod. Seg.') !!}
            {!! Form::text('ccc', null, ['class'=>' form-control']) !!}
        </div>

        <div class="col-xs-6 form-group">
            {!! Form::label('Vto.') !!}
            {!! Form::text('cce', null, ['class'=>' form-control']) !!}
        </div>


<div class="col-xs-12 text-center form-group" style="padding-top: 2%">
    <button type="submit" class="btn btn-primary">Agregar</button>
    <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
</div>

{!! Form::close() !!}

<script src="js/asideModelsColors.js"></script>
