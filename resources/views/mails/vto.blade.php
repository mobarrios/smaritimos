<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vencimiento!</title>
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
            Articulo por Vencerse!
        </div>
        <hr>
        <p class="login-box-msg">
            Un Artículo se esta por vencer. <br>
        Ingrese a este link para para solucionar el problema.<br>

        <h3 ><a href="http://smaritimos.coders.com.ar/admin/items/edit/{{$id}}">ir al Sistema</a></h3>
    </p>

    
       

    </div>

</div>
</body>

</html>
