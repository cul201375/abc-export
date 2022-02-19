<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header('location: ../../index.php');
}

include_once('../../include/functions.php');

$detalleIngreso = new IngresosClass();

$resultado = $detalleIngreso->listaIngresos();
?>

<!-- datatable por agregar -->
<div class="container" style="margin-top: 120px;">
    <h1 style="color: #5813cc;">LO SENTIMOS ESTE MÚDULO ESTA EN MANTENIMIENTO</h1>
    <img src="https://fixu.cl/wp-content/uploads/2020/02/mantenimiento-web-1024x630.png" alt="en mantenimient" class="img-fluid">
</div>