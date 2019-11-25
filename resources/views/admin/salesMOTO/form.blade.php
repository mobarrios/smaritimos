@extends('template')

@section('css')
    <style>
        .autocompletedemoCustomTemplate .autocomplete-custom-template li {
            border-bottom: 1px solid #ccc;
            height: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            white-space: normal;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template li:last-child {
            border-bottom-width: 0;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title,
        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-metadata {
            display: block;
            line-height: 2;
        }

        .autocompletedemoCustomTemplate .autocomplete-custom-template .item-title md-icon {
            height: 18px;
            width: 18px;
        }

        .search {
            color: rgba(0, 0, 0, 0.87);
            background-color: rgb(250, 250, 250);
            padding: 16px;

        }

        .select2-template-title {
            font-size: 12px;
            font-weight: bold;
            display: block;
            width: 100%;
        }

        .select2-template-text {
            font-size: 12px;
            display: block;
            width: 100%;
            padding-left: 5px;
        }

        .select2-template-container {
            border-bottom: 1px solid #ddd;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: rgba(162, 162, 162, 0.21);

        }


    </style>
@endsection
@section('sectionContent')
    <div class="row" ng-app="app" ng-controller="ctl">
        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs pull-right">
                    <li class="" id="5"><a class="tab" href="#tab_5" data-toggle="tab" aria-expanded="true">Comprobantes</a></li>
                    <li class="" id="4"><a class="tab" href="#tab_4" data-toggle="tab" aria-expanded="true">Pagos</a></li>
                    <li class="" id="3"><a class="tab" href="#tab_3" data-toggle="tab" aria-expanded="true">Artículos</a></li>
                    <li class="" id="2"><a class="tab" href="#tab_2" data-toggle="tab" aria-expanded="false">Operación</a></li>
                    <li class="active" id="1"><a class="tab" href="#tab_1" data-toggle="tab" aria-expanded="false">Datos del Cliente</a></li>
                    <li class="" id="0"><a class="tab" href="#tab_0" data-toggle="tab" aria-expanded="false">Info</a></li>
                    <li class="pull-left header"><i class="fa fa-file-o"></i>     {{ (isset($models)? 'Venta # '. $models->id : 'Nueva Venta' )  }}</li>
                </ul>
                <?php $total = 0; ?>
                <?php $pago = 0 ?>

                <div class="tab-content">
                    <div class="tab-pane " id="tab_5">
                        @include('admin.salesMOTO.form.comprobantes')
                    </div>
                    <div class="tab-pane " id="tab_4">
                        @include('admin.salesMOTO.form.pagos')
                    </div>
                    <div class="tab-pane " id="tab_3">
                        @include('admin.salesMOTO.form.articulos',[''])
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @include('admin.salesMOTO.form.operacion')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active " id="tab_1">
                        @include('admin.salesMOTO.form.datos')
                    </div>
                    <div class="tab-pane" id="tab_0">
                        @include('admin.salesMOTO.form.info')
                    </div>


                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>

            <!-- nav-tabs-custom -->
        </div>
    </div>
@endsection

@section('modal')
    @include('admin.partials.modalItems')
@endsection



@section('js')

    <script>



        /*
        var tab = localStorage.getItem('tab');

        $('#tab_'+tab).addClass('active');
        $('#'+tab).addClass('active');

        $('.tab').on('click',function(){
            // Store
            localStorage.setItem("tab", $(this).parent().attr('id'));
        });
        */


        $('#changeStatus').on('change',function()
        {

            $.ajax({
                url: 'admin/sales/changeStatus',
                data: {status: $(this).val(), salesId : '{!!  (isset($models)?  $models->id : '' ) !!}'},
                method: 'GET',
                success: function() {
                    alert('Estado Cambiado Correctamente.');
                },
            });
        });




        $("#sendForm").on('click', function (ev) {
            ev.preventDefault();

            $('#formPresupuesto').submit();
        })


        function formatState(state) {

            var datos = state.text.split("~");

            if (!state.id) {
                return state.text;
            }
            var span;
            for (var i = 1; i < datos.length; i++) {
                if (i == 1)
                    span = '<span class="select2-template-text">' + datos[i] + '</span>';
                else
                    span += '<span class="select2-template-text">' + datos[i] + '</span>';
            }


            var $state = $(
                    '<span class="select2-template-container">' +
                    '<span class="select2-template-title">' +
                    datos[0]
                    + '</span>' +

                    span

                    + '</span>'
            );
            return $state;
        }
        ;

        $("#search").select2({
            templateResult: formatState
        });


        var routeBase = window.location.href.split('admin/')[0]
        var rutaEdit;

        $("#reset").on('click', function () {
            $('#modelId').val("")

            $('#formClient').attr('action', routeBase + 'admin/clients/store')
        })

        var app = angular.module("app", []);


        app.controller("ctl", function ($scope, $http)
        {
            $scope.model = ""
            $scope.last_name = ""
            $scope.name = ""
            $scope.dni = ""
            $scope.email = ""
            $scope.sexo = ""
            $scope.nacionality = ""
            $scope.phone1 = ""
            $scope.address = ""
            $scope.iva = ""

            //$scope.city = ""
            //$scope.location = ""
           // $scope.province = ""
           // $scope.province = ""

            @if(Session::has('client') || $errors->any())

                $scope.model = "{!! Session::has('client') ? Session::get('client')->id : ""!!}"
                $scope.last_name = "{!! Session::has('client') ? Session::get('client')->last_name :  old('last_name')!!}"
                $scope.name = "{!! Session::has('client') ? Session::get('client')->name :  old('name') !!}"
                $scope.dni = "{!! Session::has('client') ? Session::get('client')->dni :  old('dni')!!}"
                $scope.email = "{!! Session::has('client') ? Session::get('client')->email : old('email')!!}"
                $scope.sexo = "{!! Session::has('client') ? Session::get('client')->sexo : old('sexo')!!}"
                $scope.nacionality = "{!! Session::has('client') ? Session::get('client')->nacionality : old('nacionality')!!}"
                $scope.phone1 = "{!! Session::has('client') ? Session::get('client')->phone1 : old('phone1')!!}"
                $scope.address = "{!! Session::has('client') ? Session::get('client')->address : old('address')!!}"
                {{--//$scope.city = "{!! Session::has('client') ? Session::get('client')->city : old('city')!!}"--}}
               {{--// $scope.location = "{!! Session::has('client') ? Session::get('client')->location : old('location')!!}"--}}
                {{--//$scope.province = "{!! Session::has('client') ? Session::get('client')->province : old('province')!!}"--}}
                $scope.location = "{!! Session::has('client') ? Session::get('client')->location : old('location')!!}"
                $scope.iva_conditions_id = "{!! Session::has('client') ? Session::get('client')->location : old('iva_conditions_id')!!}"
                $scope.localidades_id = "{!! Session::has('client') ? Session::get('client')->location : old('localidades_id')!!}"
                {{--//$scope.iva = "{!! Session::has('client') ? Session::get('client')->iva : old('location')!!}"--}}

                @if(\Illuminate\Support\Facades\Session::has('client'))
                    $('.filter').select2({
                        data: [
                            {
                                id: '{!! \Illuminate\Support\Facades\Session::get('client')->localidades_id !!}',
                                text: '{!! \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->Municipios->Provincias->name . ' - ' . \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->Municipios->name . ' - ' . \App\Entities\Configs\Localidades::find(\Illuminate\Support\Facades\Session::get('client')->localidades_id)->name !!}'
                            },
                            // ... more data objects ...
                        ]
                    });
                @elseif(old('localidades_id'))
                   $('.filter').select2({
                    data: [
                        {
                            id: '{!! old('localidades_id') !!}',

                            text: '{!! \App\Entities\Configs\Localidades::find(old('localidades_id'))->Municipios->Provincias->name . ' - ' . \App\Entities\Configs\Localidades::find(old('localidades_id'))->Municipios->name . ' - ' . \App\Entities\Configs\Localidades::find(old('localidades_id'))->name !!}'
                        },
                        // ... more data objects ...
                    ]
                });
                @endif


            @endif

            @if(isset($models))
                $scope.model = "{!! $models->clients->id !!}"
                $scope.last_name = "{!! $models->clients->last_name !!}"
                $scope.name = "{!! $models->clients->name !!}"
                $scope.dni = "{!! $models->clients->dni !!}"
                $scope.email = "{!! $models->clients->email !!}"
                $scope.sexo = "{!! $models->clients->sexo !!}"
                $scope.nacionality = "{!! $models->clients->nacionality !!}"
                $scope.phone1 = "{!! $models->clients->phone1 !!}"
                $scope.address = "{!! $models->clients->address !!}"
                {{--//$scope.city = "{!! $models->clients->city !!}"--}}
                {{--//$scope.location = "{!! $models->clients->location !!}"--}}
                {{--//$scope.province = "{!! $models->clients->province !!}"--}}
                $scope.location = "{!! $models->clients->localidades_id!!}"
                $scope.iva = "{!! $models->clients->iva_conditions_id!!}"
            @endif


            $('#search').on('change', function (ev) {

                $("#search>option[value='seleccione']").remove();
                var select = $(this);
                var option = select.find('option:selected');

                $('#clients_id').val(option.val())

                $('#modelId').val(option.val());

                $http.get("admin/clientsSearch/" + option.val())
                        .then(function (response) {
                            $('#formClient').attr('action', routeBase + 'admin/clients/update/' + option.val())
                            $scope.model = option.val()
                            $scope.last_name = response.data['last_name']
                            $scope.name = response.data['name']
                            $scope.dni = response.data['dni']
                            $scope.email = response.data['email']
                            $scope.sexo = response.data['sexo']
                            $scope.nacionality = response.data['nacionality']
                            $scope.phone1 = response.data['phone1']
                            $scope.address = response.data['address']
                            //$scope.city = response.data['city']
                            $scope.location = response.data['localidades_id']
                            //$scope.province = response.data['province']

//                            $scope.iva = response.data['iva_conditions_id']
                            $('#iva').val(response.data['iva_conditions_id'])
                            $('select[name=localidades_id]').val(response.data['localidades_id'])
                            $('select[name=localidades_id]+.select2 span.select2-selection__rendered').html(response.data['localidades'])



//                            $('#iva option[value='+response.data['iva_conditions_id']+']').attr('selected','selected');

                           console.log(response.data['localidades_id'])

                            $('input[name=clients_id]').val(option.val())
                        });


                var budgets = $('#budgets_id');

                budgets.html("");

                $.ajax({
                    method: 'GET',
                    url: 'admin/budgetsByClients/' + option.val(),
                    success: function (data) {
                        $.each(data, function (i, y) {
                            budgets.append("<option value=" + y.id + ">#" + y.id + " | " + y.created_at + "</option>")
                        });
                    }
                })
            });


            $scope.ver = function () {
                $http.get("admin/budgets/budget/" + $('#budgets_id').val())
                        .then(function (response) {
                            $scope.budgets = response.data;


                        });
            };

                    {{--@if(isset($models))--}}
                    {{--@if($models->SalesItems->count() > 0)--}}
                    {{--$http.get("admin/budgets/budget/" + $('#budgets_id').val())--}}
                    {{--.then(function (response) {--}}
                    {{--$scope.budgets = response.data;--}}

                    {{--var modelos = [];--}}


                    {{--for(var m in $scope.budgets.all_items) {--}}
                    {{--var obj = {--}}
                    {{--modelo : $scope.budgets.all_items[m].id,--}}
                    {{--color : $scope.budgets.all_items[m].pivot.colors_id--}}
                    {{--}--}}

                    {{--modelos.push(obj)--}}
                    {{--}--}}

                    {{--$.ajax({--}}
                    {{--method: 'get',--}}
                    {{--data: $.extend({},modelos),--}}
                    {{--url: 'admin/branchesWithStockByModels',--}}
                    {{--success: function(data){--}}
                    {{--$("#branches_confirm_id option").remove();--}}

                    {{--for(var i in data){--}}
                    {{--if(i == {!! $models->branches_confirm_id !!})--}}
                    {{--$("#branches_confirm_id").append($("<option value='"+i+"' selected>"+data[i]+"<option>"))--}}
                    {{--else--}}
                    {{--$("#branches_confirm_id").append($("<option value='"+i+"'>"+data[i]+"<option>"))--}}
                    {{--}--}}

                    {{--}--}}
                    {{--})--}}

                    {{--});--}}
                    {{--@endif--}}
                    {{--@endif--}}



            var contenedor = $("#adicionales")
            var save = $(".saveAdicionales")
            var remove = $(".adicionales a[btn-danger]")


            var select = contenedor.find('select[name=additionals_id]')
            var amount = contenedor.find('input[name=amount]')
            var entity = contenedor.find('input[name=entity]')
            var id = contenedor.find('input[name=id]')
            var token = contenedor.find('input[name=_token]')

            save.on('click', function (ev) {
                ev.preventDefault()

                $(this).attr('disabled', true)
                $(this).prop('disabled', true)


                if (select.val() == "" && mount.val() == "")
                    return false
                else {
                    var data = {
                        additionals_id: select.val(),
                        amount: amount.val(),
                        entity: entity.val(),
                        _token: token.val(),
                        id: id.val()
                    }


                    $.ajax({
                        url: 'admin/addAdditionals',
                        data: data,
                        method: 'POST',
                        success: function (response) {

                            var totalAdeudado = $(".totalAdeudado");
                            var total = $(".total");


                            totalAdeudado.text((parseFloat(totalAdeudado.attr('data-precio')) + parseFloat(amount.val())).toLocaleString(undefined, {minimumFractionDigits: 2}))

                            totalAdeudado.attr('data-precio', (parseFloat(totalAdeudado.attr('data-precio')) + parseFloat(amount.val())))

                            total.text('$' + ((parseFloat(total.attr('data-precio')) + parseFloat(amount.val())).toLocaleString(undefined, {minimumFractionDigits: 2})))

                            total.attr('data-precio', parseFloat(total.attr('data-precio')) + parseFloat(amount.val()))

                            $(".adicionales").append($('<tr><td class="text-center">' + response.name + '</td><td class="text-center">$ ' + amount.val() + '</td><td><div class="btn-group pull-right"><a href="admin/removeAdditionals/' + response.id + '" class="btn btn-xs btn-danger deleteAdicionales" data-id="' + select.val() + '"><i class="fa fa-trash"></i></a></div></td></tr>'))


                            $(save).attr('disabled', false)
                            $(save).prop('disabled', false)
                        },
                        error: function (error) {
                            console.log("Error: " + error)

                            $(save).attr('disabled', false)
                            $(save).prop('disabled', false)
                        }
                    })

                }
            })


            contenedor.on('click', '.deleteAdicionales', function (ev) {
                ev.preventDefault()

                $(this).attr('disabled', true)
                $(this).prop('disabled', true)

                var contenedor = $(this).parent().parent().parent()

                var data = {
                    additionals_id: $(this).attr('data-id'),
                    entity: entity.val(),
                    _token: token.val(),

                    id: id.val()
                }


                $.ajax({
                    url: 'admin/removeAdditionals',
                    data: data,
                    method: 'POST',
                    success: function (response) {


                        var totalAdeudado = $(".totalAdeudado");
                        var total = $(".total");


                        totalAdeudado.text((parseFloat(totalAdeudado.attr('data-precio')) - parseFloat(response.amount)).toLocaleString(undefined, {minimumFractionDigits: 2}))

                        totalAdeudado.attr('data-precio', parseFloat(totalAdeudado.attr('data-precio')) - parseFloat(response.amount))

                        total.text('$' + ((parseFloat(total.attr('data-precio')) - parseFloat(response.amount)).toLocaleString(undefined, {minimumFractionDigits: 2})))

                        total.attr('data-precio', parseFloat(total.attr('data-precio')) - parseFloat(response.amount))


                        $(contenedor).remove();

                        $(this).attr('disabled', false)
                        $(this).prop('disabled', false)
                    },
                    error: function (error) {
                        console.log("Error: " + error)
                        $(this).attr('disabled', false)
                        $(this).prop('disabled', false)
                    }

                })

            })

        });


        //        app.controller("ctl", function ($scope, $http) {
        //
        //            $scope.ver = function () {
        //                $http.get("admin/budgets/budget/" + $('#budgets_id').val())
        //                        .then(function (response) {
        //                            $scope.budgets = response.data;
        //                            console.table(response.data);
        //                        });
        //            };
        //        });


        $('#ver').on('click', function () {
            $.get("admin/budgets/budget/" + $('#budgets_id').val(), function (res) {

            });
        });

        $('#budgets_id').on('change', function () {
            $.get("admin/budgets/budgetsClients/" + $(this).val(), function (res) {
                $("#clients_id ").val(res).trigger("change");
            });
        });


        $("#show_budget").on('click', function () {
            var id = $('#budgets_id').val();
            //window.open('admin/budgets/pdf/' + id, '_blank');

            //$('#modalBudgetClients .modal-content').load('{{route('admin.budgets.index')}}');

            $('#modalBudgetClients').modal(open);
        });


        var inputsPagos = $("#tablaPagos input[type=checkbox]");
        /*
         $.each(inputsPagos,function (pos, input) {

         })
         */

        $(inputsPagos).parent().on('click', function (ev) {

            var checkbox = new Array();

            if ($(this).prop('checked')) {
                $(this).prop('checked', false)
            } else {
                $(this).prop('checked', true)
            }


            $.each(inputsPagos, function (pos, input) {
                checkbox[pos] = $(input).prop('checked');
            })

            for (var inputs in checkbox) {
                if (checkbox[inputs]) {
                    $("#generarRecibo").removeClass('disabled');
                    return
                } else {
                    $("#generarRecibo").addClass('disabled');
                }
            }
        });

        $("#generarRecibo").on('click', function (ev) {
            ev.preventDefault()

            $("#formRecibos").submit();

        })

        @if(isset($models))
            $("#mechanics_id").on('click', function(ev){
                ev.preventDefault();

                showPreload();

                var mecanico = $("select[name=mechanics_id]").val();


                $.ajax({
                    method: 'get',
                    url: 'admin/sales/asignMechanic/{!! $models->id !!}/'+mecanico,
                    complete: function(data){

                        hidePreload();

                        $(".breadcrumb").after($('<div class="alert bg-warning  alert-dismissible" id="messages"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><li>'+data.responseJSON+'</li>'));

                        $("#mechanics_id").parent().parent().replaceWith('<p class="text-warning">Ya se hizo la puesta en marcha</p>');

                    }

                });

            })
        @endif



    </script>

    <script src="js/buscadorLocalidades.js"></script>
@endsection