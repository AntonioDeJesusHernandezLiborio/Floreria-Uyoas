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
				<!-- Boton para abrir modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#abrirModal" id="nuevoProducto1">Agregar Producto</button>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
				<input class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre,codigo,tipo" aria-label="Search" id="searchProductos">
			</div>
		</div>
	</div>

		
	<!-- agregamos el container -->
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
		<div id="ExitoProducto" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
		<div id="errorProducto" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado, el producto ya existe</div>
		<h1 class="text-muted">Lista de productos registrados</h1>
	</div>
	<div class="container">
		<!-- Tabla de prodcutos -->
		<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover tablaspaquetes" id="tablaProductos">
						<tr class="success">
							<th><h6>Codigo</h6></th>
							<th><h6>Nombre</h6></th>
							<th><h6>Precio</h6></th>
							<th><h6>Ganancia</h6></th>
							<th><h6>Tipo de producto</h6></th>
							<th><h6>Activo</h6></th>
							<th><h6>Acciones</h6></th>
						</tr>
						<tbody id="productos">
						</tbody>
					</table>
				</div>
		</div>
	</div>


<!---------------------------------------PRODUCTO--------------------------------------------->
<!------- agregar nuevo producto-->
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
								<div id="debePonerNombre" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar campo</div>
								</div>
						        <div class="form-group">
						        	<label for="">Precio:</label>
						        	<input class="form-control" type="text" id="precio_Producto" >
						        	<div id="debePonerPrecio" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar precio</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Ganancia:</label>
						        	<input class="form-control" type="text" id="ganancia_Producto">
						        	<div id="debePonerGanancia" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar ganancia</div>
						        </div>
						        <div class="form-group">
						        	<label for="">Tipo:</label>
									<select name="tipoarrelgo" required id="tipoarreglo1" class="form-control">
										<option value="" selected="">Seleccione tipo de arreglo</option>
									</select>
									<div id="iduser11" value="<?php echo $TIPO ?> " style="display: none;"><?php echo $TIPO ?></div>
								<br>
								<div class="form-group" >
									<label for="">Seleccione las categorias:</label>
									<ul style="list-style: none;" id="cetegorias">

										
									</ul>
						        	<div id="debePonerTipo" role="alert" class="alert alert-warning" style="display: none;">Debe selecionar tipo arreglo</div>
								</div>				
						</div>
					</div>
		      	</div>
		      	<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarProducto">Guardar</button>
				 </div>
		    </div> 
		  </div>
	</div>
