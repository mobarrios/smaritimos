@extends('template.model_form')

    @section('form_title')
        Nuevo Usuario
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [$routes->updateRoute,$models->id]]) !!}
        @else
            {!! Form::open(['route'=> $routes->storeRoute]) !!}
        @endif

            <div class="col-xs-6 form-group">
              {!! Form::label('Nombre') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Descripción') !!}
                {!! Form::text('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Nivel') !!}
                {!! Form::text('level', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-6 form-group">
                {!! Form::label('Permisos') !!}

                <table class="table ">

                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                        @if(isset($models))
                            @if($permission->getPermissonsByRoles($models->slug) == 0 )
                                <input type="checkbox" name="permissions_checkbox[]"   value="{{$permission->id}}">
                            @else
                                <input type="checkbox"  name="permissions_checkbox[]"  checked value="{{$permission->id}}">
                            @endif
                        @else
                                <input type="checkbox"  name="permissions_checkbox[]"   value="{{$permission->id}}">
                        @endif




                   </td>
                   <td> {{$permission->name}} </td>
                </tr>
                @endforeach
                </table>
                </div>

@endsection

