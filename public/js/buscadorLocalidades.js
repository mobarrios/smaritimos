$(".filter").select2({
    placeholder: 'Seleccione una localidad',
    ajax: {
        url: 'admin/findLocalidades',
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term
            };
        },
        delay: 250,
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
})