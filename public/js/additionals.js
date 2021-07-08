
var contenedor = $("#adicionales")
var save = $(".saveAdicionales")
var remove = $(".adicionales a[btn-danger]")


var select = contenedor.find('select[name=additionals_id]')
var amount = contenedor.find('input[name=amount]')
var entity = contenedor.find('input[name=entity]')
var id = contenedor.find('input[name=id]')
var token = contenedor.find('input[name=_token]')

save.on('click',function(ev){
    ev.preventDefault()

    if(select.val() == "" && mount.val() == "")
        return false
    else{
        var data = {
            additionals_id : select.val(),
            amount : amount.val(),
            entity: entity.val(),
            _token: token.val(),
            id: id.val()
        }


        $.ajax({
            url: 'admin/addAdditionals',
            data: data,
            method: 'POST',
            success: function(response){
                console.log(response);
                $(".adicionales").append($('<tr><td class="text-center">'+response.name+'</td><td class="text-center">$ '+amount.val()+'</td><td><div class="btn-group pull-right"><a href="admin/removeAdditionals/'+response.id+'" class="btn btn-xs btn-danger deleteAdicionales"><i class="fa fa-trash"></i></a></div></td></tr>'))
            },
            error: function (error) {
                console.log("Error: "+error)
            }
        })

    }
})



contenedor.on('click','.deleteAdicionales',function(ev){
    ev.preventDefault()

    $(this).attr('disabled',true)

    var contenedor = $(this).parent().parent().parent()

    var data = {
        additionals_id : $(this).attr('data-id'),
        entity: entity.val(),
        _token: token.val(),

        id: id.val()
    }


    $.ajax({
        url: 'admin/removeAdditionals',
        data: data,
        method: 'POST',
        success: function(response){
            $(contenedor).remove()
        },
        error: function (error) {
            console.log("Error: "+error)
        }
    })

})






