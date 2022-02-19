<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}

include_once('../../include/functions.php');

$articulo = new ArticuloClass();

$resultado = $articulo->listaArticulos();
$getCategory = $articulo->getCategory();


?>

<!-- datatable listado de articulos -->
<div class="container">
    <div style="padding: 10px;">
        <button type="button" class="btn btn-primary m-1"
            onclick="ShowContent('modules/categorias/addNuevaCategoria.php');">AGREGAR
            NUEVA CATEGORIA</button>
        <button type="button" class="btn btn-secondary m-1"
            onclick="ShowContent('modules/articulos/addArticulo.php');">AGREGAR
            NUEVO ARTICULO</button>
        <button type="button" class="btn btn-warning m-1"
            onclick="ShowContent('modules/proveedores/addNewProveedor.php');">AGREGAR
            NUEVA CATEGORIA</button>
    </div>

    <table class="table table-responsive" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">ARTICULO</th>
                <th scope="col">COSTO</th>
                <th scope="col">PRECIO</th>
                <th scope="col">PRESENTACION</th>
                <th scope="col">SKU</th>
                <th scope="col">VOLUMEN</th>
                <th scope="col">UNIDADES</th>
                <th scope="col">ESTADO</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
        while ($fila = mysqli_fetch_array($resultado)) {
        ?>
            <tr style="text-align: center; justify-content: center;">

                <td><?php echo $fila['idarticulo']; ?></td>
                <td><img src="<?php
                                if ($fila['imagen'] == null) {
                                    echo 'img/product/noimg.jpg';
                                } else {
                                    echo $fila['imagen'];
                                } ?>" alt="imagen del proveedor" width="80" height="80"></td>
                <td><?php echo $fila['nombre_articulo']; ?></td>
                <td><?php echo $fila['costo_articulo']; ?></td>
                <td><?php echo $fila['precio_venta']; ?></td>
                <td><?php echo $fila['presentacion']; ?></td>
                <td><?php echo $fila['sku']; ?></td>
                <td><?php echo $fila['volumen']; ?></td>
                <td><?php echo $fila['unidades']; ?></td>
                <td><?php if (!$fila['estado']) {
                        echo 'INACTIVO';
                    } else {
                        echo 'ACTIVO';
                    } ?></td>
                <td>
                    <button type="button" class="btn btn-warning "
                        onclick="UpdateArticulo(<?php echo $fila['idarticulo']; ?>);" id="btnEditArticulo"
                        name="btnEditArticulo"><span class="material-icons-outlined">edit</span>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger " id="btnDeleteArticulo" name="btnDeleteArticulo"
                        onclick="DeleteArticulo(<?php echo $fila['idarticulo']; ?>);"><span
                            class="material-icons-outlined">delete</span>
                    </button>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="js/usersManager.js"></script>