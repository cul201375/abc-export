<?php
session_start();
if (!$_SESSION['idusuario']){
    header("location: index.php");
}

include 'views/head.php';
include 'views/body.php';
include 'views/content.php';
include 'views/footer.php';

?>