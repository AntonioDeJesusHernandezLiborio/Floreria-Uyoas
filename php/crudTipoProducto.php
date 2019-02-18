<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];

    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $consulta = "INSERT INTO tbltipoproducto(tipoP_nvchDescripcion) VALUES ('$Nombre');";
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
        $consulta = "UPDATE tbltipoproducto SET tipoP_nvchDescripcion = '$Nombre' WHERE tipoP_intCodigo = '$Clave';";
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
        $consulta = "DELETE FROM tbltipoproducto WHERE tipoP_intCodigo = '$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>