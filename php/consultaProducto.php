<?php  
	include ("conexion.php");
    $consulta = "SELECT `pro_intCodigo`,`pro_vchNombre`, `pro_ftlPrecioProveedor`,`pro_ftlPrecio`,`pro_ftlGanancia`,`pro_dtFechaCreacion`,`pro_dtFechaModificacion`,`pro_dtFechaEliminacion`,`emple_vchNombre`,`pro_intIdUsuarioModificacion`,`pro_intIdUsuarioEliminar`,`pro_bitActivo` FROM tblproducto,tblempleados WHERE tblproducto.`pro_intIdUsuarioCreacion`=tblempleados.`emple_intCodigo`;";
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