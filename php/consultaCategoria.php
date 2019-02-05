<?php
    include ("conexion.php");
    $consulta = "SELECT`cate_intCodigo`,`cate_vchNombre` FROM `dbuyoas`.`tblcategoria` WHERE tblcategoria.`cate_bitActivo`='1'";
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