console.log("HOÑLAS");
$('body').on('submit', '#btn-registro', function (e){
    e.preventDefault();
    var ajaxData={};
    var paterno=$('#paterno').val();
    var materno=$('#materno').val();
    var nombre=$('#nombre').val();
    var nacimiento=$('#nacimiento').val();
    var _token=$("input[name=_token]").val();
    ajaxData['paterno'] = paterno;
    ajaxData['materno'] = materno;
    ajaxData['nombre'] = nombre;
    ajaxData['nacimiento'] = nacimiento;
    ajaxData['_token'] = _token;
    $.ajax({
        url: personasStoreRoute,
        type:"POST",
        data: ajaxData
    }).done(function(data){
        console.log("🚀 ~ file: fnc_registro.js:19 ~ data:", data.success)
        if (data.success) {
            window.location.replace(data.redirect);
        }
    });
    
});