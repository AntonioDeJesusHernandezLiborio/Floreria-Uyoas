<?php
    include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $consulta = "INSERT INTO tblrol(rol_Descripcion)VALUES ('$Nombre');";
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
        $consulta = "UPDATE tblrol SET rol_Descripcion = '$Nombre' WHERE rol_intCodigo ='$Clave'";
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
        $consulta = "DELETE FROM tblrol WHERE rol_intCodigo = '$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }      
?>
