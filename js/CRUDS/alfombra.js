$(document).ready(function()
{
	cargarDatosAlfombra();

	$("#guardarAlfombra").click(function(){
		var valores = {"tipo":"1","nombre":$("#nombreAlfombra").val()};
		$.ajax(
			{
				data:valores,	
				url:"php/crudAlfombras.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Registro Exitoso");
					vaciarAlfombra();
					cargarDatosAlfombra();
				}else{
					alert("Ocurrio un error al registrarse");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreAlfombra").val("");
			})
	});


	//actualizarArreglo
	$("#actualizarAlfombra").click(function(){
		var valores = {"tipo":"2","nombre":$("#nombreEditarAlfombra").val(),"clave":$("#claveEditarAlfombra").val()};
		$.ajax(
			{
				data:valores,	
				url:"php/crudAlfombras.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Actualizacion Exitosa");
					vaciarAlfombra();
					cargarDatosAlfombra();
				}else{
					alert("Ocurrio un error al actualizar");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreEditarAlfombra").val("");
				$("#claveEditarAlfombra").val("");
			})
	});
	var cont = 1;
	$("#MostrarAlfrombraTB").click(function(){
		cont = mostrarOcultarTablasAlfombra(cont);
	});

	$("#searchAlfombra").keyup(function(){
		 _this = this;
		 // Show only matching TR, hide rest of them
		 $.each($("#tablaAlfombra tbody tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });
});

//Ocultar o mostrar tabla
function mostrarOcultarTablasAlfombra(cont){
	if(cont==1){
		$("#Alfombra1").show();
		$("#MostrarAlfrombraTB").text("Ocultar lista de alfombra");
		cont=0;
	}else{
		$("#Alfombra1").hide();
		$("#MostrarAlfrombraTB").text("Mostrar lista de alfombra");
		cont=1;
	}
	return cont;
}

//Vaciar cajas de texto
function vaciarAlfombra(){
	var Parent = document.getElementById("Alfombras");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosAlfombra(){
	$.ajax(
			{	
				url:"php/consultaAlfombra.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaAlfombra= cadena[i].alfombra_intCodigo+"-"+cadena[i].alfombra_vchNombre;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].alfombra_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].alfombra_vchNombre+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarAlfombra' onclick='pasarAlfombra("+'"'+filaAlfombra+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' onclick='borrarAlfombra("+'"'+filaAlfombra+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Alfombras").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarAlfombra(arreglo){
	var sp =arreglo.split("-");
	$("#claveEditarAlfombra").val(sp[0]);
	$("#nombreEditarAlfombra").val(sp[1]);
}

function borrarAlfombra(arreglo){
	var sp =arreglo.split("-");
	var valores = {"tipo":"3","clave":sp[0]};
	$.ajax(
		{
			data:valores,	
			url:"php/crudAlfombras.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				alert("Eliminado");
				vaciarAlfombra();
				cargarDatosAlfombra();
			}else{
				alert("Ocurrio un error al Eliminar");
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
