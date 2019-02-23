<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombre"];
        $consulta ="INSERT INTO tblunidades(uni_nvchDescripcion)VALUES ('$Nombre');";
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
        $consulta = "UPDATE tblunidades SET uni_nvchDescripcion = '$Nombre' WHERE uni_intCodigo = '$codigo';";
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
        $consulta = "DELETE FROM tblunidades WHERE uni_intCodigo = '$Clave';";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>