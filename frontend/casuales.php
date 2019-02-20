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
<html>
<head>
	<title>Casuales</title>
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/CRUDs/productos.js"> </script>
	<!--<script type="text/javascript" src="../js/CRUDs/imagen.js"></script> -->
</head>
<body>
<header>
		<?php include '../Menu.php' ?>
</header>

	<div class="container">
		<div class="row">
			<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-8 col-md-4">
				<button class="btn btn-primary" data-toggle="modal" data-target="#abrirModal" id="nuevoProducto1">Agregar Producto</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
				<input class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre,codigo,tipo" aria-label="Search" id="searchProductos">
			</div>
		</div>
	</div>

	<div class="">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
		<div id="ExitoProducto" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
		<div id="errorProducto" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado, el producto ya existe</div>
		<h1 class="text-muted">Lista de productos registrados</h1>
	</div>
	<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover tablaspaquetes" id="tablaProductos">
					<tr class="success">
						<th><h6>Codigo</h6></th>
						<th><h6>Nombre</h6></th>
						<th><h6>Precio</h6></th>
						<th><h6>Ganancia</h6></th>
						<th><h6>Tipo de producto</h6></th>
						<th><h6>Fecha Cracion</h6></th>
						<th><h6>Fecha Modificacion</h6></th>
						<th><h6>Fecha eliminacion</h6></th>
						<th><h6>Empleado Creacion</h6></th>
						<th><h6>Empleado Modificacion</h6></h6></th>
						<th><h6>Empleado Eliminacion</h6></th>
						<th><h6>Activo</h6></th>
						<th><h6>Acciones</h6></th>
					</tr>
					<tbody id="productos">
					</tbody>
				</table>
			</div>
	</div>


<!---------------------------------------PRODUCTO--------------------------------------------->
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
								<div class="form-group">
					        	<label for="">Nombre:</label>
								<input class="form-control" type="text" id="nombre_Producto">
								<br>
								<div id="debePonerNombre" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar campo</div>
								</div>
						        <div class="form-group">
						        	<label for="">Precio:</label>
						        	<input class="form-control" type="text" id="precio_Producto" >
						        	<br>
						        	<div id="debePonerPrecio" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar precio</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Ganancia:</label>
						        	<input class="form-control" type="text" id="ganancia_Producto">
						        	<br>
						        	<div id="debePonerGanancia" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar ganancia</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Tipo:</label>
									<select name="tipoarrelgo" required id="tipoarreglo1" class="form-control">
										<option value="" selected="">Seleccione tipo de arreglo</option>
									</select>
									<div id="iduser11" value="<?php echo $TIPO ?>"><?php echo $TIPO ?></div>
								<br>
						        	<div id="debePonerTipo" role="alert" class="alert alert-warning" style="display: none;">Debe selecionar tipo arreglo</div>
							</div>					
						</div>
					</div>
		      	</div>
		      	<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarProducto">Confirmar</button>
		      </div>
		    </div> 
		  </div>
	</div>
	<br>
	<br>

	<div class="modal fade" id="editarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Editar Producto</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      		<div class=""> 
						<div class="col-md-12">
							<div id="respuesta"></div>
								<div class="form-group">
					        	<label for="">Codigo:</label>
								<input class="form-control" type="text" id="codigo_ProductoE" disabled>
								<br>
								<div class="form-group">
					        	<label for="">Nombre:</label>
								<input class="form-control" type="text" id="nombre_ProductoE">
								<br>
								<div id="debePonerNombreE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar campo</div>
								</div>
						        <div class="form-group">
						        	<label for="">Precio:</label>
						        	<input class="form-control" type="text" id="precio_ProductoE" >
						        	<br>
						        	<div id="debePonerPrecioE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar precio</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Ganancia:</label>
						        	<input class="form-control" type="text" id="ganancia_ProductoE">
						        	<br>
						        	<div id="debePonerGananciaE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar ganancia</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Tipo:</label>
									<select name="tipoarrelgo" required id="tipoarreglo1E" class="form-control">
										<option value="" selected="">Seleccione tipo de arreglo</option>
									</select>
									<div id="iduser11" value="<?php echo $TIPO ?>"><?php echo $TIPO ?></div>
								<br>
						        	<div id="debePonerTipoE" role="alert" class="alert alert-warning" style="display: none;">Debe selecionar tipo arreglo</div>
								</div>
								</div>
								 <div class="custom-control custom-checkbox">
								  	<input type="checkbox" class="custom-control-input" id="activo_Producto">
								  	<label class="custom-control-label" for="activo_Producto">Activo</label>
								</div>					
						</div>
					</div>
		      	</div>
		      	<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarProducto">Confirmar</button>
		      </div>
		    </div> 
		  </div>
	</div>
	<!---------------------------eliminacion -->
	<div class="modal" id="eliminarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenteredLabel">Eliminar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ¿Seguro que desea eliminar este registro?
	        <br>
	        <div class="form-group">
				<label for="">Codigo:</label>
				<input class="form-control" type="text" id="Codigo_ProductoEliminar" disabled><br>
			</div>
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_ProductoEliminar" disabled><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarProducto">SI</button>
	      </div>
	    </div>
	  </div>
	</div>
<!---------------FOTOOOOOOOOS------------------------------------->

<div class="modal fade" id="Fotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Fotos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<div class=""> 
					<div class="col-md-12">
						<div id="respuesta"></div>
						<form action="" id="insertar-imagenes" enctype="multipart/form-data">
							<div class="form-group">
					        	<label for="">Codigo:</label>
								<!--<input type="text" name="imagen_producto1" id="imagen_producto1"  class="form-control"> -->
								<input type="text" name="imagen_producto1" id="imagen_producto1"  class="form-control" required>
							</div>
							<div class="form-group">
								<label>Agregar nueva foto</label>
								<input type="file" name="imagen_producto"  id="imagenn" class="form-control btn btn-secundary" required>
							</div>
							<div class="form-group">
								<center>
									<img src="" id="imagen" width="700" class="img-responsive img-thumbnail">
								</center>
							</div>
							<!--<input type="submit" class="form-control btn btn-primary"> -->
							<center>
								<button type="button" class="btn btn-outline-success" data-dismiss="modal" id="agregarfoto" disabled="disabled">Guardar Foto</button>
							</center>
							<br>
							<br>
						</form>
					</div>
					<div class="form-group">
						<table class="table table-striped table-bordered table-hover" id="tablaProductos">
							<tr class="success">
								<th>Imagenes</th>
							</tr>
							<tbody id="cargaImagenes">
							</tbody>
						</table>
					</div>
				</div>
	      	</div>
	      	<div class="modal-footer">

	      </div>
	    </div> 
	  </div>
	</div>
	<br>
	<br>

</body>
</html>