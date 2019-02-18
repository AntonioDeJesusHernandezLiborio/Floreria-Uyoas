<?php  
	include ("conexion.php");
    $consulta = "SELECT emple_intCodigo,emple_nvchNombre,emple_vchAM,emple_vchAP,emple_ftlPago,emple_nvchTelefono,emple_vchDireccion,emple_vchUsuario,emple_nvchClave,rol_Descripcion,emple_bitActivo,emple_intIdRol FROM tblempleados,tblrol WHERE rol_intCodigo = emple_intIdRol";
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
