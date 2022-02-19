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
<!-- datatable listado de usuarios -->
<div style="padding: 10px;">
    <button type="button" class="btn btn-primary m-1" onclick="ShowContent('modules/roles/addNewRol.php');">AGREGAR NUEVO
        ROL</button>
    <button type="button" class="btn btn-secondary m-1" data-bs-target="#formNewUser" data-bs-toggle="modal">AGREGAR NUEVO
        USUARIO</button>
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
            <td><?php echo $fila['nombre_usuario'] . " " . $fila['primer_apellido'] . " " . $fila['segundo_apellido']; ?>
            </td>
            <td><?php if (!$fila['estado']) {
              echo 'INACTIVO';
            } else {
              echo 'ACTIVO';
            } ?></td>
            <td><button type="button" class="btn btn-warning " onclick="UpdateUser(<?php echo $fila['idusuario']; ?>);"
                    id="btnFormEditUser" name="btnFormEditUser"><i class="fas fa-edit"></i></button></td>
            <td><button type="button" class="btn btn-danger " id="btnDeleteUser" name="btnDeleteUser"
                    onclick="DeleteUser(<?php echo $fila['idusuario']; ?>);"><i class="fas fa-user-minus"></i></button>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<script src="js/usersManager.js"></script>