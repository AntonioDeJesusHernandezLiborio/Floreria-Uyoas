<?php 
	//Mandamos a traer la conexion
	include ("conexion.php");
	//Recuperamos los datos por medio de post
	$claves = $_POST['clave'];
	// explode es como un split para romper strings
  	$claves = explode(",", $claves);
  	//aqui realizamos la consulta a sql server 
  	$sql = "SELECT MAX(pro_intCodigo)AS ULTIMO FROM tblproductos";
  	//realizamos la consulta y obtenemos los resultados
  	$result=mysqli_query($conexion,$sql);
  	//recorremos los resultados  para sacar el valor
  	$data=mysqli_fetch_array($result);
  	//Sacamos el valor en string
  	$hash = $data["ULTIMO"];
  	//Realizamos las multi-inserrciones
	for ($i=0; $i<count($claves)-1; $i++) { 

  		$consulta = "INSERT INTO tblproductoscategoria(prodcat_intCodCategoria,prodcat_intCodProducto) VALUES ('".$claves[$i]."','$hash');";

    	$resultado = mysqli_query($conexion, $consulta);
  	}

 ?>

 