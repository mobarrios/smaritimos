@if(isset($models))
    {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
@else
    {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
@endif



{!! Form::hidden('users_id',\Illuminate\Support\Facades\Auth::user()->id) !!}

@if(Session::has('client'))
    {!! Form::hidden('clients_id', Session::get('client')->id) !!}
@elseif(isset($models))
    {!! Form::hidden('clients_id', $models->clients->id) !!}
@else
    {!! Form::hidden('clients_id',  null) !!}
@endif

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('Tipo de Operación') !!}
        {!! Form::select('type',['Reserva'=>'Reserva', 'Venta' => 'Venta'], null, ['class'=>' form-control ']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('Presupuestos ') !!}
        {!! Form::select('budgets_id', $budgets, null, ['class'=>'form-control ','id'=>'budgets_id']) !!}
    </div>
    <button class="btn btn btn-default" ng-click="ver()" type="button" id="ver">Ver</button>
</div>
<div class="col-md-12">
    <div class="form-group">
        <table class="table">
            <tr ng-repeat="items in budgets.all_items">
                <td>@{{ items.brands.name }} @{{ items.name }}</td>
                <td> $ @{{ items.pivot.price_budget }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="col-md-6">
    <div class="  form-group">
    {!! Form::label('Fecha Pactada') !!}
    {!! Form::text('date_confirm', null, ['class'=>'datePicker form-control']) !!}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('Sucursal de Entrega') !!}
        {!! Form::select('branches_confirm_id',$branches ,null, ['class'=>' form-control ','id'=>'branches_confirm_id']) !!}
    </div>
</div>

<div >
    <button type="submit" class="btn btn-sm btn-default"><span class="fa fa-save"></span> Guardar</button>
    {!! Form::close() !!}

</div>

