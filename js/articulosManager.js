
function AddArticulo() {
    fk_idcategori = $("#fk_idcategoria").val();
    fk_idproveedor = $("#fk_idproveedor").val();
    nombre_articulo = $("#nombre_articulo").val();
    costo_articulo = $("#costo_articulo").val();
    precio_venta = $("#precio_venta").val();
    presentacion = $("#presentacion").val();
    sku = $("#sku").val();
    volumen = $("#volumen").val();
    unidades = $("#unidades").val();
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
      fk_idproveedor == "" ||
      nombre_articulo == "" ||
      costo_articulo == "" ||
      precio_venta == "" ||
      presentacion == "" ||
      sku == "" ||
      volumen == "" ||
      unidades == ""
    ) {
      swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
      return false;
    }
  
  
  
  
    $.ajax({
      type: "POST",
      data:
        "addNewArticulo=1&fk_idcategori=" +
        fk_idcategori +
        "&fk_idproveedor=" +
        fk_idproveedor +
        "&nombre_articulo=" +
        nombre_articulo +
        "&costo_articulo=" +
        costo_articulo +
        "&imagen="+imagen +
        "&precio_venta=" +
        precio_venta +
        "&presentacion=" +
        presentacion +
        "&sku=" +
        sku +
        "&volumen=" +
        volumen +
        "&unidades=" +
        unidades,
      url: "modules/articulos/articulosController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          $("#formNewProveedor").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          upLoadImagen(form_data);
          ShowContent("modules/articulos/listadoArticulos.php");
          swal("Buen trabajo!", "Articulo creado exitosamente", "success");
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
      url: 'modules/articulos/upImgArticulo.php',
      dataType: 'json',
      complete: function () {
        return 1;
      }
    });
  }