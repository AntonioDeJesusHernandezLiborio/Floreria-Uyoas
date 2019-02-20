<?php
	include ("conexion.php");
	$codigo = $_POST['clave'];
    $consulta = "SELECT DISTINCT img_intCodigo,img_nvchImagen FROM tblImagenes,tblproductos WHERE img_intCodigoProducto='$codigo'";
    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado)
    {
        echo "No se pudo consultar";
    }{
        if($resultado==null){

        }else{
            while ($reg=mysqli_fetch_array($resultado)) {
                $vec[]=$reg;
            }
            $cadena=json_encode($vec);
            echo $cadena;
        }
    } 
?>