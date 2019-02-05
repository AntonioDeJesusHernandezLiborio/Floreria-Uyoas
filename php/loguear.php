<?php
	require('conexion.php');

	$cnn = mysqli_connect("localhost","root","","dbuyoas");

	session_start();

	if (isset($_POST["user"]) && isset($_POST["pass"])) {
		
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		$sql = "CALL sp_login ('$user','$pass')";
		$result=mysqli_query($cnn,$sql);
		$num_row=mysqli_num_rows($result);
		
		if ($num_row=="1") {
			
			$data=mysqli_fetch_array($result);

			$_SESSION["user"]=$data["emple_vchUsuario"];
			echo "1";
			/*
			*/
		}else{
			echo "Error, no seas pendejo we!!";
		}
		
	}else{
		echo "Error we!! No mames!! Ya haz las cosas bien!!";
	}

?>