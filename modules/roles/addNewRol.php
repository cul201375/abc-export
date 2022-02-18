<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}
?>

<div class="p-2">
    <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_rol" placeholder="ej. Admin">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descrion (220 caracteres) </label>
        <textarea class="form-control" id="descripcion" rows="3"></textarea>
    </div>

    <button class="btn btn-primary" onclick="ShowContent('modules/usuarios/listadoUsuarios.php')">VOLVER</button>
    <button class="btn btn-success" id="addNewRol">AÑADIR ROL</button>
</div>

<script src="js/usersManager.js"></script>