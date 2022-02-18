function ShowContent(form){
    var formulario = form;

    $.ajax({
        type: "POST",
        url: formulario,
        success: function (a){
            $('#mainContent').html(a);
        }
    });
}