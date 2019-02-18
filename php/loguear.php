<?php
	require('conexion.php');

	$cnn = mysqli_connect("localhost","root","","dbuyoas");

	session_start();

	if (isset($_POST["user"]) && isset($_POST["pass"])) {
		
		$user = $_POST["user"];
		$pass = $_POST["pass"];

		$sql = "CALL SP_LOGIN('$user')";
		$result=mysqli_query($cnn,$sql);
		$num_row=mysqli_num_rows($result);
		
		if ($num_row=="1") {
			
			$data=mysqli_fetch_array($result);
			$hash = $data["emple_nvchClave"];
			if(password_verify($pass,$hash))
			{	
				$_SESSION["user"]=$data["emple_vchUsuario"];
	            echo $data["emple_intCodigo"]."-1";
			}else
			{
				echo "Contraseña incorrecta";
			}
			/*
			*/
		}else{
			echo "Usuario no existe";
		}
		
	}else{
		echo "Eror al iniciar sesion";
	}



?>
