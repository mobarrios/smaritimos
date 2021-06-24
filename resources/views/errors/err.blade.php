<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>¡Error!</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

@include('template.css')

<!-- para css extras en cada seccion -->


    <link rel="stylesheet" href="vendors/LTE/plugins/iCheck/all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
       .login-logo .fa-shekel{
            /*color: white !important;*/
            text-shadow: -3px 3px 5px rgba(0, 0, 0, 0.21)
        }

        .login-logo{
            font-size: 26px;
        }

        .login-box{
            width: auto;
        }

        .login-box-msg{
            font-size: 2rem;
        }

        .texto-red{
            color: red;
            font-weight: 500;
        }

    </style>
</head>
<body class="hold-transition login-page ">

<div class="login-box">

    <div class="login-logo">
        <a href=""> <span class="fa-stack ">
                <i class="fa fa-shekel fa-stack-2x"></i>
            </span></a>
    </div>
    <div class="login-box-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

        <div class="login-logo texto-red">
            <i class="fa fa-code"></i>
            Algo salió mal
        </div>
        <hr>
        <p class="login-box-msg">La petición no se ha podido completar. <br>
        El administrador ya fue notificado para solucionar el problema.</p>

        <hr>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <a href="{!! \Illuminate\Support\Facades\URL::previous() !!}" class="btn btn-default btn-block"> Volver </a>
            </div>
            <!-- /.col -->
        </div>

    </div>

</div>
</body>

</html>
