@extends('template')
@section('css')
    <style>
        .foto{
            position: relative;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
            margin: auto;
            -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
        }

        .foto>img{
            height: 100%;
            width: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            margin: auto;
        }

        /*.select2-template-title{*/
            /*font-size: 12px;*/
            /*font-weight: bold;*/
            /*display: block;*/
            /*width:100%;*/
        /*}*/

        /*.select2-template-text{*/
            /*font-size: 12px;*/
            /*display: block;*/
            /*width:100%;*/
            /*padding-left:5px;*/
        /*}*/

        /*.select2-template-container{*/
            /*border-bottom: 1px solid #ddd;*/
        /*}*/

        /*.select2-container--default .select2-results__option[aria-selected=true]{*/
            /*background-color: rgba(162,162,162,0.21);*/

        /*}*/

        .select2-results__option img{
            width: 50px;
            height: 50px;
        }

        .select2-search--dropdown{
            display: none;
        }

        #avatares+.select2,#avatares+.select2 .selection{
            height: 50px;
        }


        #avatares+.select2 .select2-selection--single .select2-selection__arrow{
            top: 11px;
        }

        #avatares+.select2 .select2-selection{
            height: 54px;
        }

        #avatares+.select2{
            width:90px !important;
            height:54px;
        }

        #avatares+.select2 .select2-selection{
            height: 54px;
            width:54px !important;
        }

        .select2-container--default .select2-selection--single{
            padding: 0;

        }

        #select2-avatares-container{
            height: 54px;
            width:54px;
            margin:0;
            padding: 0;
        }

        #select2-avatares-container .img-flag{
            height: 54px;
            width:54px;
            vertical-align: middle;
        }

        .select2-container--default .select2-selection--single{
            border-radius: 50%;
            border: 0;
        }


    </style>
@endsection

@section('sectionContent')
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="foto">
                            <img src="{{$model->images ? $model->images->path : "../public/vendors/LTE/dist/img/avatar5.png"}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{!! $model->fullName !!}</h3>

                        <p class="text-muted text-center">
                            |
                            @foreach($model->Roles as $rol)
                                {!! $rol->name !!} |
                            @endforeach
                        </p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Sucursales</b>
                                <ul>
                                    @foreach($model->Brancheables as $branch)
                                        <li>{!! $branch->Branches->name !!}</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Datos personales</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <div class="box-body">
                                {!! Form::model($model,['route'=> [config('models.'.$section.'.updateRoute'), $model->id] , 'files' =>'true']) !!}
                                {!! Form::hidden('roles_id',$model->Roles->first()->id) !!}

                                <div class="col-xs-12 form-group">
                                    {!! Form::label('Usuario') !!}
                                    {!! Form::text('user_name', null, ['class'=>'form-control']) !!}
                                </div>
                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Nombre') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Apellido') !!}
                                        {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Email') !!}
                                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Pasword anterior') !!}
                                        {!! Form::password('password_old', ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Ávatar') !!}
                                        <br>
                                        <select name="image" id="avatares" class="form-control select2">
                                            @foreach($avatares as $ind => $path)
                                                <option value="{!! $ind !!}" @if($model->images && $model->images->path == 'images/avatares/'.$path.'.png') selected = "selected" @endif>{!! $path !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('Nuevo Pasword') !!}
                                        {!! Form::password('password', ['class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-xs-6 form-group">
                                        <button type="submit" class="btn btn-default">Actualizar</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>


    @endsection

@section('js')
    <script>

        function formatState (state) {
            if (!state.id) { return state.text; }
            var $state = $(
                    '<span><img src="images/avatares/' + state.text + '.png" class="img-flag" /></span>'
            );
            return $state;
        };

        function formatDataSelection (data) {
            console.log(data)
            return $("<span><img src='images/avatares/" + data.text + ".png' class='img-flag' /></span>");
        }

        $("#avatares").select2({
            templateResult: formatState,
            templateSelection: formatDataSelection,
            placeholder: 'Seleccione su avatar...'
        });

    </script>

@endsection
