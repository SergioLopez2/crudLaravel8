console.log("FNC_ACTUALIZAR");
$('body').on('click', '.bt-update', function (e) {
    e.preventDefault();
    var ajaxData = {};
    var idUpdate = $(this).data('idu');
    ajaxData['idUpdate'] = idUpdate;
    $.ajax({
        url: 'edit/' + idUpdate,
    }).done(function (data) {
       console.log("🚀 ~ file: fnc_actualizar.js:11 ~ data:", data)
        if (data.success) {
            window.location.replace(data.redirect);
        }
    });

});
$('body').on('click', '.bt-updateProcess', function (e) {
    e.preventDefault();
    var ajaxData = {};
    var idUpdate = $(this).data('idup');
    var paterno=$('#paterno').val();
    var materno=$('#materno').val();
    var nombre=$('#nombre').val();
    var nacimiento=$('#nacimiento').val();
    var _token = $("input[name=_token]").val();
    ajaxData['idUpdate'] = idUpdate;
    ajaxData['_token'] = _token;
    ajaxData['paterno'] = paterno;
    ajaxData['materno'] = materno;
    ajaxData['nombre'] = nombre;
    ajaxData['nacimiento'] = nacimiento;
    $.ajax({
        url: '/update/' + idUpdate,
        method: "PUT",
        data: ajaxData
    }).done(function (data) {
       console.log("🚀 ~ file: fnc_actualizar.js:11 ~ data:", data)
        if (data.success) {
            window.location.replace(data.redirect);
        }
    });

});