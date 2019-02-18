<?php 
    include ("conexion.php");

   
    $clave = $_POST["imagen_producto1"];
    $imagen = $_FILES["imagen_producto"];

    $consulta = "INSERT INTO tblimagenes(img_nvchImagen,img_intCodigoProducto) 
    VALUES ('".md5($imagen["tmp_name"]).".jpg"."','$clave')";

    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado)
    {
        echo '0';
    }{
        echo $clave;
      
        $ruta= "C:/xampp/htdocs/UyoasArteFloral/Floreria-Uyoas/imagenes/".md5($imagen["tmp_name"]).".jpg";
     move_uploaded_file($imagen["tmp_name"],$ruta);
    }
 
?>

