$(document).ready(function()
{
	cargarDatosEmpleado();
	cargarDatosComboRoles();
	cargarDatosComboRoles1();


	$("#nuevoEmpleado").click(function(){
		$("#ExitoEmpleado").hide();
		$("#errorEmpleado").hide();
	})
	$("#Nombre_Empleado").click(function(){
		$("#debeEscribirNombreEmple").hide();
	})
	$("#AM_Empleado").click(function(){
		$("#debeEscribirAP").hide();
	})
	$("#AP_Empleado").click(function(){
		$("#debeEscribirAM").hide();
	})
	$("#Pago_Empleado").click(function(){
		$("#debeEscribirPago").hide();
	})
	$("#Telefono_Empleado").click(function(){
		$("#debeEscribirTelefono").hide();
	})
	$("#Direccion_Empleado").click(function(){
		$("#debeEscribirDireccion").hide();
	})
	$("#usuario_Empleado").click(function(){
		$("#debeEscribirUsuario").hide();
	})
	$("#clave_Empleado").click(function(){
		$("#debeEscribirClave").hide();
	})
	$("#Rol_Empleado").click(function(){
		$("#debeEscribirRol").hide();
	})

	$("#Nombre_EmpleadoE").click(function(){
		$("#debeEscribirNombreEmpleE").hide();
	})
	$("#AP_EmpleadoE").click(function(){
		$("#debeEscribirAPE").hide();
	})
	$("#AM_EmpleadoE").click(function(){
		$("#debeEscribirAME").hide();
	})
	$("#Pago_EmpleadoE").click(function(){
		$("#debeEscribirPagoE").hide();
	})
	$("#Telefono_EmpleadoE").click(function(){
		$("#debeEscribirTelefonoE").hide();
	})
	$("#Direccion_EmpleadoE").click(function(){
		$("#debeEscribirDireccionE").hide();
	})
	$("#usuario_EmpleadoE").click(function(){
		$("#debeEscribirUsuarioE").hide();
	})
	$("#clave_EmpleadoE").click(function(){
		$("#debeEscribirClaveE").hide();
	})
	$("#Rol_EmpleadoE1").click(function(){
		$("#debeEscribirRolE").hide();
	})



	$("#guardarEmpleado").click(function(){
		
		var nombre = $("#Nombre_Empleado").val();
		var AM = $("#AM_Empleado").val();
		var AP = $("#AP_Empleado").val();
		var pago = $("#Pago_Empleado").val();
		var telefono = $("#Telefono_Empleado").val();
		var direccion = $("#Direccion_Empleado").val();
		var usuario = $("#usuario_Empleado").val();
		var clave = $("#clave_Empleado").val();
		var rol = $("#Rol_EmpleadoE").val();
		

		if(nombre==""){
			$("#debeEscribirNombreEmple").show();
			return false;
		}else if (AP=="") {
			$("#debeEscribirAP").show();
			return false;
		}else if (AM=="") {
			$("#debeEscribirAM").show();
			return false;
		}else if (pago == 0  || pago == "" || isNaN(pago)) {
			$("#debeEscribirPago").show();
			return false;
		}else if (telefono.length < 10 || telefono=="") {
			$("#debeEscribirTelefono").show();
			return false;	
		}else if (direccion.length <=10) {
			$("#debeEscribirDireccion").show();
			return false;
		}else if (usuario == "") {
			$("#debeEscribirUsuario").show();
			return false;
		}else if (clave == "") {
			$("#debeEscribirClave").show();
			return false;
		}else if (rol == "") {
			$("#debeEscribirRol").show();
			return false;
		}else{
			var valores = {"tipo":"1","nombreEmpleado":$("#Nombre_Empleado").val(),"AP":$("#AP_Empleado").val(),"AM":$("#AM_Empleado").val(),"pago":$("#Pago_Empleado").val(),"telefono":$("#Telefono_Empleado").val(),"direccion":$("#Direccion_Empleado").val(),"usuario":$("#usuario_Empleado").val(),"clave":$("#clave_Empleado").val(),"rol":$("#Rol_EmpleadoE").val()};
			$.ajax(
				{
					data:valores,	
					url:"../php/crudEmpleados.php",
					type:"POST",
					async:true
				}
				).done(function(data){
					if(data=='1'){
						$("#ExitoEmpleado").text("Guardado correctamente");
						$("#ExitoEmpleado").show();
						vaciarEmpleados();
						cargarDatosEmpleado();
					}else{
						$("#errorEmpleado").text("Ocurrio un error al guardar");
						$("#errorEmpleado").show();
					}
				}).fail(function(data){
					alert("Error en el servidor"+data);
				}).always(function(data){
					$("#Nombre_Empleado").val("");
					$("#AM_Empleado").val("");
					$("#AP_Empleado").val("");
					$("#Pago_Empleado").val("");
					$("#Telefono_Empleado").val("");
					$("#Direccion_Empleado").val("");
					$("#usuario_Empleado").val("");
					$("#clave_Empleado").val("");
					$("#Rol_EmpleadoE").val("");
				})
		}
	});

	$("#btneliminarEmpleado").click(function(){
		borrarEmplaedo();
	})
	//actualizarArreglo
	$("#actualizarEmpleado").click(function(){
		var nombre =$("#Nombre_EmpleadoE").val();
		var AP	=$("#AP_EmpleadoE").val();
		var AM =$("#AM_EmpleadoE").val();
		var pago=$("#Pago_EmpleadoE").val();
		var telefono=$("#Telefono_EmpleadoE").val();
		var direccion=$("#Direccion_EmpleadoE").val();
		var usuario=$("#usuario_EmpleadoE").val();
		var clave=$("#clave_EmpleadoE").val();
		var rol =  $("#Rol_EmpleadoE1").val();
		var activo=0;
		cargarDatosComboRoles();

		if(nombre==""){
			$("#debeEscribirNombreEmpleE").show();
			return false;
		}else if (AP=="") {
			$("#debeEscribirAPE").show();
			return false;
		}else if (AM=="") {
			$("#debeEscribirAME").show();
			return false;
		}else if (pago == 0  || pago == "" || isNaN(pago)) {
			$("#debeEscribirPagoE").show();
			return false;
		}else if (telefono.length < 10 || telefono=="") {
			$("#debeEscribirTelefonoE").show();
			return false;	
		}else if (direccion.length <=10) {
			$("#debeEscribirDireccionE").show();
			return false;
		}else if (usuario == "") {
			$("#debeEscribirUsuarioE").show();
			return false;
		}else if (clave == "") {
			$("#debeEscribirClaveE").show();
			return false;
		}else if (rol == "") {
			$("#debeEscribirRolE").show();
			return false;
		}else {
		if($("#activo_Empleado").is(':checked')) {activo = 1}
		var valores = {"tipo":"2","codigo_Empleado":$("#Codigo_Empleado").val(),"nombreEmpleado":$("#Nombre_EmpleadoE").val(),"AP":$("#AP_EmpleadoE").val(),"AM":$("#AM_EmpleadoE").val(),"pago":$("#Pago_EmpleadoE").val(),"telefono":$("#Telefono_EmpleadoE").val(),"direccion":$("#Direccion_EmpleadoE").val(),"usuario":$("#usuario_EmpleadoE").val(),"clave":$("#clave_EmpleadoE").val(),"rol":$("#Rol_EmpleadoE1").val(),"activo":activo};
		$.ajax(
			{
				data:valores,	
				url:"../php/crudEmpleados.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				if(data=='1'){
					$("#ExitoEmpleado").text("Actualizacion exitosa");
					$("#ExitoEmpleado").show()
					vaciarEmpleados();
					cargarDatosEmpleado();
				}else{
					$("#errorEmpleado").text("Ocurrio un error al actualizar");
					$("#errorEmpleado").hide();
				}
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreArreglo").val("");
			})
		}
	});
	
	var cont = 1;
	$("#MostrarEmpleadosTB").click(function(){
		$("#ExitoEmpleado").hide();
		$("#errorEmpleado").hide();
		cont = mostrarOcultarTablas1(cont);
	});

	$("#searchEmpleado").keyup(function(){
		$("#ExitoEmpleado").hide();
		$("#errorEmpleado").hide();
		 _this = this;
		 $.each($("#Empleados tr"), function() {
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
		$("#Empleado1").show();
		$("#MostrarEmpleadosTB").text("Ocultar lista de empleados");
		cont=0;
	}else{
		$("#Empleado1").hide();
		$("#MostrarEmpleadosTB").text("Mostrar lista de empleados");
		cont=1;
	}
	return cont;
}

//Vaciar cajas de texto
function vaciarEmpleados(){
	var Parent = document.getElementById("Empleados");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}



function cargarDatosEmpleado(){
	$.ajax(
			{	
				url:"../php/consultaEmpleados.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaEmpleado= cadena[i].emple_intCodigo+"-"+cadena[i].emple_nvchNombre+"-"+cadena[i].emple_vchAM+"-"+cadena[i].emple_vchAP+"-"+cadena[i].emple_ftlPago+"-"+cadena[i].emple_nvchTelefono+"-"+cadena[i].emple_vchDireccion+"-"+cadena[i].emple_vchUsuario+"-"+cadena[i].emple_nvchClave+"-"+cadena[i].rol_Descripcion+"-"+cadena[i].emple_bitActivo+"-"+cadena[i].emple_intIdRol;
					var nuevoEmpleado="<tr><td WIDTH='500'>"+cadena[i].emple_nvchNombre+"</td><td WIDTH='500'>"+cadena[i].emple_vchAM+"</td><td WIDTH='500'>"+cadena[i].emple_vchAP+"</td><td WIDTH='500'>"+cadena[i].emple_ftlPago+"</td><td WIDTH='500'>"+cadena[i].emple_nvchTelefono+"</td><td WIDTH='10'>"+cadena[i].emple_vchDireccion+"</td><td WIDTH='500'>"+cadena[i].emple_vchUsuario+"</td><td WIDTH='500'>"+cadena[i].rol_Descripcion+"</td><td WIDTH='500'>"+cadena[i].emple_bitActivo+"</td><td WIDTH='300'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#EditarEmpleado' onclick='pasarEmpleado("+'"'+filaEmpleado+'"'+");'>Editar</button>&emsp;&emsp;&emsp;&emsp;<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarEmpleado' onclick='pasarEmpleadoEliminar("+'"'+filaEmpleado+'"'+")'>Eliminar</button></td></td></tr>";
    				var nuevaFilaEmpleado = document.createElement("TR");
   					nuevaFilaEmpleado.innerHTML=nuevoEmpleado;
   				 	document.getElementById("Empleados").appendChild(nuevaFilaEmpleado);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}


function pasarEmpleado(empleado){
	$("#ExitoEmpleado").hide();
	var sp =empleado.split("-");
	$("#Codigo_Empleado").val(sp[0]);
	$("#Nombre_EmpleadoE").val(sp[1]);
	$("#AP_EmpleadoE").val(sp[2]);
	$("#AM_EmpleadoE").val(sp[3]);
	$("#Pago_EmpleadoE").val(sp[4]);
	$("#Telefono_EmpleadoE").val(sp[5]);
	$("#Direccion_EmpleadoE").val(sp[6]);
	$("#usuario_EmpleadoE").val(sp[7]);
	$("#clave_EmpleadoE").val(sp[8]);
	$("#Rol_EmpleadoE1").val(sp[11]);
	if(sp[10]=='1'){
		$("#activo_Empleado").prop( "checked", true );
	}
}


function pasarEmpleadoEliminar(empleado){
	$("#ExitoEmpleado").hide();
	$("#errorEmpleado").hide();
	var sp =empleado.split("-");
	$("#Codigo_EmpleadoElimiar").val(sp[0]);
	$("#Nombre_EmpleadoElimiar").val(sp[1]);
}

function borrarEmplaedo(){
	var valores = {"tipo":"3","codigo_empleado":$("#Codigo_EmpleadoElimiar").val()};
	$.ajax(
		{
			data:valores,	
			url:"../php/crudEmpleados.php",
			type:"POST",
			async:true
		}
		).done(function(data){
			if(data=='1'){
				$("#ExitoEmpleado").text("Eliminado");
				$("#ExitoEmpleado").show()
				vaciarEmpleados();
				cargarDatosEmpleado();
			}else{
				$("#errorEmpleado").text("Error al eliminar");
				$("#errorEmpleado").show()
			}
		}).fail(function(data){
			alert("Error en el servidor"+data);
	})
}

function cargarDatosComboRoles(){
	//vaciarCategoria();
	$.ajax(
	{	
		url:"../php/consultaRol.php",
		type:"GET",
		dataType: "json",
		success: function(data){
		  $.each(data,function(key, registro) {

		    $("#Rol_EmpleadoE").append('<option value='+registro.rol_intCodigo+'>'+registro.rol_Descripcion+'</option>');
		  });        
		},
		error: function(data) {
		  alert('error');
		}
	})
}

function cargarDatosComboRoles1(){
	//vaciarCategoria();
	$.ajax(
	{	
		url:"../php/consultaRol.php",
		type:"GET",
		dataType: "json",
		success: function(data){
		  $.each(data,function(key, registro) {

		    $("#Rol_EmpleadoE1").append('<option value='+registro.rol_intCodigo+'>'+registro.rol_Descripcion+'</option>');
		  });        
		},
		error: function(data) {
		  alert('error');
		}
	})
}