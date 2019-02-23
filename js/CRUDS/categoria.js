$(document).ready(function() {
	

	cargarDatosCategoria();
	//validaciones de caja dando click se quita el alert
	$("#nombreEditar_Categoria").click(function(){
		$("#debeEscribirCategoriaEditar").hide();
	});


	var con=1;//variable para el conteo de ocultar y mostrar
	$("#MostrarCategoriaTB").click(function(){
		con = mostrarOcultarTablas(con);
	});

	//buscar en la tabla
	$("#searchCategoria").keyup(function(){
		 _this = this;
		 //con un foreach hacemos la busqueda dependiento  lo que contenga el texto
		 $.each($("#tablaCategoria tbody tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });

	//oculta el alerta de la validacion
	$("#nombre_Categoria").click(function(){
		$("#debeEscribirCategoria").hide();
	});

	//guarda la categoria
	$("#guardarCategoria").click(function(){

		var nombre = $("#nombre_Categoria").val();
		if(nombre==""){
			$("#debeEscribirCategoria").show();
			return false;
		}else{
			var valores = {"tipo":"1","nombre":$("#nombre_Categoria").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudCategoria.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoCategoria").text("Registro realizado con exito.");
						$("#ExitoCategoria").show();
						vaciarTablaCategoria();
						cargarDatosCategoria();
					}else{
						$("#ErrorCategoria").text("Registro no realizado, el rol ya existe");
						$("#ErrorCategoria").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreRol").val("");
				})
		}
	});

	$("#actualizarCategoria").click(function(){
		var nombre = $("#nombreEditar_Categoria").val();
		if(nombre==""){
			$("#debeEscribirCategoriaEditar").show();
			return false;
		}else{
			var valores = {"tipo":"2","nombre":$("#nombreEditar_Categoria").val(),"clave":$("#claveEditar_Categoria").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudCategoria.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoCategoria").text("Datos editados correctamente.");
						$("#ExitoCategoria").show();
						vaciarTablaCategoria();
						cargarDatosCategoria();
					}else{
						$("#ErrorCategoria").text("Error al editar el registro");
						$("#ErrorCategoria").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreEditar_Categoria").val("");
				})
		}
	});
	$("#btneliminarCategoria").click(function(){
		borrarCategoria();
	});

});


function pasarCategoria(categoria){
	var sp =categoria.split("+");
	//alert(sp[1]);
	$("#ExitoCategoria").hide();
	$("#ErrorCategoria").hide();
	$("#claveEditar_Categoria").val(sp[0]);
	$("#nombreEditar_Categoria").val(sp[1]);
}

//Vacia tabla de categoria
function vaciarTablaCategoria(){
	var Parent = document.getElementById("categorias");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}

//Oculta y muestra la tabla
function mostrarOcultarTablas(con){
	if(con==1){
		$("#Categoria1").show();
		$("#MostrarCategoriaTB").text("Ocultar lista de categoria");
		con=0;
	}else{
		$("#Categoria1").hide();
		$("#MostrarCategoriaTB").text("Mostrar lista de categoria");
		con=1;
	}
	return con;
}

//Carga datos en la tabla de categoria
function cargarDatosCategoria(){
	$.ajax(
	{	
		url:"../php/consultaCategoria.php",
		type:"GET",
		async:true
	}
	).done(function(data){
		var cadena= JSON.parse(data);
		for (var i = cadena.length - 1; i >= 0; i--) {
			var filaBases= cadena[i].categ_intCodigo+"+"+cadena[i].categ_vchNombre;
			var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].categ_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].categ_vchNombre+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarCategoria' onclick='pasarCategoria("+'"'+filaBases+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarCategoria' onclick='pasarCategoriaEliminar("+'"'+filaBases+'"'+")'>Eliminar</button></td></td></tr>";
			var nuevaFila = document.createElement("TR");
			nuevaFila.innerHTML=nuevoAlumno;
		 	document.getElementById("categorias").appendChild(nuevaFila);
		}
		
	}).fail(function(data){
		alert("Error en el servidor");
		console.log(data);
	})
}
function borrarCategoria(){
	$("#ExitoCategoria").hide();
	$("#ErrorCategoria").hide();
	var valores = {"tipo":"3","clave":$("#CodigoEliminar_Categoria").val()};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudCategoria.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				$("#ExitoCategoria").text("Eliminado correctamente");
				$("#ExitoCategoria").show();
				vaciarTablaCategoria();
				cargarDatosCategoria();
			}else{
				$("#ErrorCategoria").text("Error al eliminar, hay productos con esta categoria");
				$("#ErrorCategoria").show();
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
function pasarCategoriaEliminar(arreglo){
	var sp =arreglo.split("+");
	//alert(sp[1]);
	$("#ExitoCategoria").hide();
	$("#ErrorCategoria").hide();
	$("#CodigoEliminar_Categoria").val(sp[0]);
	$("#NombreEliminar_Categoria").val(sp[1]);
}
