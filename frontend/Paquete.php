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
	<title>Administrador - Uyoa'S</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/CRUDs/tipoProducto.js"></script>
	<script type="text/javascript" src="../js/CRUDs/categoria.js"></script>
	<script type="text/javascript" src="../js/CRUDs/Unidades.js"></script>
	</head>
<body >
	<header>
		<?php include '../Menu.php' ?>
	</header>
	<!----------------------------TIPO PRODUCTO-------------------------------------------->
	<div class="container">
		<button class="btn btn-success" id="MostrarTipoProductoTB" >Mostrar tipo de productos</button>
	</div>
	<br>
	<div class="container" id="tipoProducto1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoTipoProducto"">Nuevo tipo producto</button>
						<div id="ExitoTipoProducto" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
						<div id="errorTipoProducto" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado.</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar bases por nombre o codigo" aria-label="Search" id="searchTipoProducto">
					</div>
				</div>
			</div>
			<center><h4>Tipos de productos</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaTipoProductos">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="tipoProductos">
					</tbody>
				</table>
			</div>
		</section>
	</div>

    <!-- Modal nueva tipo producto -->
	<div class="modal fade" id="nuevoTipoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega tipo producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="form-group">
					<label for="">Nombre:</label>
					<input class="form-control" type="text" id="nombre_TipoProducto" required>
					<br>
					<div id="debeEscribirTipoProducto" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarTipoProducto">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Modal Editar tipo producto -->
	<div class="modal fade" id="EditarTipoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar tipo producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="">Codigo:</label>
	        	<input class="form-control" type="text" id="claveEditar_tipoproducto" disabled>
	        </div>
	        <div class="form-group">
	        	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditar_tipoproducto" required>
				<div id="debeEscribirTipoProductoE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarTipoProducto">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!--- Eliminar tipo producto--->
	<div class="modal" id="eliminarTipoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
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
				<input class="form-control" type="text" id="Codigo_TipoProductoElimiar" disabled><br>
			</div>
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_TipoProductoElimiar" disabled><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarProducto">SI</button>
	      </div>
	    </div>
	  </div>
	</div>

<!-----------------------------------------------------  CATEGORIA ----------------------------------------------------------->
<div class="container">
		<button class="btn btn-success" id="MostrarCategoriaTB" >Mostrar categorias</button>
	</div>
	<br>
	<div class="container" id="Categoria1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoCategoria"">Nueva categoria</button>
						<div id="ExitoCategoria" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
						<div id="ErrorCategoria" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado.</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar bases por nombre o codigo" aria-label="Search" id="searchCategoria">
					</div>
				</div>
			</div>
			<center><h4>Categorias</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaCategoria">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="categorias">
					</tbody>
				</table>
			</div>
		</section>
	</div>

    <!--Nueva categoria -->
	<div class="modal fade" id="nuevoCategoria" tabindex="-1" role="dialo" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Categoria</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="form-group">
					<label for="">Nombre:</label>
					<input class="form-control" type="text" id="nombre_Categoria" required>
					<div id="debeEscribirCategoria" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarCategoria">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Editar Categoria -->
	<div class="modal fade" id="EditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar categoria</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="">Codigo:</label>
	        	<input class="form-control" type="text" id="claveEditar_Categoria" disabled>
	        </div>
	        <div class="form-group">
	        	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditar_Categoria" required>
				<div id="debeEscribirCategoriaEditar" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarCategoria">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>



	<!--- Eliminar categoria--->
	<div class="modal" id="eliminarCategoria" tabindex="-1" role="dialog" aria-hidden="true">
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
				<input class="form-control" type="text" id="CodigoEliminar_Categoria" disabled style="display: none;"><br>
			</div>
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="NombreEliminar_Categoria" disabled ><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarCategoria">SI</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!---------------------------------------------------------------- UNIDADES ------------------------------------------------------------->
	<div class="container">
		<button class="btn btn-success" id="MostrarUnidadesTB" >Mostrar Unidades</button>
	</div>

	<br>
	<div class="container" id="Unidades1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoUnidad"">Nueva categoria</button>
						<div id="ExitoUnidad" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
						<div id="ErrorUnidad" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado.</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar bases por nombre o codigo" aria-label="Search" id="searchCategoria">
					</div>
				</div>
			</div>
			<center><h4>Categorias</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaUnidades">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="unidades">
					</tbody>
				</table>
			</div>
		</section>
	</div>

    <!--Nueva categoria -->
	<div class="modal fade" id="nuevoUnidad" tabindex="-1" role="dialo" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Unidad</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="form-group">
					<label for="">Nombre:</label>
					<input class="form-control" type="text" id="nombre_Unidad" required>
					<div id="debeEscribirUnidad" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarUnidades">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Editar Categoria -->
	<div class="modal fade" id="EditarUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Unidad</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="" style="display: none;">Codigo:</label>
	        	<input class="form-control" type="text" id="claveEditar_Unidad" style="display: none;" disabled>
	        </div>
	        <div class="form-group">
	        	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditar_Unidad" required>
				<div id="debeEscribirUnidadEditar" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar nombre</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarUnidades">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>



	<!--- Eliminar categoria--->
	<div class="modal" id="eliminarUnidad" tabindex="-1" role="dialog" aria-hidden="true">
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
				<input class="form-control" type="text" id="CodigoEliminar_Unidad" disabled style="display: none;"><br>
			</div>
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="NombreEliminar_Unidad" disabled ><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarUnidad">SI</button>
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