$(document).ready(function()
{
	
	cargarDatos();

	$("#nuevoRol").click(function(){
		$("#ExitoRol").hide();
		$("#errorRol").hide();
	})
	$("#nuevoRol").click(function(){
		$("#ExitoRol").hide();
		$("#errorRol").hide();
	})


	$("#nombreRol").click(function(){
		$("#debeEscribirNombre").hide();
	})
	
	$("#btneliminarRol").click(function(){
		borrarRol();
	})

	$("#guardarRol").click(function(){

		var nombre = $("#nombreRol").val();
		if(nombre==""){
			$("#debeEscribirNombre").show();
			return false;
		}else{
			var valores = {"tipo":"1","nombre":$("#nombreRol").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudRol.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoRol").text("Registro realizado con exito.");
						$("#ExitoRol").show();
						vaciarArreglos();
						cargarDatos();
					}else{
						$("#errorRol").text("Registro no realizado, el rol ya existe");
						$("#errorRol").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreRol").val("");
				})
		}
	});


	//actualizarArreglo
	$("#actualizarRol").click(function(){
		var nombre = $("#nombreEditarRol").val();
		if(nombre==""){
			$("#exitoEditarRol").show();
			return false;
		}else{
			var valores = {"tipo":"2","nombre":$("#nombreEditarRol").val(),"clave":$("#claveEditarRol").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudRol.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoRol").text("Datos Editados correctamente.");
						$("#ExitoRol").show();
						vaciarArreglos();
						cargarDatos();
					}else{
						$("#errorRol").text("Error al editar.");
						$("#errorRol").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreRol").val("");
				})
		}
	});
	var con = 1;
	$("#MostrarRolesTB").click(function(){
		con = mostrarOcultarTablas(con);
	});

	$("#search").keyup(function(){
		 _this = this;
		 $.each($("#tablaRoles tbody tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });
});

//Ocultar o mostrar tabla
function mostrarOcultarTablas(con){
	if(con==1){
		$("#Roles1").show();
		$("#MostrarRolesTB").text("Ocultar lista de roles");
		con=0;
	}else{
		$("#Roles1").hide();
		$("#MostrarRolesTB").text("Mostrar lista de roles");
		con=1;
	}
	return con;
}

//Vaciar cajas de texto
function vaciarArreglos(){
	var Parent = document.getElementById("Roles");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatos(){
	$.ajax(
			{	
				url:"../php/consultaRol.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				//var i = cadena.length-1; i >= 0; i--
				for (var i = cadena.length-1; i >= 0; i--) {
					var rol= cadena[i].rol_intCodigo+"-"+cadena[i].rol_Descripcion;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].rol_intCodigo+"  </td><td WIDTH='500' >  "+cadena[i].rol_Descripcion+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarRol' onclick='pasarRol("+'"'+rol+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarRol' onclick='pasarRolEliminar("+'"'+rol+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Roles").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
			})
}


function pasarRol(arreglo){
	var sp =arreglo.split("-");
	//alert(sp[1]);
	$("#ExitoRol").hide();
	$("#errorRol").hide();
	$("#claveEditarRol").val(sp[0]);
	$("#nombreEditarRol").val(sp[1]);
}

function pasarRolEliminar(arreglo){
	var sp =arreglo.split("-");
	//alert(sp[1]);
	$("#ExitoRol").hide();
	$("#errorRol").hide();
	$("#Codigo_RolElimiar").val(sp[0]);
	$("#Nombre_RolElimiar").val(sp[1]);
}
function borrarRol(){
	$("#ExitoRol").hide();
	$("#errorRol").hide();
	var valores = {"tipo":"3","clave":$("#Codigo_RolElimiar").val()};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudRol.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				$("#ExitoRol").text("Eliminado correctamente");
				$("#ExitoRol").show();
				vaciarArreglos();
				cargarDatos();
			}else{
				$("#errorRol").text("Error al eliminar, puede que aun haya usuarios con este rol");
				$("#errorRol").show();
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
