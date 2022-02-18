$("#btnAddNewUser").on("click", function () {
  var nombre_usurio = $("#add_nombre_usuario").val();
  var prm_apellido = $("#add_primer_apellido").val();
  var sgd_apellido = $("#add_segundo_apellido").val();
  var username = $("#add_username").val();
  var password = $("#add_password").val();
  var email = $("#add_email").val();
  var idrol = $("#add_role_id").val();
  var file_data = $('#archivo').prop("files")[0];
  var form_data = new FormData();
  form_data.append('archivo', file_data);

  console.log(nombre_usurio, email);

  if (
    nombre_usurio == "" ||
    prm_apellido == "" ||
    sgd_apellido == "" ||
    username == "" ||
    password == "" ||
    email == "" ||
    idrol == ""
  ) {
    swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "createUser=1&fk_idrol=" +
      idrol +
      "&username=" +
      username +
      "&password=" +
      password +
      "&email=" +
      email +
      "&nombre_usuario=" +
      nombre_usurio +
      "&primer_apellido=" +
      prm_apellido +
      "&segundo_apellido=" +
      sgd_apellido,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        $("#formAddNewUser").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        swal("Buen trabajo!", "Usuario creado exitosamente", "success");
        ShowContent("modules/usuarios/listadoUsuarios.php");
      } else {
        swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
      }
    },
  });
});

function uploadImgUserProfile(form_data) {
  $.ajax({
    type: 'POST',
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    url: 'modules/usuarios/uploadImgUserProfile.php',
    dataType: 'json',
    complete: function () {
      //upLoadImgToDatabase();
    }
  });
}

function DeleteUser(id) {

  swal("Cuidado!", "Esta funcion esta deshabilitada temporalmente!", "warning");

}
function UpdateUser(id) {

  swal("Cuidado!", "Esta funcion esta deshabilitada temporalmente!", "warning");

}

$("#addNewRol").on("click", function () {
  var nombre_rol = $("#nombre_rol").val();
  var descripcion = $("#descripcion").val();

  $.ajax({
    type: "POST",
    data: "addNewRol=1&nombre_rol=" + nombre_rol + "&descripcion=" + descripcion,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        swal("Bicen hecho!", "Añadiste un nuevo rol!", "success");
        ShowContent("modules/usuarios/listadoUsuarios.php");
      } else {
        swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
      }
    },
  });
});
