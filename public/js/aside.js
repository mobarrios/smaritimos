(function( $ ) {

    'use strict';

    $.fn.aside = function (options) {

        // Opciones por default
        var defaults = {
            title: null,
            state: 'close',
            typeForm: null,
            section: null,
            edit: null,
            dataEdit: [],
            model: null,
            hidden: {}
        };

        // Extiende las opciones
        var opts = $.fn.extend(defaults, options);


        var self = $(this);
        var id = new Date().getTime();

        self.attr('data-toggle',"control-sidebar-"+id);

        /**
         * Creo el aside con todo lo que tiene adentro
         * chequeo si la opcion STATE esta en 'open' y si esta lo pongo abierto al aside
         * le pongo el titulo.
         */
        var container = '<aside class="control-sidebar-'+id+' control-sidebar-light scrollable ';
        if(opts.state == 'open')
            container += 'control-sidebar-open';
        container += ' col-lg-4"><div class="tab-content"><div class="tab-pane active" id="control-sidebar-home-tab"><a href="#" data-toggle="control-sidebar-'+id+'"><span class="fa fa-close"></span></a><h3 class="control-sidebar-heading text-center">'+opts.title+'</h3><hr></div></div></aside>';

        var aside = $(container);

        //Pongo el aside en el body
        $('body').append(aside);

        //configuro el aside CSS
        var control_sidebar = $(".control-sidebar-"+id);
        control_sidebar.css("right",'-'+control_sidebar.css("width"));
        control_sidebar.css("height","100%");
        control_sidebar.css("overflow-y","auto");
        control_sidebar.css("background","#f9fafc");
        control_sidebar.css("border-left","1px solid #d2d6de");
        control_sidebar.css("color","#5e5e5e");
        control_sidebar.css("position","absolute");
        control_sidebar.css("top","50px");
        control_sidebar.css("z-index","1010");
        control_sidebar.css("transition","right .3s ease-in-out");

        //eventos cuando abre o cierra el aside
        self.on("click",function (ev) {
            if($('.control-sidebar-open')){
                $('.control-sidebar-open').css("right",'-'+control_sidebar.css("width"));
                $('.control-sidebar-open').removeClass('control-sidebar-open');
            }

            ev.preventDefault();
            if(control_sidebar.hasClass("control-sidebar-open")){
                control_sidebar.css("right",'-'+control_sidebar.css("width"));
                control_sidebar.removeClass('control-sidebar-open');
            }else{
                control_sidebar.addClass('control-sidebar-open');
                control_sidebar.find("form").attr('action',$(self).attr('data-action'));
                control_sidebar.find("input[type!='hidden']").val('');
                control_sidebar.css("right","0");

            }
        })

        //comportamiento si está abierto
        if(control_sidebar.hasClass("control-sidebar-open")){
            control_sidebar.css("right",0);
        }

        //evento para cerrar el aside con el botón de adentro
        control_sidebar.find('a[data-toggle=control-sidebar-'+id+']').on('click',function (ev) {
            ev.preventDefault();
            control_sidebar.css("right",'-'+control_sidebar.css("width"));
            control_sidebar.removeClass('control-sidebar-open');
        })



        //Creo el formulario con la ruta de las opciones
        // var formulario = $('<form action="'+opts.route+'" method="post" enctype="multipart/form-data"></form>')


        //meto el formulario dentro del aside
        // aside.find("#control-sidebar-home-tab").append(formulario);


        //meto los hidden dentro del form
        // for(var i in opts.hidden){
        //     formulario.append($('<input type="hidden" name="'+i+'" value="'+opts.hidden[i]+'"/>'))
        // }


        //meto los inputs dentro del form
        // formulario.load('asideItems');

        var dataEdit = [];

        if(opts.edit != null){
            dataEdit[opts.edit] = $(self).attr('data-id');
        }

        var data = new Object();

        data = {
            type: opts.typeForm,
            hidden: opts.hidden,
            edit: $.extend({},dataEdit),
            model: opts.model
        }

        console.log(dataEdit)

        $.ajax({
            url: 'admin/'+opts.section+'/showAside',
            method: 'GET',
            data: data,
            success: function (data) {
                aside.find("#control-sidebar-home-tab").append(data)

                aside.find("#control-sidebar-home-tab form a[data-toggle=control-sidebar]").on('click', function (ev) {
                    ev.preventDefault();
                    control_sidebar.css("right",'-'+control_sidebar.css("width"));
                    control_sidebar.removeClass('control-sidebar-open');
                })
            },
            error: function (error){
                console.log(error)

            }
        })




    }



}( jQuery ));