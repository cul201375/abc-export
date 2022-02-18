$('#btnLogin').on('click', function () {
    var user = $("#username").val();
    var password = $("#password").val();
    $.ajax({
        type: 'POST',
        data: 'username='+user+'&password='+password,
        url: 'modules/auth/loginController.php',
        dataType: 'json',
        success: function (data) {
          result = data.resultado;
          if(result === 0){
            swal("ERROR", "CREDENCIALES INVALIDAS", "error");
          }
          else
          {
            window.location.href = "/abc-export/main.php";
          }
          },
    });
});