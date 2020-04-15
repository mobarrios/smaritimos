@extends('template.model_form')

    @section('form_title')
        Nuevo Artículo
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute'), 'files' =>'true']) !!}
        @endif

        {!! Form::hidden('status','1') !!}

        <div class="row">

             <div class="col-xs-12  form-group">
                {!! Form::label('Modelo') !!}
                <select name='models_id' class=" select2 form-control">
                    @foreach($brands as $br)
                        <optgroup label="{{$br->name}}">
                            @foreach($br->Models as $m)
                                    <option value="{{$m->id}}" @if(isset($models) && ($models->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>


            <div class="col-xs-6 form-group">
                {!! Form::label('N. Serie / Identificación') !!}
                {!! Form::text('n_serie', null, ['class'=>'form-control']) !!}
            </div>

            <!-- <div class="col-xs-6 form-group">
                {!! Form::label('N. Serie Original') !!}
                {!! Form::text('cod_proveedor', null, ['class'=>'form-control']) !!}
            </div> -->


            @if(config('models.'.$section.'.is_brancheable'))
                <div class="col-xs-6 form-group">
                    {!! Form::label('Deposito') !!}
                   {{--  {!! Form::select('branches_id',\Illuminate\Support\Facades\Auth::user()->getBranchName() , null, ['class'=>' select2  form-control']) !!} --}}
               
                    {!! Form::select('branches_id',$branches , null, ['class'=>' select2  form-control']) !!}

</div>
            @endif



           


            <div class="col-xs-6 form-group">
                {!! Form::label('Fecha Emision') !!}
                {!! Form::text('f_emision', null, ['class'=>'datePicker form-control']) !!}
            </div>

             <div class="col-xs-6 form-group">
                {!! Form::label('Fecha Vto.') !!}
                {!! Form::text('f_vencimiento', null, ['class'=>'datePicker form-control']) !!}
            </div>

           

            {{-- <div class="col-xs-6 form-group">
                {!! Form::label('Emitido Por') !!}
                {!! Form::text('emitido_por', null, ['class'=>'form-control']) !!}
            </div>
         --}}
            

            <div class="col-xs-6 form-group">
                {!! Form::label('Capacidad') !!}
                {!! Form::text('capacidad', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-6 form-group">
                {!! Form::label('Tipo Capacidad') !!}
                {!! Form::select('items_capacidad_tipo_id', $capacidad_tipos,  null, ['class'=>'form-control select2']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Estado') !!}
                {!! Form::select('status', $estados, null, ['class'=>'form-control select2']) !!}
            </div>
             <div class="col-xs-6 form-group">
                {!! Form::label('Empresa') !!}
                {!! Form::select('company_id', $companies, (isset($models) ? $models->company_id : '' ), ['class'=>'select2 form-control']) !!}
            </div>


             <div class="col-xs-12 form-group">
                {!! Form::label('Observaciones') !!}
                {!! Form::text('obs', null, ['class'=>'form-control']) !!}
            </div>

        </div>

         <div class="col-xs-6 form-group">
                {!! Form::label('Imagen') !!}
                {!! Form::file('image', ['class'=>'form-control']) !!}

                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($models->Images as $im)
                            <tr>
                                <td>{{$im->id}}</td>
                                <td class="col-xs-2">
                                    <div class="image">
                                        <a target="_blank" href="{{$im->path}}">
                                            <img src="{{$im->path}}" class="img-rounded" alt="Imagen" width="120px">
                                        </a>
                                    </div>
                                </td> 
                                <td>{{$im->name}}</td>
                                <td class="col-xs-1"><a class="btn btn-xs btn-danger" href="{{route('admin.items.deleteImages',$im->id)}}"><span class="fa fa-trash"></span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @if(isset($models))
        <div class="col-xs-6">
            <h3>Movimientos</h3>

            <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Estado</th>
            </thead>
                <tr>
                    <td>{{date('d-m-Y h:i',strtotime($models->created_at))}}</td>
                    <td>Ingresó</td>
                </tr>
                    @foreach($models->Updateables as $update)

                        @if($update->column == 'status')
                            <tr>
                            <td>{{date('d-m-Y h:i',strtotime($update->created_at))}}</td>
                            <td>{{config('status.items.'.$update->data_old)}}</td>
                            </tr>
                        @endif

                    @endforeach

            </table>
        </div>
        @endif





@endsection



