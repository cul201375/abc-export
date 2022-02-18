<?php 
    class ConnectionClass{

        #funcion para conectar a la base de datos
        
        function conectar(){
            
            $conexion = mysqli_connect(SERVER, USER, PASS, DB);

            if($conexion){
                mysqli_query($conexion, "SET NAME 'utf8'");
                mysqli_set_charset($conexion, "utf8");
                return $conexion;
            }
            else{
                return mysqli_connect_error();
            }
        }
        function desconectar($conexion){
            $close = mysqli_close($conexion);
            if($close){
                return $close;
            }else{
                return null;
            }
        }
    }