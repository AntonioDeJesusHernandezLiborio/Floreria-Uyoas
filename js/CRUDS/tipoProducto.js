$(document).ready(function()
{
	cargarDatosTipoProducto();


	$("#nombre_TipoProducto").click(function(){
		$("#debeEscribirTipoProducto").hide();
	})

	$("#btneliminarProducto").click(function(){
		borrarTipoProducto();
		$("#errorTipoProducto").hide();
		$("#ExitoTipoProducto").hide();
			
	})


	$("#guardarTipoProducto").click(function(){
		var nombre = $("#nombre_TipoProducto").val();
		if(nombre == ""){
			$("#debeEscribirTipoProducto").show();
			return false;
		}else{

			var valores = {"tipo":"1","nombre":$("#nombre_TipoProducto").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudTipoProducto.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoTipoProducto").text("Guardado con con exito");
						$("#ExitoTipoProducto").show();
						vaciarTipoProductos();
						cargarDatosTipoProducto();
					}else{
						$("#errorTipoProducto").text("Error al guardar");
						$("#errorTipoProducto").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombre_TipoProducto").val("");
				})
		}
	});
	$("#nombreEditar_tipoproducto").click(function(){
		$("#debeEscribirTipoProductoE").hide();
	})

	//actualizarArreglo
	$("#actualizarTipoProducto").click(function(){
		if($("#nombreEditar_tipoproducto").val()==""){
			$("#debeEscribirTipoProductoE").show();
			return false;
		}else{
			var valores = {"tipo":"2","nombre":$("#nombreEditar_tipoproducto").val(),"clave":$("#claveEditar_tipoproducto").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudTipoProducto.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoTipoProducto").text("Editado con exito");
						$("#ExitoTipoProducto").show();
						vaciarTipoProductos();
						cargarDatosTipoProducto();
					}else{
						$("#errorTipoProducto").text("Error al guardar");
						$("#errorTipoProducto").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#nombreEditar_tipoproducto").val("");
					$("#claveEditar_tipoproducto").val("")
				})
		}
	});
	var cont = 1;
	$("#MostrarTipoProductoTB").click(function(){
		$("#errorTipoProducto").hide();
		$("#ExitoTipoProducto").hide();
		cont = mostrarOcultarTablasBases(cont);
	});

	$("#searchTipoProducto").keyup(function(){
		$("#errorTipoProducto").hide();
		$("#ExitoTipoProducto").hide();
		 _this = this;
		 // Show only matching TR, hide rest of them
		 $.each($("#tipoProductos tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });
});

//Ocultar o mostrar tabla
function mostrarOcultarTablasBases(cont){
	if(cont==1){
		$("#tipoProducto1").show();
		$("#MostrarTipoProductoTB").text("Ocultar lista de tipo producto");
		cont=0;
	}else{
		$("#tipoProducto1").hide();
		$("#MostrarTipoProductoTB").text("Mostrar lista de tipo producto");
		cont=1;
	}
	return cont;
}

//Vaciar cajas de texto
function vaciarTipoProductos(){
	var Parent = document.getElementById("tipoProductos");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosTipoProducto(){
	$.ajax(
			{	
				url:"../php/consultaTipoProducto.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaBases= cadena[i].tipoP_intCodigo+"-"+cadena[i].tipoP_nvchDescripcion;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].tipoP_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].tipoP_nvchDescripcion+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarTipoProducto' onclick='pasarTipoProducto("+'"'+filaBases+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarTipoProducto' onclick='pasarTipoProductoEliminar("+'"'+filaBases+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("tipoProductos").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarTipoProducto(arreglo){
	var sp =arreglo.split("-");
	$("#errorTipoProducto").hide();
		$("#ExitoTipoProducto").hide();
	$("#claveEditar_tipoproducto").val(sp[0]);
	$("#nombreEditar_tipoproducto").val(sp[1]);
}

function pasarTipoProductoEliminar(arreglo){
	var sp =arreglo.split("-");
	$("#errorTipoProducto").hide();
	$("#ExitoTipoProducto").hide();
	$("#Codigo_TipoProductoElimiar").val(sp[0]);
	$("#Nombre_TipoProductoElimiar").val(sp[1]);
}

function borrarTipoProducto(){
	var valores = {"tipo":"3","clave":$("#Codigo_TipoProductoElimiar").val()};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudTipoProducto.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				$("#ExitoTipoProducto").text("Eliminado con exito");
				$("#ExitoTipoProducto").show();
				vaciarTipoProductos();
				cargarDatosTipoProducto();
			}else{
				$("#errorTipoProducto").text("Error al eliminar");
				$("#errorTipoProducto").show();
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}