<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vencimiento!</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


{{-- @include('template.css') --}}

<!-- para css extras en cada seccion -->


{{--     <link rel="stylesheet" href="vendors/LTE/plugins/iCheck/all.css">
 --}}    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
{{-- <body class="hold-transition login-page ">
 --}}

 <body>
<div >
    <div>

        <div class="login-logo texto-red">
            <i class="fa fa-code"></i>
            <h1>Articulo por Vencerse!</h1>
        </div>
       <small> Ingrese a este link para para solucionar el problema.</small>
       <br>
        <h2>Un Artículo se esta por vencer.</h2> 
       @foreach($porVencer as $data) 
        <h4>
            <a class="btn btn-primary" href="http://smaritimos.coders.com.ar/admin/items/edit/{{$data->id}}">#{{$data->id}} / <strong>{{$data->Models->Brands->name}}</strong>   / {{$data->Models->name}}    /  vto : {{$data->f_vencimiento}} </a>
        </h4>
        @endforeach 
        

         <h2>Un Artículo Vencidos.</h2> 
       @foreach($vencidos as $data) 
        <h4>
            <a class="btn btn-primary" href="http://smaritimos.coders.com.ar/admin/items/edit/{{$data->id}}">  #{{$data->id}} / <strong>{{$data->Models->Brands->name}}</strong>   / {{$data->Models->name}}    /  vto : {{$data->f_vencimiento}}</a>
        </h4>
        @endforeach 
        

    </div>

</div>
</body>

</html>
