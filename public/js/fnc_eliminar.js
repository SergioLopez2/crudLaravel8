console.log("eliminar");
$('body').on('click','.bt-delete',function(e){
    e.preventDefault();
    var ajaxData = {};
    var idEliminar = $(this).attr('data-idd');
    var _token = $("input[name=_token]").val();
    ajaxData['idEliminar'] = idEliminar;
    ajaxData['_token'] = _token;
    $.ajax({
        url: 'show',
        type: "POST",
        data: ajaxData
    }).done(function (data) {
        console.log("🚀 ~ file: fnc_eliminar.js:14 ~ $ ~ data:", data)
        if (data.success) {
            window.location.replace(data.redirect);
        }
    });
    
});