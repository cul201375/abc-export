<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

$articulo = new ArticuloClass();

$addNewArticulo = (isset($_POST['addNewArticulo']) ? $_POST['addNewArticulo'] : '0');

if($addNewArticulo == 1){

    $fk_idcategori = (isset($_POST['fk_idcategori'])) ? $_POST['fk_idcategori'] : "0";
    $fk_idproveedor = (isset($_POST['fk_idproveedor'])) ? $_POST['fk_idproveedor'] : "0";
    $nombre_articulo = (isset($_POST['nombre_articulo'])) ? $_POST['nombre_articulo'] : "0";
    $costo_articulo = (isset($_POST['costo_articulo'])) ? $_POST['costo_articulo'] : "0";
    $imagen_articulo = (isset($_POST['imagen'])) ? $_POST['imagen'] : "0";
    $precio_venta = (isset($_POST['precio_venta'])) ? $_POST['precio_venta'] : "0";
    $presentacion = (isset($_POST['presentacion'])) ? $_POST['presentacion'] : "0";
    $sku = (isset($_POST['sku'])) ? $_POST['sku'] : "0";
    $volumen = (isset($_POST['volumen'])) ? $_POST['volumen'] : "0";
    $unidades = (isset($_POST['unidades'])) ? $_POST['unidades'] : "0";


    if ($imagen_articulo == "0") {
        $imagen = "noimg.jpg";
    } 
    else{
        $imagen = $imagen_articulo;
    }
    
    $result = $articulo->addNewArticulo($fk_idcategori, $fk_idproveedor, $nombre_articulo, $imagen, $costo_articulo, $precio_venta, $presentacion, $sku, $volumen, $unidades);

    $newdata['resultado'] = $result;

    echo json_encode($newdata);

}
ob_end_flush();
?>