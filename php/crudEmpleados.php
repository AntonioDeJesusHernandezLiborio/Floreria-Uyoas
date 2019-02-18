<?php 
	include ("conexion.php");
    $Tipo = $_POST["tipo"];
    if($Tipo=='1'){
        $Nombre = $_POST["nombreEmpleado"];
        $AP = $_POST["AP"];
        $AM = $_POST["AM"];
        $pago = $_POST["pago"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $rol = $_POST["rol"];
        $passHash = password_hash($clave, PASSWORD_BCRYPT);
        
        $consulta ="INSERT INTO tblempleados(emple_nvchNombre,emple_vchAM,emple_vchAP,emple_ftlPago,emple_nvchTelefono,emple_vchDireccion,emple_vchUsuario,emple_nvchClave,emple_intIdRol,emple_bitActivo)VALUES ('$Nombre','$AM','$AP','$pago','$telefono','$direccion','$usuario','$passHash','$rol','1');";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
    if($Tipo=='2'){
        $codigo = $_POST["codigo_Empleado"];
        $Nombre = $_POST["nombreEmpleado"];
        $AP = $_POST["AP"];
        $AM = $_POST["AM"];
        $pago = $_POST["pago"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $rol = $_POST["rol"];
        $activo = $_POST["activo"];
        $passHash = password_hash($clave, PASSWORD_BCRYPT);
        $consulta = "UPDATE tblempleados SET emple_nvchNombre = '$Nombre',emple_vchAM = '$AM',emple_vchAP = '$AP',emple_ftlPago = '$pago',emple_nvchTelefono = '$telefono',emple_vchDireccion = '$direccion',emple_vchUsuario = '$usuario',emple_nvchClave = '$passHash',emple_intIdRol = '$rol',emple_bitActivo = '$activo' WHERE emple_intCodigo = '$codigo';";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    }
     if($Tipo=='3'){
        $Clave = $_POST["codigo_empleado"];
        $consulta = "DELETE FROM tblempleados WHERE `emple_intCodigo` = $Clave";
        $resultado = mysqli_query($conexion, $consulta);
        if (!$resultado)
        {
            echo '0';
        }{
            echo '1';
        }
    } 

?>