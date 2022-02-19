<?php
include_once(RAIZ_APLICACION . "/functions.php");
class IngresosClass
{
    #funcion para listar los usuarios

    public function addIngreso($fk_idarticulo, $fk_idusuairo, $fk_idproveedor, $cantidad)
    {
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        mysqli_query($conexion, "SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");

        if (!$conexion) {
            die("Conexion fallida por: " . mysqli_connect_error());
        } else {
            $sqlIsertIngreso = "INSERT INTO ingreso (fk_idarticulo, fk_idusuario, fk_idproveedor, cantidad, estado) 
            values ($fk_idarticulo, $fk_idusuairo, $fk_idproveedor, $cantidad, 1);";

            $result = mysqli_query($conexion, $sqlIsertIngreso);

            if ($result) {
                return $result;
                $conexionClass->desconectar($conexion);
            } else {
                return $error['error'] = 0;
                $conexionClass->desconectar($conexion);
            }
        }
    }

    #funcion para detallar los ingresos que se han hecho
    public function listaIngresos()
    {
        $conexionClass = new ConnectionClass();
        $conexion = $conexionClass->conectar();

        mysqli_query($conexion, "SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");

        if (!$conexion) {
            die("Conexion fallida por: " . mysqli_connect_error());
        } else {
            $slqListaIngreso = "SELECT u.idusuario, u.nombre_usuario, p.idproveedor, p.nombre_proveedor, a.idarticulo, a.nombre_articulo, d.fecha_ingreso 
            FROM detalle_ingreso d
            JOIN usuario u on u.idusuario = d.fk_idusuario 
            JOIN articulo a on a.idarticulo = d.fk_idarticulo 
            JOIN proveedor p JOIN ingreso i ON p.idproveedor = i.fk_idproveedor 
            WHERE i.idingreso = d.fk_idingreso;";

            $result = mysqli_query($conexion, $slqListaIngreso);

            if ($result) {
                return $result;
                $conexionClass->desconectar($conexion);
            } else {
                return $error['error'] = 0;
                $conexionClass->desconectar($conexion);
            }
        }
    }
}
?>