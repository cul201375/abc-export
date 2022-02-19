<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}
include_once('../../include/functions.php');
$proveedores = new ProveedorClass();

$getCategory = $proveedores -> getCategory();
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
<div class="container">
    <div class="form-floating mb-3">
        <select class="form-select" id="add_categoria" aria-label="Default select example">
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
        <input type="text" class="form-control" id="add_nombre_proveedor" placeholder="Aqui va el nombre del proveedor">
        <label for="add_nombre_proveedor">Nombre del proveedor</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="add_nit" placeholder="Aqui el nit del proveedor">
        <label for="add_nit">NIT</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="add_email" placeholder="Aqui va el email del proveedor">
        <label for="add_email">Email</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="add_direccion" placeholder="Aqui va la direccion del proveedor">
        <label for="add_direccion">Dirección</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="add_telefono" placeholder="Aqui va el telefono del proveedor">
        <label for="add_telefono">Teléfon</label>
    </div>
</div>

<div class="componentes">
    <div class="file-input">
        <input type="file" name="archivo" id="archivo" style="width: fit-content;">
    </div>
    <div class="preview-file">
        <img src="img/proveedores/noimg.jpg" class="img-fluid" style="border: 1px solid; border-color: #288b41"
            alt="preview de imagen de producto" width="200" height="200" id="preview">
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-success" id="addNuevoProveedor" onclick="AddProveedor();">Agregar</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
</div>

</div>

<script src="js/proveedorManager.js"></script>