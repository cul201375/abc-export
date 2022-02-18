<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header('location: ../../index.php');
}

include_once('../../include/functions.php');

$usuarios = new UsuariosClass();

$resultado = $usuarios->listadoUsuarios();
$getRolesResult = $usuarios->getRolesFromUsers();


?>
<!-- datatable listado de usuarios -->
<div style="padding: 10px;">
  <button type="button" class="btn btn-primary" onclick="ShowContent('modules/roles/addNewRol.php');">AGREGAR NUEVO ROL</button>
  <button type="button" class="btn btn-secondary" data-bs-target="#formNewUser" data-bs-toggle="modal">AGREGAR NUEVO USUARIO</button>
</div>

<table class="table" style="text-align: center;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">IMAGEN</th>
      <th scope="col">USUARIO</th>
      <th scope="col">ROL</th>
      <th scope="col">EMAIL</th>
      <th scope="col">NOMBRE</th>
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
        <td><img src="<?php
                      if ($fila['imagen'] == null) {
                        echo 'img/usersprofile/nouser.png';
                      } else {
                        echo $fila['imagen'];
                      } ?>" alt="userprofile" width="80" height="80">
        </td>
        <td><?php echo $fila['idusuario']; ?></td>
        <td><?php echo $fila['username']; ?></td>
        <td><?php echo $fila['nombre_rol']; ?></td>
        <td><?php echo $fila['email']; ?></td>
        <td><?php echo $fila['nombre_usuario'] . " " . $fila['primer_apellido'] . " " . $fila['segundo_apellido']; ?></td>
        <td><?php if (!$fila['estado']) {
              echo 'INACTIVO';
            } else {
              echo 'ACTIVO';
            } ?></td>
        <td><button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#formEditUser" id="btnFormEditUser" name="btnFormEditUser"  ><i class="fas fa-edit"></i></button></td>
        <td><button type="button" class="btn btn-danger " id="btnDeleteUser" name="btnDeleteUser" onclick="DeleteUser(<?php echo $fila['idusuario']; ?>);"><i class="fas fa-user-minus"></i></button></td>
      </tr>
      <!--  onclick="EditUser(<?php #echo $fila['idusuario']; ?>);" -->
    <?php
    }
    ?>
  </tbody>
</table>


<!-- Modal para agregar nuevo usuario -->
<div class="modal fade" id="formNewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formNewUserLabel">Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="add_nombre_usuario" placeholder="Aqui va tu nombre">
          <label for="add_nombre_usuario">Nombre</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="add_primer_apellido" placeholder="Aqui va tu nombre">
          <label for="add_primer_apellido">Primer apellido</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="add_segundo_apellido" placeholder="Aqui va tu nombre">
          <label for="add_segundo_apellido">Segundo apellido</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="add_username" placeholder="Aqui va tu usuario">
          <label for="add_username">Usuario</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="add_password" placeholder="Aqui va tu contraseña">
          <label for="add_password">Contraseña</label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="add_email" placeholder="Aqui va tu email">
          <label for="add_email">Correo electrónico</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="add_telefono" placeholder="Aqui va tu correo">
          <label for="add_telefono">Teléfono</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" id="add_role_id" aria-label="Default select example">
            <option selected>Selecceiona un rol</option>
            <?php
            while ($row = mysqli_fetch_array($getRolesResult)) {
            ?>
              <option value="<?php echo $row['idrol']; ?>"> <?php echo $row['nombre_rol']; ?></option>
            <?php
            }
            ?>
          </select>
          <label for="add_role_id">Selecceiona un rol</label>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnAddNewUser">Agregar Usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal para editar un usuario -->
</div>
<div class="modal fade" id="formEditUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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