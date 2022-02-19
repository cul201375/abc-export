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

<!-- datatable listado de proveedores -->
<div class="container">
    <div style="padding: 10px;">
        <button type="button" class="btn btn-primary m-1"
            onclick="ShowContent('modules/categorias/addNuevaCategoria.php');">AGREGAR NUEVA
            CATEGORIA</button>
        <button type="button" class="btn btn-secondary m-1" data-bs-target="#formNewProveedor"
            data-bs-toggle="modal">AGREGAR
            NUEVO
            PROVEEDOR</button>
    </div>

    <table class="table" style="text-align: center;">
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
                        name="btnEditProveedor"><i class="fas fa-edit"></i></button></td>
                <td><button type="button" class="btn btn-danger " id="btnEditProveedor" name="btnEditProveedor"
                        onclick="DeleteProveedor(<?php echo $fila['idproveedor']; ?>);"><i
                            class="fas fa-user-minus"></i></button>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


<!-- Modal para agregar nuevo proveedor -->
<div class="modal fade" id="formNewProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formNewProveedorLabel">Nuevo proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

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
                    <input type="text" class="form-control" id="add_nombre_proveedor"
                        placeholder="Aqui va el nombre del proveedor">
                    <label for="add_nombre_proveedor">Nombre del proveedor</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="add_nit" placeholder="Aqui el nit del proveedor">
                    <label for="add_nit">NIT</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="add_email"
                        placeholder="Aqui va el email del proveedor">
                    <label for="add_email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="add_direccion"
                        placeholder="Aqui va la direccion del proveedor">
                    <label for="add_direccion">Dirección</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="add_telefono"
                        placeholder="Aqui va el telefono del proveedor">
                    <label for="add_telefono">Teléfon</label>
                </div>
            </div>

            <div class="componentes">
                <div class="componentes">
                    <input type="file" name="archivo" id="archivo" style="width: fit-content;">
                </div>
                <div class="componentes">
                    <img src="img/proveedores/noimg.jpg" class="img-fluid"
                        style="border: 1px solid; border-color: #288b41" alt="preview de imagen de producto" width="200"
                        height="200" id="preview">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="addNuevoProveedor"
                    onclick="AddProveedor();">Agregar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
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