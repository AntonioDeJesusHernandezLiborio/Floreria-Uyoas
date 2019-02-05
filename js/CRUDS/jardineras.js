$(document).ready(function()
{
	cargarDatosJardinera();

	$("#guardarJardinera").click(function(){
		var valores = {"tipo":"1","nombre":$("#nombreJardinera").val()};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudJardineras.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Registro Exitoso");
					vaciarJardinera();
					cargarDatosJardinera();
				}else{
					alert("Ocurrio un error al registrarse");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreJardinera").val("");
			})
	});


	//actualizarArreglo
	$("#actualizarJardinera").click(function(){
		var valores = {"tipo":"2","nombre":$("#nombreEditarJardinera").val(),"clave":$("#claveEditarJardinera").val()};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudJardineras.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Actualizacion Exitosa");
					vaciarJardinera();
					cargarDatosJardinera();
				}else{
					alert("Ocurrio un error al actualizar");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreArreglo").val("");
			})
	});
	var cont = 1;
	$("#MostrarJardineraTB").click(function(){
		cont = mostrarOcultarTablas1(cont);
	});

	$("#searchJardinera").keyup(function(){
		 _this = this;
		 // Show only matching TR, hide rest of them
		 $.each($("#tablaJardineras tbody tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });
});

//Ocultar o mostrar tabla
function mostrarOcultarTablas1(cont){
	if(cont==1){
		$("#Jardinera1").show();
		$("#MostrarJardineraTB").text("Ocultar lista de jardinera");
		cont=0;
	}else{
		$("#Jardinera1").hide();
		$("#MostrarJardineraTB").text("Mostrar lista de jardinera");
		cont=1;
	}
	return cont;
}

//Vaciar cajas de texto
function vaciarJardinera(){
	var Parent = document.getElementById("Jardinera");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosJardinera(){
	$.ajax(
			{	
				url:"../php/consultaJardineras.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaJardinera= cadena[i].jardinera_intCodigo+"-"+cadena[i].jardinera_vchNombre;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].jardinera_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].jardinera_vchNombre+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarJardinera' onclick='pasarJardinera("+'"'+filaJardinera+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' onclick='borrarJardinera("+'"'+filaJardinera+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Jardinera").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarJardinera(arreglo){
	var sp =arreglo.split("-");
	$("#claveEditarJardinera").val(sp[0]);
	$("#nombreEditarJardinera").val(sp[1]);
}

function borrarJardinera(arreglo){
	var sp =arreglo.split("-");
	var valores = {"tipo":"3","clave":sp[0]};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudJardineras.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				alert("Eliminado");
				vaciarJardinera();
				cargarDatosJardinera();
			}else{
				alert("Ocurrio un error al Eliminar");
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
