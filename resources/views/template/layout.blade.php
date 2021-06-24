<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('template.css')

        <!-- para css extras en cada seccion -->
        @yield('css')

    {{--<link rel="stylesheet" href="vendors/LTE/plugins/iCheck/all.css">--}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @yield('header')
        <!-- Left side column. contains the sidebar -->
        @yield('sideBar')
        <!-- Content Wrapper. Contains page content -->

        @yield('mainContent')
        <!-- /.content-wrapper -->

        @yield('footer')

    </div>
    <!-- ./wrapper -->

    @yield('formAside')

    @yield('modal')

    @include('template.js')

    <!-- para js extras en cada seccion -->
    @yield('js')

    <script>
        $(".control-sidebar").css("right",'-'+$(".control-sidebar").css("width"));

        $("a[data-toggle='control-sidebar']").on("click",function (ev) {
            var self = $(this);
            console.log($(self).attr('data-action'));

            if($(".control-sidebar").hasClass("control-sidebar-open")){
                $(".control-sidebar").css("right",'-'+$(".control-sidebar").css("width"));
            }else{
                $(".control-sidebar form").attr('action',$(self).attr('data-action'));
                $(".control-sidebar input[type!='hidden']").val('');
                $(".control-sidebar").css("right","0");

            }
        })

        if($(".control-sidebar").hasClass("control-sidebar-open")){
            $(".control-sidebar").css("right",0);
        }

    </script>
    {{--<script src="vendors/LTE/plugins/iCheck/icheck.js"></script>--}}
    <script>
//        $(document).ready(function(){
//            $("input[type='checkbox']").iCheck({
//                checkboxClass: 'icheckbox_flat-blue',
//                radioClass: 'iradio_flat-blue'
//            });
//        });
    </script>
</body>
</html>
