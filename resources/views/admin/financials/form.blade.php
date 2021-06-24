@extends('template.model_form')

@section('form_title')
    Nuevo Financiamiento
@endsection

@section('form_inputs')

    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif

    <div class="col-xs-4 col-lg-4 form-group">
        {!! Form::label('Nombre Financiamiento') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-4 col-lg-4 form-group">
        {!! Form::label('Tasa Extra') !!}
        {!! Form::text('extra_cost', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-4 col-lg-4  form-group" style="padding-top: 2%">
        <button type="submit" class="btn btn-default"><span class="fa fa-save"></span></button>
        @if(isset($models))
            <a href="#" data-action="{!! route("admin.financials.addDue") !!}" data-toggle="control-sidebar"
               class="btn btn-default"><span class="fa fa-plus"></span></a>
        @endif
    </div>

    {!! Form::close() !!}

    @if(isset($models))
        <div class="col-xs-12">
            <table class="table">
                <tr>
                    <th>Cuota Nro.</th>
                    <th>Coeficiente</th>
                    <th>%</th>
                </tr>
                @foreach($models->FinancialsDues as $item)
                    <tbody>
                    <tr>
                        <td>{{$item->due}}</td>
                        <td>{{$item->coef}}</td>
                        <td>{{$item->porcent}}</td>

                        <td>
                            <a href="{{route('admin.financials.deleteDue',[$item->id,$models->id])}}"><span
                                        class="text-danger fa fa-trash"></span></a>
                        </td>
                        <td>
                            <a href="{{route('admin.financials.editDue',[$item->id,$models->id])}}"><span
                                        class="text-success fa fa-edit"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        @endif

        @endsection


        @section('formAside')
        @include('admin.partials.asideOpenForm')
        @if(isset($models))

                <!-- .control-sidebar-menu -->

        @if(isset($modelItems))
            {!! Form::model($modelItems,['route'=> ['admin.financials.updateDue', $modelItems->id,$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> ['admin.financials.addDue' ], 'files' =>'true']) !!}
        @endif

        {!! Form::hidden('financials_id',$models->id) !!}

        <div class="col-xs-12 form-group">
            {!! Form::label('Cuota') !!}
            {!! Form::number('due', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Coeficiente') !!}
            {!! Form::text('coef', null, ['class'=>'form-control','step' => '0,1']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Porcentaje') !!}
            {!! Form::text('porcent', null, ['class'=>'form-control','step' => '0,1']) !!}
        </div>


        <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
        </div>
        {!! Form::close() !!}
                <!-- /.control-sidebar-menu -->
    @endif
    @include('admin.partials.asideCloseForm')
@endsection


