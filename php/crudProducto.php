<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];

    if($Tipo=="1"){
        $nombre = $_POST["nombre_Producto"];
        $precio = $_POST["precio_Producto"];
        $ganancia = $_POST["ganancia_Producto"];
        $tipoproducto = $_POST["tipoA"];
        $usuario = $_POST["idusuario"];
        $consulta = "INSERT INTO tblproductos(pro_nvcNombre,pro_ftlPrecio,pro_ftlGanancia,pro_intCodigoTipoProducto,pro_dtFechaCreacion,pro_intCodigoEmpleadoCreacion,pro__bitActivo)VALUES ('$nombre','$precio','$ganancia','$tipoproducto',NOW(),'$usuario','1');";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
    if($Tipo=="2"){
        $clave = $_POST["clave"];
        $nombre = $_POST["nombre_Producto"];
        $precio = $_POST["precio_Producto"];
        $ganancia = $_POST["ganancia_Producto"];
        $tipoproducto = $_POST["tipoA"];
        $usuario = $_POST["idusuario"];
        $activo = $_POST["activo"];
        $consulta = "UPDATE `dbuyoas`.`tblproductos`
        SET `pro_nvcNombre` = '$nombre',
          `pro_ftlPrecio` = '$precio',
          `pro_ftlGanancia` = '$ganancia',
          `pro_intCodigoTipoProducto` = '$tipoproducto',
          `pro_dtFechaModificacion` = NOW(),
          `pro_intCodigoEmpleadoModificacion` = '$usuario',
          `pro__bitActivo` = '$activo'
        WHERE `pro_intCodigo` = '$clave';";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
    if($Tipo=="3"){
        $clave = $_POST["clave"];
        $consulta = " DELETE
        FROM `dbuyoas`.`tblproductos`
        WHERE `pro_intCodigo` = '$clave';";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }

?>