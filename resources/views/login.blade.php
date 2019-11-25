@extends('template.loginLayout')

    @section('mainContent')
    <div class="login-box">

        <div class="login-box-body">

            <div class="login-logo">
                BACK <strong>END</strong>
            </div>
            <hr>
            <p class="login-box-msg">Por Favor!, coloque sus credenciales.</p>

            {!! Form::open(['route'=>'auth.validate']) !!}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

            <div class="form-group has-feedback">
                    {!! Form::text('user_name',null,['class'=>'form-control','placeholder'=>'Usuario']) !!}

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input  name="password" type="password" class="form-control" placeholder="Password">

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            <div class="icheck">
                {!! Form::checkbox('remember') !!} Recordarme
            </div>
            <hr>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-default btn-block"> Ingresar</button>
                </div>
                <!-- /.col -->
            </div>

            <br>
            @include('template.messages')

            {!! Form::close() !!}

        </div>

    </div>

    @endsection