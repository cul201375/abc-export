<?php
include_once(RAIZ_APLICACION . "/functions.php");
class ProveedorClass
{
    #funcion para listar los usuarios

    public function listaProveedores()
    {
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        mysqli_query($conexion, "SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");

        if (!$conexion) {
            die("Conexion fallida por: " . mysqli_connect_error());
        } else {
            $sqlGetUsers = "SELECT p.*, c.nombre_categoria FROM proveedor as p, categoria as c where p.fk_idcategoria = c.idcategoria ORDER BY idproveedor;";

            $result = mysqli_query($conexion, $sqlGetUsers);

            if ($result) {
                return $result;
                $conexionClass->desconectar($conexion);
            } else {
                return $error['error'] = 0;
                $conexionClass->desconectar($conexion);
            }
        }
    }

    #funcion para obtener los categorias de los proveedores

    public function getCategory()
    {
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        if (!$conexion) {
            die("Conexion fallida por: " . mysqli_connect_error());
        } else {
            $sqlGetRoles = "SELECT idcategoria, nombre_categoria FROM categoria;";

            $result = mysqli_query($conexion, $sqlGetRoles);

            if ($result) {
                return $result;
                $conexionClass->desconectar($conexion);
            } else {
                return $error["error"] = 0;
                $conexionClass->desconectar($conexion);
            }
        }
    }

    #funcion para agregar una nueva categoria

    public function createNewCategory($nombre_categoria, $descripcion)
    {
        $sqlIserti = "INSERT INTO categoria (nombre_categoria, descripcion, estado) VALUES ('$nombre_categoria', '$descripcion', 1);";
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlIserti);

        if ($result) {
            return 1;
            $conexionClass->desconectar($conexion);
        } else {
            return 0;
        }
    }

    #funcion para añadir un nuevo usuario
    public function addNewProveedor($idcategoria, $nombre_proveedor, $nit_proveedor, $email, $imagen, $direccion, $telefono)
    {
        $sqlAddNewUser = "INSERT INTO proveedor (fk_idcategoria, nombre_proveedor, nit_proveedor, email, imagen, direccion, telefono, estado) 
            VALUES ($idcategoria, '$nombre_proveedor', '$nit_proveedor', '$email', 'img/proveedores/$imagen', '$direccion', '$telefono', 1);";

        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlAddNewUser);

        if ($result) {
            return 1;
            $conexionClass->desconectar($conexion);
        } else {
            return 0;
            $conexionClass->desconectar($conexion);
        }
    }

    #funcion para cargar el usuario en el modal de edición
    public function loadUserToModal($idusuario)
    {

        $sqlGetUsers = "SELECT u.idusuario, u.fk_idrol, u.username, u.imagen, u.email, u.nombre_usuario, u.primer_apellido, u.segundo_apellido, r.nombre_rol, u.estado FROM usuario AS u, rol AS r WHERE u.idusuario = $idusuario AND u.fk_idrol = r.idrol;";

        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlGetUsers);

        if ($result) {
            return $result;
            $conexionClass->desconectar($conexion);
        } else {
            $result['resultado'] = 0;
            return $result;
            $conexionClass->desconectar($conexion);
        }
    }

    #funcion para actualizar el usuario
    public function updateUser($idusuario, $idrol, $username, $imagen, $password, $email, $nombre_usr, $primer_apellido, $segundo_apellido, $estado)
    {
        $sqlUpdateUser = "UPDATE usuario SET fk_idrol = $idrol, 
        username = $username, 
        imagen = $imagen, 
        password = $password, 
        email = $email, 
        nombre_usuario = $nombre_usr, 
        primer_apellido = $primer_apellido, 
        segundo_apellido = $segundo_apellido, 
        estado = $estado WHERE idusuario = $idusuario;";

        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlUpdateUser);

        if ($result) {
            return 1;
            $conexionClass->desconectar($conexion);
        } else {
            return 0;
            $conexionClass->desconectar($conexion);
        }
    }

    #funcion para eliminar un usuario
    function deleteUser($idusuario){
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass -> conectar();

        $sql = "DELETE FROM usuario WHERE idusuario = $idusuario";

        $resultado = mysqli_query($conexion, $sql);

        if($resultado){
            $conexionClass -> desconectar($conexion);
            return 1;
        }
        else{
            $conexionClass -> desconectar($conexion);
            return 0;
        }
       
    }

}
