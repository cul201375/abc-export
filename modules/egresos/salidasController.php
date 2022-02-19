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

<!-- datatable table por agregar -->
<div class="container">

</div>