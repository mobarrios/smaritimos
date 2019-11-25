<!-- angular -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>

{{--<script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>--}}
{{--<script src="js/material.js"></script>--}}
{{--<script src="js/autocomplete.js"></script>--}}
{{--<script src="js/docs.js"></script>--}}

<!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

<!-- jQuery 2.2.3 -->
<script src="vendors/LTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="vendors/LTE/bootstrap/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="vendors/LTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vendors/LTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vendors/LTE/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="vendors/LTE/dist/js/demo.js"></script>--}}

@if(in_array(Request::segment(2),['budgets','technicalServices','sales']))
<!-- Select2 -->
<script src="vendors/LTE/plugins/select2/select2-buscador.js"></script>
@else
<script src="vendors/LTE/plugins/select2/select2.full.min.js"></script>

@endif

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="vendors/LTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="vendors/LTE/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="vendors/LTE/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

<!-- bootstrap color picker -->
<script src="vendors/LTE/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- sweet alert 2 -->
<script src="https://cdn.jsdelivr.net/sweetalert2/6.2.1/sweetalert2.min.js"></script>


<!-- FILE.js -->
<script src="vendors/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="vendors/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="vendors/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="vendors/bootstrap-fileinput/js/fileinput.min.js"></script>

<script src="vendors/bootstrap-fileinput/js/locales/es.js"></script>

<script src="vendors/bootstrap-checkbox-x/js/checkbox-x.min.js" type="text/javascript"></script>



@if(Auth::user())
<script>


        // guarda en localstorage el nombre del menu para luego volver a abrirlo
        var menu = localStorage.getItem('menu');

        $('.sidebar-menu li a').each(function(){
        if($(this).text() == menu)
        $(this).parents().addClass('active');
        });


        $('.menu').on('click',function()
        {
        localStorage.setItem('menu',$(this).text());
        });

    $('.table').addClass('table-striped  table-hover');

    $.fn.modal.Constructor.prototype.enforceFocus = function () {};

    //color picker with addon
    $(".colorpicker").colorpicker();

    //datePicker
    $('.datePicker').datepicker({

        format: 'dd-mm-yyyy',
        language: 'es',
        todayHighlight : 'true',
    });

    //dateRange
    $('.dateRange').daterangepicker({
        format: 'dd-mm-yyyy',
        language: 'es',
    });

    //select2
    $('.select2').select2({
        language: "es",
    });

    //selectMult
    $('.selectMulti').attr('multiple','multiple').select2({
        placeholder: "Seleccionar...",
    });

    //check all items
    $('#check_all').on('click',function(){

        $("input:checkbox").each(function() {
            if($(this).prop('checked'))
                $(this).prop('checked', false);
            else
                $(this).prop('checked', true);


        });

    });


    // table list checkbox to destroy
    $('.destroy_btn').on('click',function(){

        @permission(strtolower($section).'.destroy')

            var btn = $(this);
            $(btn).prop("disabled",true);


        swal({
            title: 'Desea Borrar este Registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borrarlo!'
        }).then(function () {
            swal(
                    'Borrado!',
                    'Su Registro ha sido elimiando correctamento.',
                    'success'
            )
            var url = $(btn).attr('url_destroy');

            $("#tableIndex input:checkbox:checked").each(function() {
                var id = $(this).val();

                $.ajax({
                    'url': url+'/'+id,
                    'method': 'get',
                    'success': function (data) {
                        window.location.href = "{!!  \Illuminate\Support\Facades\Request::segment(2) == 'budgets' ? route(config('models.'.$section.'.indexRoute'),\Illuminate\Support\Facades\Request::segment(4)) : route(config('models.'.$section.'.indexRoute')) !!}";

                    }
                });

            });
        })
@else
alert('No Tiene Permiso para realizar esta acción.');

@endpermission

});

// edit button
$('#edit_btn').on('click',function () {
var route = $(this).attr('route_edit');

//valida q haya solo 1 solo elemento seleccionado
if($('.id_destroy:checked').length != 1) {
alert('Seleccionar 1(uno) elemento para editar');
return false;
}else{

//redireccion a la ruta de edicion con el id
window.location.href = route +'/'+$('.id_destroy:checked').val();

}

});


    $("input[type=file]").fileinput({
        language: 'es',
        showUpload: false,
        autoReplace: true,
//        showRemove: false,
//        showClose: false,
    })


//    $(".file-caption-main").on('hover',function(ev){
//        ev.preventDefault();
//
//        $(this).parent().parent().parent().find('.file-preview').css('display','block');
//    })


    $(document).on("ready", function() {

        $("input[type=file]").each(function (pos,el) {
            var close = $($(event.target).context).parent().parent().parent().parent().find('.file-preview .fileinput-remove')


            $(el).on('fileclear', function(event) {
                event.preventDefault()

                $($(event.target).context).parent().parent().parent().parent().find('.file-preview').css('display','none')
            });

            $(el).on('fileselect', function(event, numFiles, label) {
                $($(event.target).context).parent().parent().parent().parent().find('.file-preview').css('display','block')
            });


            var btnDestroy = $(el).parent().parent().parent().parent().find('button.fileinput-remove');

            btnDestroy.on('click', function (ev) {
                $(el).fileinput('reset');
                $(el).val('');
                console.log($(el).val())
            })


        });
    });
</script>


<script src="js/preloader.js"></script>
@endif