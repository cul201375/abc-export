<?php 
    include_once(RAIZ_APLICACION."/functions.php");
    class UsuariosClass{
        #funcion para listar los usuarios

        public function listadoUsuarios()
        {
            $conexionClass = new ConnectionClass();
            $conexion = $conexionClass -> conectar();

            mysqli_query($conexion,"SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                $sqlGetUsers = "SELECT u.imagen, u.idusuario, r.nombre_rol, u.username, u.email, u.nombre_usuario, u.primer_apellido,
                u.segundo_apellido, u.estado FROM usuario AS u, rol AS r WHERE r.idrol = u.fk_idrol; ";

                $result = mysqli_query($conexion, $sqlGetUsers);

                if($result){
                    return $result;
                    $conexionClass->desconectar($conexion);
                }
                else{
                    return $error['error'] = 0;
                    $conexionClass->desconectar($conexion);
                }
            }
        }

        #funcion para obtener los roles de los usuarios

        public function getRolesFromUsers()
        {
            $conexionClass = new ConnectionClass();
            $conexion = $conexionClass -> conectar();
            
            if (!$conexion) {
                die("Conexion fallida por: ".mysqli_connect_error());
            } else {
                $sqlGetRoles = "SELECT idrol, nombre_rol FROM rol;";

                $result = mysqli_query($conexion, $sqlGetRoles);

                if ($result) {
                    return $result;
                    $conexionClass -> desconectar($conexion);
                } else {
                    return $error["error"] = 0;
                    $conexionClass -> desconectar($conexion);
                }
            }
            
        }
        
        #funcion para agregar un nuevo rol

        public function createNewRol($nombre_rol, $descripcion)
        {
            $sqlInsertRol = "INSERT INTO rol (nombre_rol, descripcion, estado) VALUES ('$nombre_rol', '$descripcion', 1);";
            $conexionClass = new ConnectionClass();
            $conexion = $conexionClass -> conectar();

            $result = mysqli_query($conexion, $sqlInsertRol);

            if($result){
                return 1;
                $conexionClass -> desconectar($conexion);
            }
            else{
                return 0;
            }
        }

        #funcion para añadir un nuevo usuario
        public function addNewUser($idrol, $username, $imagen, $password, $email, $nombre_usr, $primer_apellido, $segundo_apellido)
        {
            $sqlAddNewUser = "INSERT INTO usuario ('fk_idrol', 'username', 'imagen', 'password', 'email', 'nombre_usuario', 'primer_apellido', 'segundo_apellido', 'estado') 
            VALUES ($idrol, '$username', '$imagen', '$password', '$email', '$nombre_usr', '$primer_apellido', '$segundo_apellido', 1);";

            $conexionClass = new ConnectionClass();
            $conexion = $conexionClass -> conectar();

            $result = mysqli_query($conexion, $sqlAddNewUser);

            if($result){
                return 1;
                $conexionClass -> desconectar($conexion);
            }
            else{
                return 0;
                $conexionClass -> desconectar($conexion);
            }
        }

        #funcion para cargar el usuario en el modal de edición
        public function loadUserToModal()
        {
            
            $sqlGetUsers = "SELECT u.imagen, u.idusuario, r.nombre_rol, u.username, u.email, u.nombre_usuario, u.primer_apellido,
            u.segundo_apellido, u.estado FROM usuario AS u, rol AS r WHERE r.idrol = u.fk_idrol; ";

            $conexionClass = new ConnectionClass();
            $conexion = $conexionClass -> conectar();

            $result = mysqli_query($conexion, $sqlGetUsers);

            if($result){
                return json_encode($result);
                $conexionClass -> desconectar($conexion);
            }
            else{
                $result['resultado'] = 0;
                return $result;
                $conexionClass -> desconectar($conexion);
            }
        }
    }

?>