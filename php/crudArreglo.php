<?php
    include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $consulta = "INSERT INTO tblarreglos(arreglo_vchNombre)VALUES('$Nombre');";
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
        $consulta = "UPDATE tblarreglos SET arreglo_vchNombre='$Nombre' WHERE arreglo_intCodigo='$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }    
?>
