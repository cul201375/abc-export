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

<!-- datatable listado de detalles de los ingresos de mercaderia -->
<div class="container">
    <div style="padding: 10px;">
        <button type="button" class="btn btn-primary m-1"
            onclick="ShowContent('modules/categorias/addNuevaCategoria.php');">AGREGAR NUEVA
            CATEGORIA</button>
        <button type="button" class="btn btn-secondary m-1"
            onclick="ShowContent('modules/proveedores/addNewProveedor.php');">AGREGAR
            NUEVO
            PROVEEDOR</button>
    </div>

    <table class="table table-responsive" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">ID USUARIO</th>
                <th scope="col">NOMBRE USUARIO</th>
                <th scope="col">ID PROVEEDOR</th>
                <th scope="col">NOMBRE PROVEEDOR</th>
                <th scope="col">ID ARTICULO</th>
                <th scope="col">NOMBRE ARTICULO</th>
                <th scope="col">FEHCA DE INGRESO</th>
                <th scope="col">FECHA DE EGRESO</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
        while ($fila = mysqli_fetch_array($resultado)) {
        ?>
            <tr style="text-align: center; justify-content: center;">

                <td><?php echo $fila['idusuario']; ?></td>
                <td><?php echo $fila['nombre_usuario']; ?></td>
                <td><?php echo $fila['idproveedor']; ?></td>
                <td><?php echo $fila['nombre_proveedor']; ?></td>
                <td><?php echo $fila['idarticulo']; ?></td>
                <td><?php echo $fila['nombre_articulo']; ?></td>
                <td><?php echo $fila['fecha_ingreso']; ?></td>
                <td><button type="button" class="btn btn-success"><span class="material-icons-outlined">
                            add
                        </span></button></td>
                <td><button type="button" class="btn btn-warning "
                        onclick="UpdateProveedor(<?php echo $fila['idproveedor']; ?>);" id="btnEditProveedor"
                        name="btnEditProveedor"><span class="material-icons-outlined">
                            edit
                        </span></button></td>
                <td><button type="button" class="btn btn-danger " id="btnDeleteProveedor" name="btnDeleteProveedor"
                        onclick="DeleteProveedor(<?php echo $fila['idproveedor']; ?>);"><span
                            class="material-icons-outlined">
                            delete
                        </span></button>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>