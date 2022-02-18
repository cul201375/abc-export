<?php
ob_start();
session_start();

include_once('../../include/functions.php');
$username = (isset($_POST['username'])) ? $_POST['username'] : "0";
$password = (isset($_POST['password'])) ? $_POST['password'] : "0";

$loginClass = new loginClass();

$resultado = $loginClass -> valida_login($username, $password);

if($fila = mysqli_fetch_array($resultado)){
    $_SESSION['idusuario']= $fila["idusuario"];
    $_SESSION['fk_idrol']= $fila["fk_idrol"];
    $_SESSION['username']= $fila["username"];
    $_SESSION['imagen'] = $fila['imagen'];
    $_SESSION['email']= $fila["email"];
    $_SESSION['nombre_usuario']= $fila["nombre_usuario"];
    $_SESSION['primer_apellido'] = $fila['primer_apellido'];
    $_SESSION['segundo_apellido'] = $fila['segundo_apellido'];
    

    $result = 1;
    $newdata['resultado'] = $result;

    echo json_encode($newdata);
   //header("location: ../../main.php");
}
else{
    $result = 0;

    $newdata['resultado'] = $result;

    echo json_encode($newdata);
    //echo "<script>alert('CREDENCIALES INVALIDAS'); history.back();</script>";
    //exit(-1);
}

ob_end_flush();
?>