</div>
	<br>
	<br>
	<!-- MODAL PARA EDITAR PRODUCTO -->
	<div class="modal" id="editarProducto" >
		<div class="modal-dialog modal-xl">
		  	<div class="modal-content">
		    	<div class="modal-header">
		        	<h5 class="modal-title" >Editar Producto</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
		      	</div>
		      	<div class="modal-body">
			        <div class="container">
			        	<div class="row">
			        		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-6">
			        			<div class="col-md-12">
								<div id="respuesta"></div>
									<div class="form-group">
									<input class="form-control" type="text" id="codigo_ProductoE" style="display: none;">
									<br>
									
						        	<label for="">Nombre:</label>
									<input class="form-control" type="text" id="nombre_ProductoE">
									<br>
									<div id="debePonerNombreE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar campo</div>
									
							        
							        	<label for="">Precio:</label>
							        	<input class="form-control" type="text" id="precio_ProductoE" >
							        	<br>
							        	<div id="debePonerPrecioE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar precio</div>
							        
							        	<label for="">Ganancia:</label>
							        	<input class="form-control" type="text" id="ganancia_ProductoE">
							        	<br>
							        	<div id="debePonerGananciaE" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar ganancia</div>
							     
							        
							        	<label for="">Tipo:</label>
										<select name="tipoarrelgo" required id="tipoarreglo1E" class="form-control">
											<option value="" selected="">Seleccione tipo de arreglo</option>
										</select>
										<div id="iduser11" value="<?php echo $TIPO ?>" style="display: none;"><?php echo $TIPO ?></div>
									<br>
							        	<div id="debePonerTipoE" role="alert" class="alert alert-warning" style="display: none;">Debe selecionar tipo arreglo</div>
									
									 <div class="custom-control custom-checkbox">
									  	<input type="checkbox" class="custom-control-input" id="activo_Producto">
									  	<label class="custom-control-label" for="activo_Producto">Activo</label>
									  	<br>
									</div>
									<center>
										<button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarProducto">Guardar</button>
									</center>
									<div class="form-group">
							        	<label for="">Fecha Creacion:</label>
							        	<input class="form-control" type="text" id="fechaCreacion_Producto" disabled>
							        	<label for="">Empleado Creacion:</label>
							        	<input class="form-control" type="text" id="empleadoCracion_Producto" disabled>
							        	<label for="">Fecha Modificacion:</label>
							        	<input class="form-control" type="text" id="fechaModificacion_Producto" disabled>
							        	<label for="">Empleado Modificacion:</label>
							        	<input class="form-control" type="text" id="empleadoModificacion_Producto" disabled>
							        	<label for="">Fecha Eliminacion:</label>
							        	<input class="form-control" type="text" id="fechaEliminacion_Producto" disabled>
							        	<label for="">Empleado Eliminacion:</label>
							        	<input class="form-control" type="text" id="empleadoEliminacion_Producto" disabled>
							        </div>
							    </div>
			        		</div>
			        	</div>
			        	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-6">
			        		<form action="" id="insertar-imagenes" enctype="multipart/form-data">
								<div class="form-group">
									<!--<input type="text" name="imagen_producto1" id="imagen_producto1"  class="form-control"> -->
									<input type="text" name="imagen_producto1" id="imagen_producto1" style="display: none;" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Agregar nueva foto</label>
									<input type="file" name="imagen_producto"  id="imagenn" class="form-control btn btn-secundary" required>
								</div>
								<br>
								<div class="form-group">
									<center>
										<img src="" id="imagen" width="200" height="200" class="img-responsive img-thumbnail">
									</center>
								</div>
							</form>
								<!--<input type="submit" class="form-control btn btn-primary"> -->
								<center>
									<button type="button" class="btn btn-outline-success" id="agregarfoto"  disabled="disabled">Guardar Foto</button>
								</center>
								<br>
								<div class="form-group">
									<table class="table table-striped table-bordered table-hover tablasImagenes"  id="tablaProductos">
										<tr class="success">
										
										</tr>
										<tbody id="cargaImagenes">
										</tbody>
									</table>
								</div>
								<div class="container">
									<center>Categorias</center>
									<div class="row">
				        				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-6">
				        					<div class="form-group" >
												<label for="">Seleccione las categorias:</label>
												<ul style="list-style: none;" id="cetegoriasEditar">
												</ul>
									        	<div id="debePonerTipo" role="alert" class="alert alert-warning" style="display: none;">Debe selecionar tipo arreglo</div>
											</div>	
			        					</div>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="modal" id="eliminarFotooo" >
							  <div class="modal-dialog modal-dialog-centered" >
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title">Eliminar</h5>
							       
							      </div>
							      <div class="modal-body">
							         <h3> ¿Seguro que desea eliminar la foto?</h3>
							        <div class="form-group">
										<input class="form-control" type="text" id="Codigo_FotoEliminar" style="display: none;"><br>
									</div>
							   
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary"  id="cerrarModalNoEliminado">NO</button>
							        <button type="button" class="btn btn-primary" id="cerrarModalEliminado">SI</button>
							      </div>
							    </div>
							  </div>
							</div>
			        	</div>
			    	</div>
				</div>
			</div>
		</div>
	</div>
	<!---------------------------eliminacion -->

	<div class="modal" id="eliminarProductoM" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenteredLabel">Eliminar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	         <h3>Seguro que desea eliminar este registro?</h3>
	        <br>
	        <div class="form-group">
				<label for="" style="display: none;" >Codigo:</label>
				<input class="form-control" type="text" id="Codigo_ProductoEliminar" style="display: none;"  disabled><br>
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



	<footer>
		<div class="container">
			<h4>
				 &copy;copyright Uyoa'S Arte Floral 2019-2020 todos los derechos reservados
			</h4>
		</div>
	</footer>
</body>
</html>