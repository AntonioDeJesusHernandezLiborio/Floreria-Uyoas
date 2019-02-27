$(document).ready(function()
{
	cargarDatosEmpleado();
	cargarDatosProductos();

	var selectreporte = document.getElementById("listaReportes");


	$("#btnGenerarReporte").click(function(){
		//alert("No mames we! "+ cont);
		alert("Valor: "+ selectreporte.value);
		if (selectreporte.value=="Empleados") {
			OcultarTodo();
			$("#reportetblEmpleados").show();
		} else if (selectreporte.value=="Productos") {
			OcultarTodo();
			$("#reportetblProductos").show();
		} else if (selectreporte.value=="Reportes Año") {
			OcultarTodo();
			$("#reportetblVentasAño").show();
		}

	})


// Fin de todo el document.ready function no se que madres!
});

function OcultarTodo(){
	$("#reportetblEmpleados").hide();
	$("#reportetblProductos").hide();
	$("#reportetblVentasAño").hide();
}


//  ***********************            EMPLEADOS                *******************************
function cargarDatosEmpleado(){
	$.ajax(
			{	
				url:"../php/reporteEmpleados.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaEmpleado= cadena[i].emple_intCodigo+"-"+cadena[i].emple_nvchNombre+"-"+cadena[i].emple_vchAM+"-"+cadena[i].emple_vchAP+"-"+cadena[i].emple_ftlPago+"-"+cadena[i].emple_nvchTelefono+"-"+cadena[i].emple_vchDireccion+"-"+cadena[i].emple_vchUsuario+"-"+cadena[i].emple_nvchClave+"-"+cadena[i].rol_Descripcion+"-"+cadena[i].emple_bitActivo+"-"+cadena[i].emple_intIdRol;
					var nuevoEmpleado="<tr><td WIDTH='1'>"+cadena[i].emple_intCodigo+"  </td><td WIDTH='500'>"+cadena[i].emple_nvchNombre+"</td><td WIDTH='500'>"+cadena[i].emple_vchAM+"</td><td WIDTH='500'>"+cadena[i].emple_vchAP+"</td><td WIDTH='500'>"+cadena[i].emple_ftlPago+"</td><td WIDTH='500'>"+cadena[i].emple_nvchTelefono+"</td><td WIDTH='10'>"+cadena[i].emple_vchDireccion+"</td><td WIDTH='500'>"+cadena[i].emple_vchUsuario+"</td><td WIDTH='500'>"+cadena[i].emple_nvchClave+"</td><td WIDTH='500'>"+cadena[i].rol_Descripcion+"</td><td WIDTH='500'>"+cadena[i].emple_bitActivo+"</td></td></tr>";
    				var nuevaFilaEmpleado = document.createElement("TR");
   					nuevaFilaEmpleado.innerHTML=nuevoEmpleado;
   				 	document.getElementById("Empleados").appendChild(nuevaFilaEmpleado);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}

//  ***********************            PRODUCTOS                *******************************
function cargarDatosProductos(){ 
	$.ajax(
			{	
				url:"../php/reporteProducto.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaBases = cadena[i].pro_intCodigo+"-"+cadena[i].pro_nvcNombre+"-"+cadena[i].pro_ftlPrecio+"-"+cadena[i].pro_ftlGanancia+"-"+cadena[i].pro_intCodigoTipoProducto+"-"+cadena[i].pro__bitActivo;
					var nuevoAlumno="<tr><td WIDTH='10'>"+cadena[i].pro_intCodigo+"  </td><td WIDTH='200'>"+cadena[i].pro_nvcNombre+"</td><td WIDTH='200'>"+cadena[i].pro_ftlPrecio+"</td><td WIDTH='200'>"+cadena[i].pro_ftlGanancia+"</td><td WIDTH='200'>"+cadena[i].tipo_producto+"</td><td WIDTH='200'>"+cadena[i].pro_dtFechaCreacion+"</td><td WIDTH='200'>"+cadena[i].pro_dtFechaModificacion+"</td><td WIDTH='200'>"+cadena[i].pro_dtFechaEliminacion+"</td><td WIDTH='200'>"+cadena[i].usuario_cracion+"</td><td WIDTH='200'>"+cadena[i].usuario_modificacion+"</td><td WIDTH='200'>"+cadena[i].usuario_eliminacion+"</td><td WIDTH='200'>"+cadena[i].pro__bitActivo+"</td></td></tr>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("productos").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}














