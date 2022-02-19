
$("#addNewCategory").on("click", function () {
  var nombre_categoria = $("#nombre_categoria").val();
  var descripcion_cat = $("#descripcion_categoria").val();

  $.ajax({
    type: "POST",
    data: "addNewCategory=1&nombre_categoria=" + nombre_categoria + "&descripcion=" + descripcion_cat,
    url: "modules/proveedores/proveedoresController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        swal("Bicen hecho!", "Añadiste una nueva categoría!", "success");
        ShowContent("modules/proveedores/listadoProveedores.php");
      } else {
        swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
      }
    },
  });
});


function AddProveedor() {
  fk_idcategori = $("#add_categoria").val();
  nombre_proveedor = $("#add_nombre_proveedor").val();
  nit = $("#add_nit").val();
  email = $("#add_email").val();
  direccion = $("#add_direccion").val();
  telefono = $("#add_telefono").val();
  file_data = $('#archivo').prop("files")[0];
  form_data = new FormData();
  form_data.append('archivo', file_data);

  if(file_data == undefined){
    var imagen = "0";
  }else{
    var imagen = file_data.name;
  }

  if (
    fk_idcategori == "" ||
    nombre_proveedor == "" ||
    nit == "" ||
    email == "" ||
    direccion == "" ||
    telefono == ""
  ) {
    swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
    return false;
  }




  $.ajax({
    type: "POST",
    data:
      "addNewProveedor=1&fk_idcategori=" +
      fk_idcategori +
      "&nombre_proveedor=" +
      nombre_proveedor +
      "&nit=" +
      nit +
      "&email=" +
      email +
      "&imagen=" +
      imagen +
      "&direccion=" +
      direccion +
      "&telefono=" +
      telefono,
    url: "modules/proveedores/proveedoresController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        $("#formNewProveedor").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        upLoadImagen(form_data);
        ShowContent("modules/proveedores/listadoProveedores.php");
        swal("Buen trabajo!", "Proveedor creado exitosamente", "success");
      } else {
        swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
      }
    },
  });
}

function upLoadImagen(form_data) {
  $.ajax({
    type: 'POST',
    data: form_data,
    cache: false,
    contentType: false,
    processData: false,
    url: 'modules/proveedores/upImgProveedor.php',
    dataType: 'json',
    complete: function () {
      return 1;
    }
  });
}