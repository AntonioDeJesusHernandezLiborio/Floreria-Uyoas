<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];

    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $precioProveedor = $_POST["precio_proveedor"];
        $ftlPrecio = $_POST["ftlprecio"];
        $ftlGanancia = $_POST["ftlganancia"];
        $idUsuario = $_POST["idUsuario"];

        $consulta = "INSERT INTO `dbuyoas`.`tblproducto`(`pro_vchNombre`,`pro_ftlPrecioProveedor`,`pro_ftlPrecio`,`pro_ftlGanancia`,`pro_dtFechaCreacion`,`pro_intIdUsuarioCreacion`,`pro_bitActivo`)VALUES ('$Nombre','$precioProveedor','$ftlPrecio','$ftlGanancia',NOW(),'$idUsuario','1');";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
    if($Tipo=='2'){
        $Clave = $_POST["clave"];
        $Nombre = $_POST["nombre"];
        $precioProveedor = $_POST["precio_proveedor"];
        $ftlPrecio = $_POST["ftlprecio"];
        $ftlGanancia = $_POST["ftlganancia"];
        $idUsuario = $_POST["idUsuario"];
        $consulta = "UPDATE tblproducto SET pro_vchNombre='$Nombre',pro_ftlPrecioProveedor='$precioProveedor',pro_ftlPrecio=' $ftlPrecio', pro_ftlGanancia='$ftlGanancia',pro_intIdUsuarioCreacion='$idUsuario' WHERE pro_intCodigo='$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
     if($Tipo=='3'){
        $Clave = $_POST["clave"];
        $consulta = "DELETE FROM tblproducto WHERE pro_intCodigo='$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>