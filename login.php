<?php
	session_start();
	if (isset($_SESSION["user"])){
		header("location:frontend/indexadmin.php");
	}
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Login - Uyoa'S</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"> </script>
	
	<script type="text/javascript" src="js/CRUDS/login.js"></script>
	</head>
<body>
	<div>
		<!--navbar-collapse navbar-expand-lg navbar-light bg-light navbar fixed-top --->
		<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="navbar1" >
			<nav class="container">
				<a href="#" class="navbar-brand">
					<img src="logo/logo.png" alt="Logo de la empresa" width="150" height="auto">
					<br>
					<h6 class="text-muted">"Deja que las flores hablen por ti"</h6>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false" aria-label="Desplejar menú de navegación"><span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="menu-principal">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="#" class="nav-link">INICIO</a></li>
						<li class="nav-item"><a href="login.php" class="nav-link">INICIAR SESION</a></li>
					</ul>
				</div>
			</nav>
		</nav>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1><p class="text-center">Login</p></h1>
				<div class="form-group">
					<label class="text-center" for="user">Usuario:</label>
					<input type="text" id="user" class="form-control" placeholder="Usuario">
					<!-- class="form-control" -->
				</div>
				<div class="form-group">
					<label class="text-center" for="pass">Contraseña:</label>
					<input type="password" id="pass" class="form-control" placeholder="Contraseña">
				</div>
				<div class="form-group">
					<input type="button" name="login" id="login" class="btn btn-success" value="Login">
				</div>
				<span id="result"></span>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	//alert("Debe funcionar backa!! -_-");
</script>