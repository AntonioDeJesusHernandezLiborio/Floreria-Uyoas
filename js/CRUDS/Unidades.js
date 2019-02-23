$(document).ready(function () {
	var con=1;//variable para el conteo de ocultar y mostrar
	$("#MostrarUnidadesTB").click(function(){
		con = mostrarOcultarTablas1(con);
	});
	cargarDatosUnidades();

	//Validaciones
	$("#nombre_Unidad").click(function(){
		$("#debeEscribirUnidad").hide();
	});

	//guarda la unidades
	$("#guardarUnidades").click(function(){

		var nombre = $("#nombre_Unidad").val();
		if(nombre==""){
			$("#debeEscribirUnidad").show();
			return false;
		}else{
			var valores = {"tipo":"1","nombre":$("#nombre_Unidad").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudUnidades.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoUnidad").text("Registro realizado con exito.");
						$("#ExitoUnidad").show();
						vaciarTablasUnidades();
						cargarDatosUnidades();
					}else{
						$("#ErrorUnidad").text("Registro no realizado");
						$("#ErrorUnidad").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreRol").val("");
				})
		}
	});


	$("#nombreEditar_Unidad").click(function(){
		$("#debeEscribirUnidadEditar").hide();
	})
	//actualizarArreglo
	$("#actualizarUnidades").click(function(){
		var nombre = $("#nombreEditar_Unidad").val();
		if(nombre==""){
			$("#debeEscribirUnidadEditar").show();
			return false;
		}else{
			var valores = {"tipo":"2","nombre":$("#nombreEditar_Unidad").val(),"clave":$("#claveEditar_Unidad").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudUnidades.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoUnidad").text("Registro editado con exito.");
						$("#ExitoUnidad").show();
						vaciarTablasUnidades();
						cargarDatosUnidades();
					}else{
						$("#ErrorUnidad").text("Registro no editado");
						$("#ErrorUnidad").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreRol").val("");
				})
		}
	});

	$("#btneliminarUnidad").click(function(){
		borrarUnidad();
	})
});


function mostrarOcultarTablas1(con){
	if(con==1){
		$("#Unidades1").show();
		$("#MostrarUnidadesTB").text("Ocultar lista unidades");
		con=0;
	}else{
		$("#Unidades1").hide();
		$("#MostrarUnidadesTB").text("Mostrar lista unidades");
		con=1;
	}
	return con;
}

//Vaciar cajas de texto
function vaciarTablasUnidades(){
	var Parent = document.getElementById("unidades");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}

function cargarDatosUnidades(){
	$.ajax(
	{	
		url:"../php/consultaUnidades.php",
		type:"GET",
		async:true
	}
	).done(function(data){
		var cadena= JSON.parse(data);
		for (var i = cadena.length - 1; i >= 0; i--) {
			var filaBases= cadena[i].uni_intCodigo+"+"+cadena[i].uni_nvchDescripcion;
			var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].uni_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].uni_nvchDescripcion+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarUnidad' onclick='pasarUnidad("+'"'+filaBases+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarUnidad' onclick='pasarUnidadEliminar("+'"'+filaBases+'"'+")'>Eliminar</button></td></td></tr>";
			var nuevaFila = document.createElement("TR");
			nuevaFila.innerHTML=nuevoAlumno;
		 	document.getElementById("unidades").appendChild(nuevaFila);
		}
		
	}).fail(function(data){
		alert("Error en el servidor");
	})
}

function pasarUnidad(arreglo){
	var sp =arreglo.split("+");
	//alert(sp[1]);
	$("#ExitoUnidad").hide();
	$("#ErrorUnidad").hide();
	$("#claveEditar_Unidad").val(sp[0]);
	$("#nombreEditar_Unidad").val(sp[1]);
}

function pasarUnidadEliminar(arreglo){
	var sp =arreglo.split("+");
	//alert(sp[1]);
	$("#ExitoUnidad").hide();
	$("#ErrorUnidad").hide();
	$("#CodigoEliminar_Unidad").val(sp[0]);
	$("#NombreEliminar_Unidad").val(sp[1]);
}
function borrarUnidad(){
	$("#ExitoUnidad").hide();
	$("#ErrorUnidad").hide();
	var valores = {"tipo":"3","clave":$("#CodigoEliminar_Unidad").val()};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudUnidades.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				$("#ExitoUnidad").text("Registro eliminado con exito.");
				$("#ExitoUnidad").show();
				vaciarTablasUnidades();
				cargarDatosUnidades();
			}else{
				$("#ErrorUnidad").text("Ocurrio un error al eliminar.");
				$("#ErrorUnidad").show();
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}