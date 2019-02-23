<?php 
include ("conexion.php");

   
    $clave = $_POST["clave"];

    $consulta = "DELETE FROM `tblimagenes` WHERE `img_intCodigo` = '$clave';";

    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado)
    {
        echo 'Error';
    }{
        echo $resultado;
    }
?>