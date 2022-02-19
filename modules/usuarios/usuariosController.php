<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

$usuariosClass = new UsuariosClass();


$createUser = (isset($_POST['createUser'])) ? $_POST['createUser'] : "0";
$deleteUser = (isset($_POST['deleteUser'])) ? $_POST['deleteUser'] : "0";
$updateUser = (isset($_POST['updateUser'])) ? $_POST['UpdateUser'] : "0";
$confirmUpdateUser = (isset($_POST['confirmUpdateUser'])) ? $_POST['confirmUpdateUser'] : "0";
$addNewRol =  (isset($_POST['addNewRol'])) ? $_POST['addNewRol'] : "0";

if ($createUser == 1) {
    $fk_idrol = (isset($_POST['fk_idrol'])) ? $_POST['fk_idrol'] : "0";
    $username = (isset($_POST['username'])) ? $_POST['username'] : "0";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "0";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "0";
    $nombre_usuario = (isset($_POST['nombre_usuario'])) ? $_POST['nombre_usuario'] : "0";
    $primer_apellido = (isset($_POST['primer_apellido'])) ? $_POST['primer_apellido'] : "0";
    $segundo_apellido = (isset($_POST['segundo_apellido'])) ? $_POST['segundo_apellido'] : "0";

    $resultado = $usuariosClass->addNewUser($fk_idrol, $username, $password, $email, $nombre_usuario, $primer_apellido, $segundo_apellido);
    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if ($deleteUser == 1) {
    $user_id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";
    $resultado = $usuariosClass->deleteUser($user_id);
    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if ($addNewRol == 1) {
    $nombre_rol = (isset($_POST['nombre_rol'])) ? $_POST['nombre_rol'] : "0";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "0";

    $result = $usuariosClass->createNewRol($nombre_rol, $descripcion);

    $newdata['resultado'] = $result;

    echo json_encode($newdata);
}

ob_end_flush();
?>