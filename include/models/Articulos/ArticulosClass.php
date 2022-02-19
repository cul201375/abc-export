<?php
include_once(RAIZ_APLICACION . "/functions.php");
class ArticuloClass
{
    #funcion para listar los usuarios

    public function listaArticulos()
    {
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        mysqli_query($conexion, "SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");

        if (!$conexion) {
            die("Conexion fallida por: " . mysqli_connect_error());
        } else {
            $sqlGetUsers = "SELECT a.*, c.nombre_categoria, p.nombre_proveedor FROM articulo as a, categoria as c, proveedor as p where a.fk_idproveedor = p.idproveedor and a.fk_idcategoria = c.idcategoria ORDER BY idarticulo;";

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

    #funcion para obtener los categorias de los articulos

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
    #funcion para añadir un nuevo usuario
    public function addNewArticulo($fk_idcategoria, $fk_idproveedor, $nombre_articulo, $imagen, $costo_articulo, $precio_venta, $presentacion, $sku, $volumen, $unidades)
    {
        $sqlAddArticulo = "INSERT INTO articulo (fk_idcategoria, fk_idproveedor, nombre_articulo, imagen, costo_articulo, precio_venta, presentacion, sku, volumen, unidades, estado)
        VALUES ($fk_idcategoria, $fk_idproveedor,'$nombre_articulo','img/product/$imagen', $costo_articulo, $precio_venta, '$presentacion', '$sku', $volumen, $unidades, 1);";

        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlAddArticulo);

        if ($result) {
            return 1;
            $conexionClass->desconectar($conexion);
        } else {
            return 0;
            $conexionClass->desconectar($conexion);
        }
    }

    #funcion para cargar el proveedor en el modal de edición
    public function loadProveedorToModal($idproveedor)
    {

        $sqlGetUsers = "SELECT * FROM proveedor WHERE u.idproveedor = $idproveedor;";

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

    #funcion para actualizar el proveedor
    public function UpdateProveedor( $idproveedor, $fk_idcategoria, $nombre_proveedor, $nit_proveedor, $email, $imagen, $direccion, $telefono, $estado)
    {
        $sqlUpdateUser = "UPDATE proveedor SET fk_idcategoria = $fk_idcategoria, nombre_proveedor = $nombre_proveedor, nit_proveedor = $nit_proveedor, email = $email, imagen = $imagen, direccion = $direccion, telefono = $telefono, estado = $estado WHERE idprooveedor = $idproveedor;";

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

    #funcion para eliminar un proveedor
    function deleteProveedor($idproveedor){
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass -> conectar();

        $sql = "DELETE FROM proveedor WHERE idproveedor = $idproveedor";

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
