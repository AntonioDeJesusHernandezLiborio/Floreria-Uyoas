$(document).ready(function()
{
	
	cargarDatos();
	
	$("#guardarArreglo").click(function(){
		var valores = {"tipo":"1","nombre":$("#nombreArreglo").val()};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudArreglo.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Registro Exitoso");
					vaciarArreglos();
					cargarDatos();
				}else{
					alert("Ocurrio un error al registrar");
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
				url:"../php/crudArreglo.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					alert("Actualizacion Exitosa");
					vaciarArreglos();
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
	var con = 1;
	$("#MostrarArregloTB").click(function(){
		con = mostrarOcultarTablas(con);
	});

	$("#search").keyup(function(){
		 _this = this;
		 $.each($("#tablaArreglos tbody tr"), function() {
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
		$("#Arreglo1").show();
		$("#MostrarArregloTB").text("Ocultar lista de arreglos");
		con=0;
	}else{
		$("#Arreglo1").hide();
		$("#MostrarArregloTB").text("Mostrar lista de arreglos");
		con=1;
	}
	return con;
}

//Vaciar cajas de texto
function vaciarArreglos(){
	var Parent = document.getElementById("Arreglos");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatos(){
	$.ajax(
			{	
				url:"../php/consultaArreglo.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var arreglo= cadena[i].arreglo_intCodigo+"-"+cadena[i].arreglo_vchNombre;
					var nuevoAlumno="<tr><td WIDTH='1'>"+cadena[i].arreglo_intCodigo+"  </td><td WIDTH='500' >  "+cadena[i].arreglo_vchNombre+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarArreglo' onclick='pasarArreglo("+'"'+arreglo+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' onclick='borrarArreglo("+'"'+arreglo+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("Arreglos").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarArreglo(arreglo){
	var sp =arreglo.split("-");
	//alert(sp[1]);
	$("#claveEditar").val(sp[0]);
	$("#nombreEditar").val(sp[1]);
}

function borrarArreglo(arreglo){
	var sp =arreglo.split("-");
	var valores = {"tipo":"3","clave":sp[0]};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudArreglo.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				alert("Eliminado");
				vaciarArreglos();
				cargarDatos();
			}else{
				alert("Ocurrio un error al Eliminar");
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}
