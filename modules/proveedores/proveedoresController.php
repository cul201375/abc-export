<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

$proveedoresClass = new ProveedorClass();

$addNewCategory = (isset($_POST['addNewCategory']) ? $_POST['addNewCategory'] : '0');
$addNewProveedor = (isset($_POST['addNewProveedor']) ? $_POST['addNewProveedor'] : '0');

if ($addNewCategory == 1) {
    $nombre_categoria = (isset($_POST['nombre_categoria'])) ? $_POST['nombre_categoria'] : "0";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "0";

    $result = $proveedoresClass->createNewCategory($nombre_categoria, $descripcion);

    $newdata['resultado'] = $result;

    echo json_encode($newdata);
}
if($addNewProveedor == 1){+
    $fk_idcategori = (isset($_POST['fk_idcategori'])) ? $_POST['fk_idcategori'] : "0";
    $nombre_proveedor = (isset($_POST['nombre_proveedor'])) ? $_POST['nombre_proveedor'] : "0";
    $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "0";
    $imagen_proveedor = (isset($_POST['imagen'])) ? $_POST['imagen'] : "0";
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";


    if ($imagen_proveedor == "0") {
        $imagen = "noimg.jpg";
    } 
    else{
        $imagen = $imagen_proveedor;
    }
    
    $result = $proveedoresClass->addNewProveedor($fk_idcategori, $nombre_proveedor, $nit, $email, $imagen, $direccion, $telefono);

    $newdata['resultado'] = $result;

    echo json_encode($newdata);

}
ob_end_flush();
?>
