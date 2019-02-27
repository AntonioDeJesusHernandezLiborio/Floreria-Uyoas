<?php session_start();

    if(isset($_SESSION['user'])){
        
    }else{
    	//echo "No has iniciado sesión";
    	echo "<script>
                alert('No has iniciado sesión');
                window.location= 'url.php'
    	</script>";
    	
        header ('location: ../login.php');
    }
        
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>INICIO-Uyoa'S Arte Floral</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/nuevoBase.js"></script>
	<script type="text/javascript" src="../js/CRUDs/reportes.js"></script>
	</head>
<body>
	<header>
		<?php include '../Menu.php' ?>
	</header>


	<div class="container">
		<section class="main row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
				<p>
					<h1> Reportes Uyoa'S Arte Floral</h1 >
					<h3><br>
					<p><label>Seleccione el reporte a generar: </label>
						<select id="listaReportes" class="dropdown">
							<option id="opcReporteEmpleados">Empleados</option>
							<option id="opcReporteProductos">Productos</option>
							<option id="opcReporteAño">Reportes Año</option>
							<option id="opcReporteOtro">Otro</option>
						</select>

						<button id="btnGenerarReporte" class="btn btn-success">Generar</button>

						<button id="btnExportarPDF" class="btn btn-danger">Exportar a PDF</button>
					</p>
					<br>
					</h3>
				</p>
			</article>	
			<br>
		</section>
	</div>



	<!---- 					EMPLEADOS  				---->
	<br>
	<div class="container" id="reportetblEmpleados" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar empleado,Apellido,Domicilio,Telefono por nombre o codigo" aria-label="Search" id="searchEmpleado">
					</div>
				</div>
			</div>
			<center><h4>Lista de Empleados</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaEmpleados">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Apellido Materno</th>
						<th>Apellido Paterno</th>
						<th>Pago</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Rol</th>
						<th>Activo</th>
					</tr>
					<tbody id="Empleados">
					</tbody>
				</table>
			</div>
		</section>
	</div>
	<br>


	<!---- 					PRODUCTOS  				---->
	<br>
	<div class="container" id="reportetblProductos" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar empleado,Apellido,Domicilio,Telefono por nombre o codigo" aria-label="Search" id="searchEmpleado">
					</div>
				</div>
			</div>
			<center><h4>Lista de Productos</h4></center>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover tablaspaquetes" id="tablaProductos">
					<tr class="success">
						<th><h6>Codigo</h6></th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Ganancia</th>
						<th>Tipo de producto</th>
						<th>Fecha Cracion</th>
						<th>Fecha Modificacion</th>
						<th>Fecha eliminacion</th>
						<th>Empleado Creacion</th>
						<th><h6>Empleado Modificacion</h6></th>
						<th>Empleado Eliminacion</th>
						<th>Activo</th>
					</tr>
					<tbody id="productos">
					</tbody>
				</table>
			</div>
		</section>
	</div>
	<br>

	<!---- 					PRODUCTOS  				---->
	<br>
	<div class="container" id="reportetblVentasAño" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar empleado,Apellido,Domicilio,Telefono por nombre o codigo" aria-label="Search" id="searchEmpleado">
					</div>
				</div>
			</div>
			<center><h4>Lista de Productos</h4></center>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover tablaspaquetes" id="tablaProductos">
					<tr class="success">
						<th><h6>Codigo</h6></th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Ganancia</th>
						<th>Tipo de producto</th>
						<th>Fecha Cracion</th>
						<th>Fecha Modificacion</th>
						<th>Fecha eliminacion</th>
						<th>Empleado Creacion</th>
						<th><h6>Empleado Modificacion</h6></th>
						<th>Empleado Eliminacion</th>
						<th>Activo</th>
					</tr>
					<tbody id="ventasaño">
					</tbody>
				</table>
			</div>
		</section>
	</div>
	<br>

	<footer>
		<div class="container">
			<h4>s
				 &copy;copyright Uyoa'S Arte Floral 2019-2020 todos los derechos reservados
			</h4>
		</div>
	</footer>
   </body>
</html>