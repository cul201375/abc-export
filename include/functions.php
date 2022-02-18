<?php
    require_once("config.php");
    if (DEBUG == "true"){
        ini_set('display_errors', 1);
    }
    else{
        ini_set("display_error", 0);
    }

    #clases de la capa de modelo de la db
    require_once("models/Connection/ConnectionClass.php");
    require_once("models/Auth/loginClass.php");
    require_once("models/Usuarios/UsuariosClass.php");
    #require_once("models/Articulos/ArticulosClass.php");
    #require_once("models/Ingresos/IngresosClass.php");
    #require_once("models/Egresos/EgresosClass.php");
    #require_once("models/Proveedores/ProveedoresClass.php");
?>