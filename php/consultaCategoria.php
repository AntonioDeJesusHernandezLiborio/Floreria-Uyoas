<?php
    include ("conexion.php");
    $consulta = "SELECT categ_intCodigo,categ_vchNombre FROM tblcategoria";
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