$(document).ready(function()
{

	cargarDatos();
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



});


function vaciar(){
	var Parent = document.getElementById("jardineras");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatos(){
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
					var nuevoAlumno="<tr><td>"+cadena[i].arreglo_intCodigo+"  </td><td>  "+cadena[i].arreglo_vchNombre+"</td><td><button class='btn btn-deafult' data-toggle='modal' data-target='#EditarArreglo' onclick='editar("+'"'+arreglo+'"'+");'>Editar</button>&emsp;&emsp;<button class='btn btn-danger'>Eliminar</button></td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("jardineras").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function editar(arreglo){
	var sp =arreglo.split("-");
	//alert(sp[1]);
	$("#nombreEditar").val(sp[1]);
}