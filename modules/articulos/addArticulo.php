<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}

include_once('../../include/functions.php');

$articulo = new ArticuloClass();
$getCategory = $articulo -> getCategory();
$proveedores = new ProveedorClass();
$getProveedores = $proveedores -> getProveedores();
?>

<!-- script para el imgPicker -->
<script>
document.getElementById('archivo').onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        let image = document.getElementById('preview');
        image.src = reader.result;
    };
}
</script>

<!-- fk_idcategoria, fk_idproveedor, nombre_articulo, imagen, costo_articulo, precio_venta, presentacion, sku, volumen, unidades, estado -->

<div class="d-flex flex-row justify-content-around flex-wrap pt-1 pb-4">
    <div>
        <div class="form-floating mb-3">
            <select class="form-select" id="fk_idcategoria" aria-label="Default select example">
                <option selected>Selecceiona una categoría</option>
                <?php
                        while ($row = mysqli_fetch_array($getCategory)) {
                        ?>
                <option value="<?php echo $row['idcategoria']; ?>"> <?php echo $row['nombre_categoria']; ?>
                </option>
                <?php
                        }
                        ?>
            </select>
            <label for="add_categoria_id">Selecceiona una categoría</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="fk_idproveedor" aria-label="Default select example">
                <option selected>Selecceiona un proveedor</option>
                <?php
                        while ($rowprov = mysqli_fetch_array($getProveedores)) {
                        ?>
                <option value="<?php echo $rowprov['idproveedor']; ?>"> <?php echo $rowprov['nombre_proveedor']; ?>
                </option>
                <?php
                        }
                        ?>
            </select>
            <label for="add_categoria_id">Selecceiona un proveedor</label>
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Nombre del articulo</label>
            <input type="text" class="form-control" id="nombre_articulo">
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Costo del articulo</label>
            <input type="number" class="form-control" id="costo_articulo">
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Precio de venta del articulo</label>
            <input type="number" class="form-control" id="precio_venta">
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Presentación</label>
            <input type="text" class="form-control" id="presentacion">
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">SKU</label>
            <input type="text" class="form-control" id="sku">
        </div>
    </div>
    <div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Volumen</label>
            <input type="number" class="form-control" id="volumen">
        </div>
        <div class="mb-1 mt-1">
            <label for="exampleFormControlInput1" class="form-label">Unidades</label>
            <input type="number" class="form-control" id="unidades">
        </div>
            <div class="file-input">
                <input type="file" name="archivo" id="archivo" style="width: fit-content;">
            </div>
            <div class="preview-file">
                <img src="img/proveedores/noimg.jpg" class="img-fluid" style="border: 1px solid; border-color: #288b41"
                    alt="preview de imagen de producto" width="200" height="200" id="preview">
            </div>
        </div>
    </div>
</div>
<div class="p-2">
    <button class="btn btn-primary" onclick="ShowContent('modules/articulos/listadoArticulos.php')">VOLVER</button>
    <button class="btn btn-success" id="btnAddArticulo" onclick="AddArticulo();">AÑADIR ARTICULO</button>
</div>


<script src="js/articulosManager.js"></script>