<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
ob_end_flush();
  if (isset($_FILES['archivo'])) {
    $allowedExts = array("jpg","jpeg","gif","png","JPG","GIF","PNG");
    $extension = end(explode(".", $_FILES["archivo"]["name"]));
    $data = array();

    if (
        (
          ($_FILES["archivo"]["type"] == "image/gif") || 
          ($_FILES["archivo"]["type"] == "image/jpeg") || 
          ($_FILES["archivo"]["type"] == "image/png") || 
          ($_FILES["archivo"]["type"] == "image/pjpeg")
        ) 
        && in_array($extension, $allowedExts)
      ){
        $extension = end(explode('.', $_FILES['archivo']['name']));     
        $archivo = $_FILES['archivo']['name'];

        move_uploaded_file($_FILES['archivo']['tmp_name'], '../../img/product'."/".$archivo);

        $data['resultado'] = 1;
      }
  } else {
    $data['resultado'] = 0;
  }
  echo json_encode($data);
?>