$("#btnAgregarUsuario").on("click", function () {
    var nombre = $("#nombre").val();
    var edad = $("#edad").val();
    var direccion = $("#direccion").val();
    var usuario = $("#usuario").val();
    var clave = $("#clave").val();
    var dpi = $("#dpi").val();
    var correo = $("#correo").val();
    var telefono = $("#telefono").val();
    var rol = $("#role_id").val();
  
    if (
      nombre == "" ||
      edad == "" ||
      direccion == "" ||
      usuario == "" ||
      clave == "" ||
      dpi == "" ||
      correo == "" ||
      telefono == "" ||
      rol == ""
    ) {
      swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "crear_usuario=1&nombre=" +
        nombre +
        "&edad=" +
        edad +
        "&direccion=" +
        direccion +
        "&usuario=" +
        usuario +
        "&clave=" +
        clave +
        "&dpi=" +
        dpi +
        "&correo=" +
        correo +
        "&telefono=" +
        telefono +
        "&role_id=" +
        rol,
      url: "modules/usuarios/usuariosController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          $("#formNuevoUsuario").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          swal("Buen trabajo!", "Usuario creado exitosamente", "success");
          CargarContenido("modules/usuarios/listadoUsuarios.php");
        } else {
          swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
        }
      },
    });
  });
  
  function eliminarUsuario(id) {
    $.ajax({
      type: "POST",
      data: "eliminar_usuario=1&idusuario=" + id,
      url: "modules/usuarios/usuariosController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          swal("Cuidado!", "Eliminaste un usuario!", "warning");
          CargarContenido("modules/usuarios/listadoUsuarios.php");
        } else {
          swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
        }
      },
    });
  }
  
  function editarUsuarios(id) { 
    parametros = {
      editar_usuario: 1,
      idusuario: id,
    };
    $.ajax({
      type: "POST",
      data: parametros,
      url: "modules/usuarios/usuariosController.php",
      dataType: "json",
      success: function (datos) {
            $('#idUsuario').val(datos['idusuario']);
            $('#editNombre').val(datos['nombre']);
            $('#editEdad').val(datos['edad']);
            $('#editDireccion').val(datos['direccion']);
            $('#editUsuario').val(datos['usuario']);
            $('#editClave').val(datos['clave']);
            $('#editDpi').val(datos['dpi']);
            $('#editCorreo').val(datos['correo']);
            $('#editTelefono').val(datos['telefono']);
            $('#editrol_id').val(datos['role_id']);
            $('#editRole_id').val(datos['nombre_rol']);
            $('#editEstado').val(datos['estado']);
            if (datos['imgprofile'] == null){
              $('#viewedituserprofile').attr('src', 'img/usersprofiles/nouser.png');
            }else{
              $('#viewedituserprofile').attr('src', datos['imgprofile']);
            }          
      },
    });
  }
  
  $("#btnConfirmEditarUsuario").on("click", function () {
  
    let idusuario = $("#idUsuario").val();
    let nombre = $("#editNombre").val();
    let edad = $("#editEdad").val();
    let direccion = $("#editDireccion").val();
    let usuario = $("#editUsuario").val();
    let clave = $("#editClave").val();
    let dpi = $("#editDpi").val();
    let correo = $("#editCorreo").val();
    let telefono = $("#editTelefono").val();
    let estado = $("#editEstado").val();
    let idrol = $("#editrol_id").val();
  
    if (
      idusuario == "" ||
      nombre == "" ||
      edad == null ||
      direccion == "" ||
      usuario == "" ||
      clave == "" ||
      dpi == "" ||
      correo == "" ||
      telefono == "" ||
      estado == null ||
      idrol == null
    ) 
    {
      swal("ADVERTANCIA", "Todos los campos son obligatorios", "warning");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "confirmar_edit_usuario=1&idusuario=" + 
        idusuario +
        "&nombre=" +
        nombre +
        "&edad=" +
        edad +
        "&direccion=" +
        direccion +
        "&usuario=" +
        usuario +
        "&clave=" +
        clave +
        "&dpi=" +
        dpi +
        "&correo=" +
        correo +
        "&telefono=" +
        telefono +
        "&role_id=" +
        idrol + "&estado="+
        estado,
      url: "modules/usuarios/usuariosController.php",
      dataType: "json",
      success: function (newdata) {
        var nuevoresultado = newdata.resultado;
        if (nuevoresultado === 1) {
          $("#fromEditarUsuario").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          swal("Buen trabajo!", "Editaste un usuario correctamente!", "success");
          CargarContenido("modules/usuarios/listadoUsuarios.php");
        } else {
          swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
        }
      },
    });
  });