$("select[name='models_id']").on('change', function(ev){
    var parent = $(this).parent().parent();

    var id = $(this).val();

    $(parent).find('#colors>option').remove();


    $.ajax({
        method: 'GET',
        url: 'admin/modelLists/'+id,
        success: function(data){

            $.ajax({
                method: 'GET',
                url: 'admin/modelAvailables/' + id,
                success: function (response) {

                    $.each(response, function (x, y) {

                        $(parent).find('#colors').append('<option value=' + x + ' >' + y.color + ' ( ' + y.cantidad + ' ) </option>');
                    });
                }
            })

            if(data.active_list_price != null){
                $(parent).find(".sTotal").val(data.active_list_price.price_net);
                $(parent).find("input[name=price_actual]").val(data.active_list_price.price_net);
            }

            $(parent).find(".patentamiento").val(data.patentamiento);
            $(parent).find(".packService").val(data.pack_service);



        }
    })
});