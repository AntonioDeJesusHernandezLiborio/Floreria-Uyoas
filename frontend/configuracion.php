<!DOCTYPE html>
<html>
<head>
	<title>Configuracion</title>
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/CRUDs/empleados.js"></script>
	<script type="text/javascript" src="../js/CRUDs/Rol.js"></script>
</head>
<body>
	<header>
		<?php include '../Menu.php' ?>
	</header>
    <!---
	<div class="container">
		<button class="btn btn-success" id="MostrarEmpleadosTB" >Mostrar lista de empleados</button>
	</div>
	<br>
	--->

	<div class="container text-muted" ><h4><center>EMPLEADOS</center></h4></div>
	<div class="container" id="Empleado1" >
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoEmpleado"">Nuevo Usuario</button>
						<div id="ExitoEmpleado" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
						<div id="errorEmpleado" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado.</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar empleado,Apellido,Domicilio,Telefono por nombre o codigo" aria-label="Search" id="searchEmpleado">
					</div>
				</div>
			</div>
			<center><h4>Lista de Empleados</h4></center>
			<div class="table-responsive tablaspaquetes">
				<table class="table table-striped table-bordered table-hover" id="tablaEmpleados">
					<tr class="success">
						<th>Nombre</th>
						<th>Apellido Materno</th>
						<th>Apellido Paterno</th>
						<th>Pago</th>
						<th>Telefono</th>
						<th>Direccion</th>
						<th>Usuario</th>
						<th>Rol</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
					<tbody id="Empleados">
					</tbody>
				</table>
			</div>
		</section>
	</div>
	<br>
	<br>
	<div class="container text-muted" ><h4><center> ROLES</center></h4></div>

    <!-- Modal nueva Empleado -->
	<div class="modal fade" id="nuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agrega Empleado</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_Empleado"><br>
				<div id="debeEscribirNombreEmple" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar un nombre</div>
			
				<label for="">Apellido Paterno:</label>
				<input class="form-control" type="text" id="AP_Empleado">
				<div id="debeEscribirAP" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar apellido</div>
			
				<label for="">Apellido Materno:</label>
				<input class="form-control" type="text" id="AM_Empleado">
				
				<div id="debeEscribirAM" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar un apellido</div>
			
				<label for="">Pago:</label>
				<input class="form-control" type="text" id="Pago_Empleado">
				
				<div id="debeEscribirPago" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar pago</div>
			
				<label for="">Telefono:</label>
				<input class="form-control" type="text" id="Telefono_Empleado">
				
				<div id="debeEscribirTelefono" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar numero de telefono valido</div>
			
				<label for="">Direccion:</label>
				<input class="form-control" type="text" id="Direccion_Empleado">
				
				<div id="debeEscribirDireccion" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar direccion valida</div>
			
				<label for="">Usuario:</label>
				<input class="form-control" type="text" id="usuario_Empleado">
				
				<div id="debeEscribirUsuario" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar usuario</div>
			
				<label for="">Clave:</label>
				<input class="form-control" type="text" id="clave_Empleado">
				
				<div id="debeEscribirClave" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar una clave</div>
				
				<label>Selecione tipo de empleado</label>
				<select name="categoria1" required id="Rol_EmpleadoE" class="form-control">
					<option value="" selected="">Seleccione una opcion</option>
				</select>
				
				<div id="debeEscribirRol" role="alert" class="alert alert-danger" style="display: none;">Debe seleccionar rol</div>
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarEmpleado">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>






	<!-- Editar Empleado -->
	<div class="modal fade" id="EditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar empleado</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	     <div class="modal-body">
	     	
				<label for="">Codigo:</label>
				<input class="form-control" type="text" id="Codigo_Empleado" disabled><br>
			
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_EmpleadoE"><br>
				<div id="debeEscribirNombreEmpleE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar un nombre</div>
			
				<label for="">Apellido Paterno:</label>
				<input class="form-control" type="text" id="AP_EmpleadoE">
				<br>
				<div id="debeEscribirAPE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar apellido</div>
			
				<label for="">Apellido Materno:</label>
				<input class="form-control" type="text" id="AM_EmpleadoE">
				<br>
				<div id="debeEscribirAME" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar un apellido</div>
			
				<label for="">Pago:</label>
				<input class="form-control" type="text" id="Pago_EmpleadoE">
				<br>
				<div id="debeEscribirPagoE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar pago</div>
			
				<label for="">Telefono:</label>
				<input class="form-control" type="text" id="Telefono_EmpleadoE">
				<br>
				<div id="debeEscribirTelefonoE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar numero de telefono valido</div>
			
				<label for="">Direccion:</label>
				<input class="form-control" type="text" id="Direccion_EmpleadoE">
				<br>
				<div id="debeEscribirDireccionE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar direccion valida</div>
			
				<label for="">Usuario:</label>
				<input class="form-control" type="text" id="usuario_EmpleadoE">
				<br>
				<div id="debeEscribirUsuarioE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar usuario</div>
			
				<label for="">Clave:</label>
				<input class="form-control" type="text" id="clave_EmpleadoE">
				<label for="">Confirmar clave:</label>
				<input class="form-control" type="text" id="claveCon_EmpleadoE">
				<br>

				<div id="debeEscribirClaveE" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar una clava</div>
				<label>Selecione tipo de empleado</label>
				<select name="empleado1" required id="Rol_EmpleadoE1" class="form-control">
					<option value="" selected>Seleccione una opcion</option>
				</select>
				<br>
				<div id="debeEscribirRolE" role="alert" class="alert alert-danger" style="display: none;">Debe seleccionar rol</div>
			
			  <div class="custom-control custom-checkbox">

			  	<input type="checkbox" class="custom-control-input" id="activo_Empleado">
			  	<label class="custom-control-label" for="activo_Empleado">Activo</label>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarEmpleado">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<div class="modal" id="eliminarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenteredLabel">Eliminar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ¿Seguro que desea eliminar empleado?
	        <br>
	        <div class="form-group">
				<label for="">Codigo:</label>
				<input class="form-control" type="text" id="Codigo_EmpleadoElimiar" disabled style="display: none;"><br>
			</div>
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_EmpleadoElimiar" disabled ><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarEmpleado">SI</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-------- ROLES---------------------------------------------------->
	<!---------------------------------------- ROL ----------
	<div class="container">
		<button class="btn btn-success" id="MostrarRolesTB" >Mostrar Roles</button>
	</div>
	<br>
	------------------------------------>

	<div class="container" id="Roles1">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-8">
						<button class="btn btn-primary" data-toggle="modal" data-target="#nuevoRol">Nuevo Rol</button>
						<div id="ExitoRol" role="alert" class="alert alert-success" style="display: none;">Registro realizado con exito.</div>
						<div id="errorRol" role="alert" class="alert alert-warning" style="display: none;">Registro no realizado, el rol ya existe</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-4">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar rol por nombre o codigo" aria-label="Search" id="search">
					</div>
				</div>
			</div>
			<center><h4>Lista de roles</h4></center>
			<div class="table-responsive tablaspaquetes" >
				<div class="panel panel-default">
					<div class="panel-body"></div>
						<table class="table table-striped table-bordered table-hove" id="tablaRoles">
							<thead>
								<tr class="success">
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="Roles">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</article>
	</div>
	<br>






	<!-- Modal Nuevo Arreglo -->
	<div class="modal fade" id="nuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Rol</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreRol" required>
				<br>
				<div id="debeEscribirNombre" role="alert" class="alert alert-danger" style="display: none;">Debe ingresar un nombre</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarRol">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Editar Arreglo -->
	<div class="modal fade" id="EditarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar Rol</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		        <label for="">Codigo:</label>
		        <input class="form-control" type="text" id="claveEditarRol" disabled>
		    </div>
		    <div class="form-group">
		    	<label for="">Nombre:</label>
				<input class="form-control" type="text" id="nombreEditarRol" required>
				<div id="exitoEditarRol" role="alert" class="alert alert-warning" style="display: none;">Debe ingresar un nombre</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizarRol">Confirmar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal" id="eliminarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenteredLabel">Eliminar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ¿Seguro que desea eliminar este rol?
	        <br>
	        <div class="form-group">
				<label for="">Codigo:</label>
				<input class="form-control" type="text" id="Codigo_RolElimiar" disabled style="display: none;"><br>
			</div>
			Asegurese de que ningun empleado tenga este rol.
	        <div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" type="text" id="Nombre_RolElimiar" disabled style="display: none;"><br>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btneliminarRol">SI</button>
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