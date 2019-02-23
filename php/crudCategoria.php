<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
 
        $consulta ="INSERT INTO tblcategoria(categ_vchNombre)VALUES ('$Nombre');";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
    if($Tipo=='2'){
        $codigo = $_POST["clave"];
        $Nombre = $_POST["nombre"];

        $consulta = "UPDATE tblcategoria SET categ_vchNombre = '$Nombre' WHERE categ_intCodigo = '$codigo';";
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
        $consulta = "DELETE FROM tblcategoria WHERE categ_intCodigo = $Clave";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>