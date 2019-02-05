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
		<?php include '../Menu.html' ?>
	</header>

	<!---------------------------------------- JARDINERA ---------------------------------------------->
	<div class="container">
		<center>
				<button class="btn btn-success" id="MostrarArregloTB" >Mostrar lista de arreglos</button>
		</center>
	</div>
	<br>
	<div class="container" id="Arreglo1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoArreglo">Nuevo Arreglo</button>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar arreglo por nombre o codigo" aria-label="Search" id="search">
					</div>
				</div>
			</div>
			<center><h4>Lista de arreglos</h4></center>
			<div class="table-responsive tablaspaquetes" >
				<div class="panel panel-default">
					<div class="panel-body"></div>
						<table class="table table-striped table-bordered table-hove" id="tablaArreglos">
							<thead>
								<tr class="success">
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="Arreglos">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</article>
	</div>
	<br>


	<!-- Modal Nuevo Arreglo -->
	<div class="modal fade" id="nuevoArreglo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Nuevo Arreglo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreArreglo">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarArreglo">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Editar Arreglo -->
	<div class="modal fade" id="EditarArreglo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Nombre Arreglo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		        <label for="">Codigo:</label>
		        <input class="form-control" type="text" id="claveEditar" disabled>
		    </div>
		    <div class="form-group">
		    	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditar">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarArreglo">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>






	<!----------------------------- 	Jardineras 		----------------------------------------------------->
	<div class="container">
		<center>
			<button class="btn btn-success" id="MostrarJardineraTB" >Mostrar lista de jardineras</button>
		</center>
	</div>
	<br>
	<div class="container" id="Jardinera1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoJardinera"">Nuevo Jardinera</button>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar jardinera por nombre o codigo" aria-label="Search" id="searchJardinera">
					</div>
				</div>
			</div>
			<center><h4>Lista de jardineras</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaJardineras">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="Jardinera">
					</tbody>
				</table>
			</div>
		</section>
	</div>
	<br>

    <!-- Modal nueva Jardinera -->
	<div class="modal fade" id="nuevoJardinera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Nueva Jardinera</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreJardinera">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarJardinera">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Editar Jardinera -->
	<div class="modal fade" id="EditarJardinera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Nombre Jardinera</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		        <label for="">Codigo:</label>
		        <input class="form-control" type="text" id="claveEditarJardinera" disabled>
			</div>
			<div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditarJardinera">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarJardinera">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!----------------------------BASES-------------------------------------------->
	<div class="container">
		<center>
			<button class="btn btn-success" id="MostrarBaseTB" >Mostrar lista de bases</button>
		</center>
	</div>
	<br>
	<div class="container" id="Bases1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoBase"">Nuevo Base</button>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar bases por nombre o codigo" aria-label="Search" id="searchBase">
					</div>
				</div>
			</div>
			<center><h4>Lista de jardineras</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaBases">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="Bases">
					</tbody>
				</table>
			</div>
		</section>
	</div>

    <!-- Modal nueva Base -->
	<div class="modal fade" id="nuevoBase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Nueva Jardinera</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="form-group">
					<label for="">Nombre:</label>
					<input class="form-control" type="text" id="nombreBases">
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarBases">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Modal Editar Base -->
	<div class="modal fade" id="EditarBases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Nombre Jardinera</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="">Codigo:</label>
	        	<input class="form-control" type="text" id="claveEditarBases" disabled>
	        </div>
	        <div class="form-group">
	        	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditarBases">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarBases">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<br>
	<!----------------------------------------------------------Alfombra------------------------------------------------------->
	<div class="container">
		<center>
			<button class="btn btn-success" id="MostrarAlfrombraTB" >Mostrar lista de Alfombras</button>
		</center>
	</div>
	<br>
	<div class="container" id="Alfombra1" style="display: none;">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoAlfombra"">Nuevo Base</button>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar Alfombra por nombre o codigo" aria-label="Search" id="searchAlfombra">
					</div>
				</div>
			</div>
			<center><h4>Lista de jardineras</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaAlfombra">
					<tr class="success">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<tbody id="Alfombras">
					</tbody>
				</table>
			</div>
		</section>
	</div>

    <!----------------------------------------------- Modal nueva alfombra ----------------------------------------------->
	<div class="modal fade" id="nuevoAlfombra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Nueva Alfombra</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="form-group">
					<label for="">Nombre:</label>
					<input class="form-control" type="text" id="nombreAlfombra">
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarAlfombra">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-------------------------------------------------- Modal Editar Alfoombra ---------------------------------------->
	<div class="modal fade" id="EditarAlfombra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Nombre Alfombra</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	        	<label for="">Codigo:</label>
	        	<input class="form-control" type="text" id="claveEditarAlfombra" disabled>
	        </div>
	        <div class="form-group">
	        	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditarAlfombra">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarAlfombra">Confirmar</button>
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