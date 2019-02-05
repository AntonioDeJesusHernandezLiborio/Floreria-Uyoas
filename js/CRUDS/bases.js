$(document).ready(function()
{
	cargarDatosBases();

	$("#guardarBases").click(function(){
		var valores = {"tipo":"1","nombre":$("#nombreBases").val()};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudBases.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Registro Exitoso");
					vaciarBases();
					cargarDatosBases();
				}else{
					alert("Ocurrio un error al registrarse");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreBases").val("");
			})
	});


	//actualizarArreglo
	$("#actualizarBases").click(function(){
		var valores = {"tipo":"2","nombre":$("#nombreEditarBases").val(),"clave":$("#claveEditarBases").val()};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudBases.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Actualizacion Exitosa");
					vaciarBases();
					cargarDatosBases();
				}else{
					alert("Ocurrio un error al actualizar");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreEditarBases").val("");
				$("#claveEditarBases").val()
			})
	});
	var cont = 1;
	$("#MostrarBaseTB").click(function(){
		cont = mostrarOcultarTablasBases(cont);
	});

	$("#searchBase").keyup(function(){
		 _this = this;
		 // Show only matching TR, hide rest of them
		 $.each($("#tablaBases tbody tr"), function() {
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
		$("#Bases1").show();
		$("#MostrarBaseTB").text("Ocultar lista de bases");
		cont=0;
	}else{
		$("#Bases1").hide();
		$("#MostrarBaseTB").text("Mostrar lista de bases");
		cont=1;
	}
	return cont;
}

//Vaciar cajas de texto
function vaciarBases(){
	var Parent = document.getElementById("Bases");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosBases(){
	$.ajax(
			{	
				url:"../php/consultaBases.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaBases= cadena[i].bases_intCodigo+"-"+cadena[i].bases_vchNombre;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].bases_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].bases_vchNombre+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarBases' onclick='pasarBases("+'"'+filaBases+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' onclick='borrarBases("+'"'+filaBases+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Bases").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarBases(arreglo){
	var sp =arreglo.split("-");
	$("#claveEditarBases").val(sp[0]);
	$("#nombreEditarBases").val(sp[1]);
}

function borrarBases(arreglo){
	var sp =arreglo.split("-");
	var valores = {"tipo":"3","clave":sp[0]};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudBases.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				alert("Eliminado");
				vaciarBases();
				cargarDatosBases();
			}else{
				alert("Ocurrio un error al Eliminar");
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}