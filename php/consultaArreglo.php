<?php
    include ("conexion.php");
    $consulta = "SELECT arreglo_intCodigo,arreglo_vchNombre FROM tblarreglos;";
    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado)
    {
        echo "No se pudo insertar";
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