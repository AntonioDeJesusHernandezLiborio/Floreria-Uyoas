<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $consulta = "INSERT INTO tbljardinera(jardinera_vchNombre)VALUES('$Nombre');";
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
        $consulta = "UPDATE tbljardinera SET jardinera_vchNombre='$Nombre' WHERE jardinera_intCodigo='$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{2
            echo '1';
        }
    }
     if($Tipo=='3'){
        $Clave = $_POST["clave"];
        $consulta = "DELETE FROM tbljardinera WHERE jardinera_intCodigo=$Clave'";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>