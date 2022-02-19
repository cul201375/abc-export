<?php
include_once(RAIZ_APLICACION . "/functions.php");
class ArticuloClass
{
    #funcion para listar los articulos

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
    #funcion para añadir un nuevo articulo
    public function addNewArticulo($fk_idcategoria, $fk_idproveedor, $nombre_articulo, $imagen, $costo_articulo, $precio_venta, $presentacion, $sku, $volumen, $unidades)
    {
        $sqlAddArticulo = "INSERT INTO articulo (fk_idcategoria, fk_idproveedor, nombre_articulo, imagen, costo_articulo, precio_venta, presentacion, sku, volumen, unidades, estado)
        VALUES ($fk_idcategoria, $fk_idproveedor,'$nombre_articulo','img/product/$imagen', $costo_articulo, $precio_venta, '$presentacion', '$sku', $volumen, $unidades, 1);";

        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        $result = mysqli_query($conexion, $sqlAddArticulo);

        if ($result) {
            $ingreso = new IngresosClass();

            $fk_idarticulo = mysqli_insert_id($conexion);
            $idusuario = $_SESSION['idusuario'];
            $fk_idingreso = $ingreso -> addIngreso($fk_idarticulo, $idusuario , $fk_idproveedor, $volumen);

            if($fk_idingreso){
                $hoy = getdate(); 
                $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
                $slqInserDetalleIngreso = "INSERT into detalle_ingreso (fk_idingreso, fk_idarticulo, fk_idusuario, fecha_ingreso) values ($fk_idingreso, $fk_idarticulo, $idusuario, '$fecha');";
                $result = mysqli_query($conexion, $slqInserDetalleIngreso);
                
                $conexionClass->desconectar($conexion);
                return 1;
            }
        } else {
            return 0;
            $conexionClass->desconectar($conexion);
        }
    }
}
