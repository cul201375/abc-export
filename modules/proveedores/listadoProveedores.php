<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header('location: ../../index.php');
}

include_once('../../include/functions.php');

$proveedores = new ProveedorClass();

$resultado = $proveedores->listaProveedores();
$getCategory = $proveedores -> getCategory();
?>

<!-- datatable listado de proveedores -->
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
                <th scope="col">ID</th>
                <th scope="col">PROVEEDOR</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">NIT</th>
                <th scope="col">EMAIL</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">TELEFONO</th>
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

                <td><?php echo $fila['idproveedor']; ?></td>
                <td><?php echo $fila['nombre_proveedor']; ?></td>
                <td><?php echo $fila['nombre_categoria']; ?></td>
                <td><?php echo $fila['nit_proveedor']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><img src="<?php
                                if ($fila['imagen'] == null) {
                                    echo 'img/proveedores/noimg.jpg';
                                } else {
                                    echo $fila['imagen'];
                                } ?>" alt="imagen del proveedor" width="80" height="80"></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php if (!$fila['estado']) {
                        echo 'INACTIVO';
                    } else {
                        echo 'ACTIVO';
                    } ?></td>
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

<!-- Modal para editar un proveedor -->
</div>
<div class="modal fade" id="formEditUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="formEditUserLabel">Editar un usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edit_nombre_usuario" placeholder="Aqui va tu nombre">
                    <label for="edit_nombre_usuario">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edit_primer_apellido" placeholder="Aqui va tu nombre">
                    <label for="edit_primer_apellido">Primer apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edit_segundo_apellido" placeholder="Aqui va tu nombre">
                    <label for="edit_segundo_apellido">Segundo apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edit_username" placeholder="Aqui va tu usuario">
                    <label for="edit_username">Usuario</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="edit_password" placeholder="Aqui va tu contraseña">
                    <label for="edit_password">Contraseña</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="edit_email" placeholder="Aqui va tu email">
                    <label for="edit_email">Correo electrónico</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edit_telefono" placeholder="Aqui va tu correo">
                    <label for="edit_telefono">Teléfono</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="edit_role_id" aria-label="Default select example">
                        <option selected>Selecceiona un rol</option>
                        <?php
                        while ($row = mysqli_fetch_array($getRolesResult)) {
                        ?>
                        <option value="<?php echo $row['idrol']; ?>"> <?php echo $row['nombre_rol']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="edit_role_id">Selecceiona un rol</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnEditUser">Agregar Usuario</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<script src="js/proveedorManager.js"></script>