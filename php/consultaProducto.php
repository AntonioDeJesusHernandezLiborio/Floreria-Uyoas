<?php  
	include ("conexion.php");
    $consulta = "SELECT DISTINCT  
                `pro_intCodigo`,
                `pro_nvcNombre`,
                `pro_ftlPrecio`,
                `pro_ftlGanancia`,
                (SELECT `tipoP_nvchDescripcion` FROM tbltipoproducto WHERE `tipoP_intCodigo`=`pro_intCodigoTipoProducto`) AS 'tipo_producto',
                `pro_intCodigoTipoProducto`,
                `pro_dtFechaCreacion`,
                `pro_dtFechaModificacion`,
                `pro_dtFechaEliminacion`,
                (SELECT emple_nvchNombre FROM tblempleados WHERE emple_intCodigo=`pro_intCodigoEmpleadoCreacion`) AS 'usuario_cracion', 
                (SELECT emple_nvchNombre FROM tblempleados WHERE emple_intCodigo=`pro_intCodigoEmpleadoModificacion`) AS 'usuario_modificacion', 
                (SELECT emple_nvchNombre FROM tblempleados WHERE emple_intCodigo=`pro_intCodigoEmpleadoEliminacion`) AS 'usuario_eliminacion',
                `pro__bitActivo` 
                FROM `tblproductos`,tblempleados,tbltipoproducto";
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