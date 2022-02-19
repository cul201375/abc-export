<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}
?>

<div class="p-2">
    <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">Nombre de la categoria</label>
        <input type="text" class="form-control" id="nombre_categoria" placeholder="ej. Alimentos">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción (220 caracteres) </label>
        <textarea class="form-control" id="descripcion_categoria" rows="3"></textarea>
    </div>

    <button class="btn btn-primary" onclick="ShowContent('modules/proveedores/listadoProveedores.php')">VOLVER</button>
    <button class="btn btn-success" id="addNewCategory">AÑADIR CATEGORIA</button>

</div>

<script src="js/proveedorManager.js"></script>