$(document).ready(function()
{

	cargarDatosJardinera();
	$("#guardarArreglo").click(function(){
		var valores = {"tipo":"1","nombre":$("#nombreArreglo").val()};
		$.ajax(
			{
				data:valores,	
				url:"php/crudArreglo.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Registro Exitoso");
					vaciar();
					cargarDatos();
				}else{
					alert("Ocurrio un error al registrarse");
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreArreglo").val("");
			})
	});
	//actualizarArreglo
	$("#actualizarArreglo").click(function(){
		var valores = {"tipo":"2","nombre":$("#nombreEditar").val(),"clave":$("#claveEditar").val()};
		$.ajax(
			{
				data:valores,	
				url:"php/crudArreglo.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Actualizacion Exitosa");
					vaciar();
					cargarDatos();
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

	$("#search").keyup(function(){
		 _this = this;
		 // Show only matching TR, hide rest of them
		 $.each($("#tablaArreglos tbody tr"), function() {
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
function vaciar(){
	var Parent = document.getElementById("Arreglos");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosJardinera(){
	$.ajax(
			{	
				url:"php/consultaArreglo.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var arreglo= cadena[i].arreglo_intCodigo+"-"+cadena[i].arreglo_vchNombre;
					var nuevoAlumno="<tr><td>"+cadena[i].arreglo_intCodigo+"  </td><td>  "+cadena[i].arreglo_vchNombre+"</td><td><button class='btn btn-deafult' data-toggle='modal' data-target='#EditarArreglo' onclick='pasar("+'"'+arreglo+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' onclick='borrar("+'"'+arreglo+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Jardinera").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasar(arreglo){
	var sp =arreglo.split("-");
	//alert(sp[1]);
	$("#claveEditar").val(sp[0]);
	$("#nombreEditar").val(sp[1]);
}

function borrar(arreglo){
	var sp =arreglo.split("-");
	var valores = {"tipo":"3","clave":sp[0]};
	$.ajax(
		{
			data:valores,	
			url:"php/crudArreglo.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				alert("Eliminado");
				vaciar();
				cargarDatos();
			}else{
				alert("Ocurrio un error al Eliminar");
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
