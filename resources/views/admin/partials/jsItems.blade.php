<script>
    var tr = null;

    $("#addItems").on("submit",function(ev){
        ev.preventDefault();
        var self = $(this);
        $("#aceptar").prop("disabled",true);

        var models_id = $("select[name='models_id']").val();
        var price_list = $("input[name='price_list']").val();
        var price_net = $("input[name='price_net']").val();
        var max_discount = $("input[name='max_discount']").val();
        var obs = $("input[name='obs']").val();
        var _token = $("input[name='_token']").val();

        if($("#myModal form input[name='id']").length > 0){
            var datos = {
                _token : _token,
                models_id : models_id,
                price_list : price_list,
                price_net : price_net,
                max_discount : max_discount,
                obs : obs,
                id : $("input[name='id']").val()
            }

            $(this).attr('action',"{!! route(config('models.'.$section.'.editItemsRoute')) !!}");

        }else{
            var datos = {
                _token : _token,
                models_id : models_id,
                price_list : price_list,
                price_net : price_net,
                max_discount : max_discount,
                obs : obs
            }

            $(this).attr('action',"{!! route( config('models.'.$section.'.addItemsRoute')) !!}");

        }

        var url = $(this).attr('action');


        $.ajax({
            'url' : url,
            'method' : 'post',
            'data' : datos,
            'success' : function(data){
                for(var i in data)
                    if(i == "success"){
                        document.getElementById("addItems").reset();

                        if($("#myModal form input[name='id']").length > 0){
                            $(tr).replaceWith("<tr><td>"+data[i]['models_name']+"</td><td>"+data[i]['price_list']+"</td><td>"+data[i]['price_net']+"</td><td>"+data[i]['max_discount']+"</td><td><div class='btn-group actions'><button class='btn btn-xs btn-success edit' data-id='"+data[i]['models_id']+"'><i class='fa fa-edit'></i></button><button class='btn btn-xs btn-danger trash' data-id='"+data[i]['models_id']+"'><i class='fa fa-trash-o'></i></button></div></td></tr>");

                            $("#myModal").modal('toggle');

                        }else{

                            $("#tbody").append("<tr><td>"+data[i]['models_name']+"</td><td>"+data[i]['price_list']+"</td><td>"+data[i]['price_net']+"</td><td>"+data[i]['max_discount']+"</td><td><div class='btn-group actions'><button class='btn btn-xs btn-success edit' data-id='"+data[i]['models_id']+"'><i class='fa fa-edit'></i></button><button class='btn btn-xs btn-danger trash' data-id='"+data[i]['models_id']+"'><i class='fa fa-trash-o'></i></button></div></td></tr>");

                        }

                    }else{

                        $(".content").prepend('<div class="alert bg-gray  alert-dismissible" id="messages"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><li>'+data[i]+'</li></div>')
                    }

                $("#aceptar").prop("disabled",false);
            },
        });
    });

    $("#tbody").on("click",".edit",function (ev) {
        ev.preventDefault();
        tr = $(this).parent().parent().parent();
        var datos = $(tr).find("td");
        var id = $(this).attr('data-id');

        $("#myModal form").append("<input type='hidden' value='"+id+"' name='id'/>");

        $("select[name='models_id'] option").each(function(val,a){
            if(a.innerHTML == datos[0].innerHTML){
                $(a).attr("selected","selected");
                $("#myModal .select2-selection__rendered").attr("title",a.innerHTML);
                $("#myModal .select2-selection__rendered").html(a.innerHTML);

            }
        });


        $("input[name='price_list']").val(datos[1].innerHTML);
        $("input[name='price_net']").val(datos[2].innerHTML);
        $("input[name='max_discount']").val(datos[3].innerHTML);
        $("input[name='obs']").val();

        $("#myModal").modal("show");




    })

    $("#tbody").on("click",".trash",function (ev) {
        ev.preventDefault();
        var id = $(this).attr('data-id');
        var _token = $("input[name='_token']").val();
        tr = $(this).parent().parent().parent();

        $.ajax({
            'url' : "{!! route( config('models.'.$section.'.addItemsRoute')) !!}",
            'method' : 'post',
            'data' : {id : id,_token : _token},
            'success' : function(data){
                $(tr).hide();

                $(".content").prepend('<div class="alert bg-gray  alert-dismissible" id="messages"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><li>'+data+'</li></div>')
            }
        })
    })

    $('#myModal').on('hidden.bs.modal', function (e) {
        document.getElementById("addItems").reset();

        $("select[name='models_id'] option").each(function(val,a){
            $(a).attr("selected",false);
        });

        $("#myModal form input[name='id']").remove();
        tr = null;
    })
</script>