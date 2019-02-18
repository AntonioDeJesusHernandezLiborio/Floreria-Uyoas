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
	<title>Paquetes - Uyoa'S</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/CRUDs/arreglos.js"></script>
	<script type="text/javascript" src="../js/CRUDs/jardineras.js"></script>
	<script type="text/javascript" src="../js/CRUDs/bases.js"></script>
	<script type="text/javascript" src="../js/CRUDs/alfombra.js"></script>
	</head>
<body >
	<header>
		<?php include '../Menu.php' ?>
	</header>

	<!---------------------------------------- PRODUCTO ---------------------------------------------->
	<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-10">
		<button class="btn btn-primary" data-toggle="modal" data-target="#abrirModal" id="nuevoProducto1">Nuevo Producto</button>
	</div>
	<div class="modal fade" id="abrirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Guardar Producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<div class=""> 
					<div class="col-md-12">
						<div id="respuesta"></div>
						<form action="" id="insertar-productos" enctype="multipart/form-data">
							<div class="form-group">
				        	<label for="">Nombre:</label>
							<input class="form-control" type="text" name="nombre_Producto">
							</div>
							<div class="form-group">
					        	<label for="">Precio Proveedor:</label>
					        	<input class="form-control" type="text" name="precioProveedorProducto">
					        </div>
					        <div class="form-group">
					        	<label for="">Precio:</label>
					        	<input class="form-control" type="text" name="precio_Producto" >
					        </div>
					        <div class="form-group">
					        	<label for="">Ganancia:</label>
					        	<input class="form-control" type="text" name="ganancia_Producto">
					        </div>
							<div class="form-group">
								<input type="file" name="imagen_producto"  class="form-control btn btn-secundary" required>
							</div>
							<div class="form-group">
								<center>
									<img src="" id="imagen" width="200">
								</center>
							</div>
							<div class="form-group">
								<select name="categoria1" required id="categoria" class="form-control">
									<option value="" selected="">Seleccione una opcion</option>
								</select>
							</div>
							<input type="submit" class="form-control btn btn-primary">
						</form>
					</div>
				</div>
	      	</div>
	      	<div class="modal-footer">
	      </div>
	    </div> 
	  </div>
	</div>

	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
		<h1>Lista de productos registrados</h1>
		<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaAlfombra">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Precio Proveedor</th>
						<th>Precio</th>
						<th>Ganancia</th>
						<th>Fecha Cracion</th>
						<th>Fecha Modificacion</th>
						<th>Fecha eliminacion</th>
						<th>Empleado Creacion</th>
						<th>Empleado Modificacion</th>
						<th>Empleado Eliminacion</th>
						<th>Activo</th>
					</tr>
					<tbody id="productos">
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<h4>
				 &copy;copyright Uyoa'S Arte Floral 2019-2020 todos los derechos reservados
			</h4>
		</div>
	</footer>
</body>
</html>