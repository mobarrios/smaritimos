@extends('template.model_index')
@section('table')

        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Crear Chequera</button>
    <hr>
    @foreach($models as $model)
        <tr>
            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
            <td>{{$model->id}}</td>
            <td>
                <a href="{!! route('admin.checkbooks.show',$model->id) !!}">
               <strong>{{$model->Banks->name  }}</strong>
                 Nro . # {{$model->n_chequera }}
                </a>
            </td>
            <td>
                {{$model->Company->razon_social  }}
            </td>


        </tr>
    @endforeach

@endsection

@section('modal')
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nueva Chequera</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                {!! Form::open(['route'=>config('models.'.$section.'.storeRoute') ]) !!}

                    <div class="col-xs-12 form-group">
                        {!! Form::label('N° chequera') !!}
                        {!! Form::text('n_chequera', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-6 form-group">
                        {!! Form::label('Nro. Cheques Desde') !!}
                        {!! Form::number('from', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-6 form-group">
                        {!! Form::label('Nro. Cheques Hasta') !!}
                        {!! Form::number('to', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('Banco') !!}
                        {!! Form::select('banks_id', $banks, null, ['class'=>' form-control']) !!}
                    </div>

                        <div class="col-xs-12 form-group">
                            {!! Form::label('Empresa') !!}
                            {!! Form::select('company_id', $company , null, ['class'=>'form-control']) !!}
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection