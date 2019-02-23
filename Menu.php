<!DOCTYPE html>
<html>
<?php
		 $TIPO = $_GET['tipo'];
	?>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
	<div>
		<!--navbar-collapse navbar-expand-lg navbar-light bg-light navbar fixed-top --->
		<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="navbar1" >
			<nav class="container">
				<a href="#" class="navbar-brand">
					<img src="../logo/logo.png" alt="Logo de la empresa" width="150" height="auto">
					<br>
					<h6 class="text-muted">"Deja que las flores hablen por ti"</h6>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false" aria-label="Desplejar menú de navegación"><span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="menu-principal">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="indexadmin.php?tipo=<?php echo $TIPO ?>" class="nav-link">INICIO</a></li>
						<li class="dropdown"> 
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" >REGISTRAR<span class="caret"></span></a>
							<ul class="dropdown-menu"> 
								<li><a href="casuales.php?tipo=<?php echo $TIPO ?>" class="nav-link">PRODUCTOS</a></li>
								<li class="divider"></li>
								<li><a href="Paquete.php?tipo=<?php echo $TIPO ?>"class="nav-link">PAQUETES</a></li>
								<li class="divider"></li>
								<li><a href="default.php?tipo=<?php echo $TIPO ?>" class="nav-link">ARREGLO</a></li>
								<li><a href="Paquete.php?tipo=<?php echo $TIPO ?>" class="nav-link">JARDINERAS</a></li>
								<li><a href="Paquete.php?tipo=<?php echo $TIPO ?>" class="nav-link">ALFOMBRA</a></li>
								<li><a href="Paquete.php?tipo=<?php echo $TIPO ?>" class="nav-link">BASES</a></li>
							</ul>
						</li>
						<li class="nav-item"><a href="reporte.php?tipo=<?php echo $TIPO ?>" class="nav-link">REPORTES</a></li>
						<li class="nav-item"><a href="default.php?tipo=<?php echo $TIPO ?>" class="nav-link">PEDIDOS</a></li>
						<li class="nav-item"><a href="configuracion.php?tipo=<?php echo $TIPO ?>" class="nav-link">CONFIGURACION</a></li>
						<li class="nav-item"><a href="../php/logout.php" class="nav-link">CERRAR SESION</a></li>
						
					</ul>
				</div>
			</nav>
		</nav>
	</div>
		<!--- style="display: none;"--->
</html>