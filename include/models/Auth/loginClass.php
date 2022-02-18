<?php
include_once(RAIZ_APLICACION."/functions.php");
class loginClass{

    #funcion para validar el login desde la base de datos
    function valida_login($username, $password){
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT * FROM usuario WHERE username = '$username' and password = '$password';";
        $resultado = mysqli_query($conexion, $sql);
        return $resultado;
        $conexionClass -> desconectar($conexion);
    }

    function cerrar_sesion (){
        session_start();
        session_destroy();
        header("location: ../../index.php");
        exit;
    }
}
?>