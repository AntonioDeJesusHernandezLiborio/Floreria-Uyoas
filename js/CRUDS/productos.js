$(document).ready(function(){
	cargarDatosProductos();
	cargarTipoCombo();
	cargarTipoComboE();

	
	$("#cerrarModalNoEliminado").click(function(){
		$("#eliminarFotooo").hide();
	})

	$("#cerrarModalEliminado").click(function(){
		eliminarFoto();
		$("#eliminarFotooo").hide();
	})

	$("#imagenn").change(function(){
    	$("#agregarfoto").prop("disabled", this.files.length == 0);
	});

	$(document).on('change', 'input[type=file]', function(e) {
	    var TmpPath = URL.createObjectURL(e.target.files[0]);
		$("#imagen").attr('src', TmpPath);
	});
	
	$("#nombre_Producto").click(function(){
		$("#debePonerNombre").hide();
	})
	$("#precio_Producto").click(function(){
		$("#debePonerPrecio").hide();
	})
	$("#ganancia_Producto").click(function(){
		$("#debePonerGanancia").text("Debe ingresar ganancia.");
		$("#debePonerGanancia").hide();
	})
	$("#tipoarreglo1").click(function(){
		$("#debePonerTipo").hide();
	})

	$("#nombre_ProductoE").click(function(){
		$("#debePonerNombreE").hide();
	})
	$("#precio_ProductoE").click(function(){
		$("#debePonerPrecioE").hide();
	})
	$("#ganancia_ProductoE").click(function(){
		$("#debePonerGananciaE").hide();
	})
	$("#tipoarreglo1E").click(function(){
		$("#debePonerTipoE").hide();
	})
	
	$("#guardarProducto").click(function(){
		var nombre = $("#nombre_Producto").val();
		var precio = $("#precio_Producto").val();
		var ganancia = $("#ganancia_Producto").val();
		var tipo = $("#tipoarreglo1").val();
		
		if(nombre==""){
			$("#debePonerNombre").show();
			return false;
		}else if (precio == 0  || precio == "" || isNaN(precio)) {
			$("#debePonerPrecio").show();
			return false;
		}else if (ganancia == 0  || ganancia == "" || isNaN(ganancia)) {
			$("#debePonerGanancia").show();
			return false;
		}else if (ganancia>=precio){
			$("#debePonerGanancia").text("EL PRECIO ES MENOR QUE LA GANANCIA.");
			$("#debePonerGanancia").show();
			return false;
		}else if (tipo == 0  || tipo == ""){
			$("#debePonerTipo").show();
			return false;
		}else{
			var datos = {"tipo":"1","nombre_Producto":$("#nombre_Producto").val(),"precio_Producto":$("#precio_Producto").val(),"ganancia_Producto":$("#ganancia_Producto").val(),"tipoA":$("#tipoarreglo1").val(),"idusuario":$("#iduser11").text()};
			//style="display: none;" alert($("#iduser11").text());
			$.ajax(
			{	
				data:datos,
				url:"../php/crudProducto.php",
				type:"POST",
				async:true,
			}).done(function(data){
				if(data==1){
					$("#ExitoProducto").text("Producto guardado con exito");
					$("#ExitoProducto").show();
					vaciarProductos();
					cargarDatosProductos();
					alertify.success("Producto agregado");
				
				}else{
					$("#errorProducto").text("Ocurrio un error al guardar");
					$("#errorProducto").show();
				}
			}).fail(function(data){
				alert(data);
			});
		}
	});


	$("#actualizarProducto").click(function(){
		var nombre = $("#nombre_ProductoE").val();
		var precio = $("#precio_ProductoE").val();
		var ganancia = $("#ganancia_ProductoE").val();
		var tipo = $("#tipoarreglo1E").val();
		var activo=0
		if(nombre==""){
			$("#debePonerNombreE").show();
			return false;
		}else if (precio == 0  || precio == "" || isNaN(precio)) {
			$("#debePonerPrecioE").show();
			return false;
		}else if (ganancia == 0  || ganancia == "" || isNaN(ganancia)) {
			$("#debePonerGananciaE").show();
			return false;
		}else if (tipo == 0  || tipo == ""){
			$("#debePonerTipoE").show();
			return false;
		}else{
			if($("#activo_Producto").is(':checked')) {activo = 1}
			var datos = {"tipo":"2","clave":$("#codigo_ProductoE").val(),"nombre_Producto":$("#nombre_ProductoE").val(),"precio_Producto":$("#precio_ProductoE").val(),"ganancia_Producto":$("#ganancia_ProductoE").val(),"tipoA":$("#tipoarreglo1E").val(),"idusuario":$("#iduser11").text(),"activo":activo};
			//style="display: none;" alert($("#iduser11").text());
			$.ajax(
			{	
				data:datos,
				url:"../php/crudProducto.php",
				type:"POST",
				async:true,
			}).done(function(data){
				if(data==1){
					$("#nombre_Producto").val(' ');
					$("#precio_Producto").val(' ');
					$("#ganancia_Producto").val(' ');
					$("#tipoarreglo1").val(' ');
					$("#ExitoProducto").val("Producto editado con exito");
					$("#ExitoProducto").show();
					vaciarProductos();
					cargarDatosProductos();
				}else{
					$("#errorProducto").text("Ocurrio un error al editar");
					$("#errorProducto").show();
				}
			}).fail(function(data){
				alert(data);
			})
		}
	});
	$("#btneliminarProducto").click(function(){
		borrarProducto();
	})
	$("#searchProductos").keyup(function(){
		$("#ExitoEmpleado").hide();
		$("#errorEmpleado").hide();
		 _this = this;
		 $.each($("#productos tr"), function() {
		 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
		 $(this).hide();
		 else
		 $(this).show();
		 });
	 });
	$("#agregarfoto").click(insertarProductoYa);

	function insertarProductoYa(evento){
	evento.preventDefault();
	var formData = new FormData($('#insertar-imagenes')[0]);
	$.ajax({
        url: "../php/imagen.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
     		$("#ExitoEmpleado").text("Foto Guardada con exito");
			$("#ExitoEmpleado").show();
        	vaciarFotoModal();
        	cargarImagenes();
        },
        error: function (msg) {
            showMsg("error", msg.statusText + ". Press F12 for details");
            console.log(msg);
        }
    });
}

});

function vaciarProductos(){
	var Parent = document.getElementById("productos");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}
function vaciarFotoModal(){
	$("#imagen").attr('src', '');
	$('#imagenn').val('');
	$("#agregarfoto").prop("disabled",true);
	
}

function vaciarImagenes(){
	var Parent = document.getElementById("cargaImagenes");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}

function cargarImagenes(){
	vaciarImagenes();
	var datos ={"clave":$("#codigo_ProductoE").val()};
	$.ajax(
	{	
		url:"../php/guardarImagen.php",
		type:"POST",
		data:datos,
		async:true
	}).done(function(data){
		var cadena= JSON.parse(data);
		for (var i = cadena.length - 1; i >= 0; i--) {
			var idImagen= cadena[i].img_intCodigo;
			var nuevoAlumno="<tr><td><img src='http://localhost/uyoasArteFloral/Floreria-Uyoas/imagenes/"+cadena[i].img_nvchImagen+".jpg'  class='img-responsive img-thumbnail'> <center><button class='btn btn-danger' onClick='abrirEliminarFoto("+'"'+idImagen+'"'+");' >Eliminar foto</button></center></td></tr>";
			//eliminar,,,,,onclick='eliminarFoto("+'"'+idImagen+'"'+")'
			var nuevaFila = document.createElement("TR");
			nuevaFila.innerHTML=nuevoAlumno;
		 	document.getElementById("cargaImagenes").appendChild(nuevaFila);
		}
		
	}).fail(function(data){
		alert("Error en el servidor");
	})
}

function abrirEliminarFoto(codigoFoto){
	$("#eliminarFotooo").show();
	$("#Codigo_FotoEliminar").val(codigoFoto);
}


function eliminarFoto(){
	var datos = {"clave":$("#Codigo_FotoEliminar").val()};
	$.ajax(
	{	
		url:"../php/eliminarFoto.php",
		type:"POST",
		data:datos,
		async:true
	}).done(function(data){
		alert(data);
		if(data=="1"){
			vaciarFotoModal();
			cargarImagenes();
		}else{
			alert("Error al eliminar");
		}
	});
}

function cargarDatosProductos(){ 
	$.ajax(
			{	
				url:"../php/consultaProducto.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var filaBases = cadena[i].pro_intCodigo+"+"+cadena[i].pro_nvcNombre+"+"+cadena[i].pro_ftlPrecio+"+"+cadena[i].pro_ftlGanancia+"+"+cadena[i].pro_intCodigoTipoProducto+"+"+cadena[i].pro__bitActivo+"+"+cadena[i].pro_dtFechaCreacion+"+"+cadena[i].usuario_cracion+"+"+cadena[i].pro_dtFechaModificacion+"+"+cadena[i].usuario_modificacion+"+"+cadena[i].pro_dtFechaEliminacion+"+"+cadena[i].usuario_eliminacion;
					var nuevoAlumno="<td WIDTH='1'>"+cadena[i].pro_intCodigo+"  </td><td WIDTH='200'>"+cadena[i].pro_nvcNombre+"</td><td WIDTH='200'>"+cadena[i].pro_ftlPrecio+"</td><td WIDTH='200'>"+cadena[i].pro_ftlGanancia+"</td><td WIDTH='200'>"+cadena[i].tipo_producto+"</td><td WIDTH='200'>"+cadena[i].pro__bitActivo+"</td><td WIDTH='200'><button class='btn btn-outline-secondary' data-toggle='modal' data-target='#editarProducto' onclick='pasarProducto("+'"'+filaBases+'"'+");consultaImagenes("+'"'+filaBases+'"'+");'>Editar</button><button class='btn btn-danger' data-toggle='modal' data-target='#eliminarProductoM' onclick='pasarProductoEliminar("+'"'+filaBases+'"'+")'>Eliminar</button></td>";
    				var nuevaFila = document.createElement("TR");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("productos").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
				console.log(data);
			})
}



function consultaImagenes(empleado){
	$("#ExitoEmpleado").hide();
	var sp =empleado.split("+");
	$("#imagen_producto1").val(sp[0]);
}



function pasarProducto(empleado){
	$("#ExitoEmpleado").hide();
	var sp =empleado.split("+");
	$("#codigo_ProductoE").val(sp[0]);
	$("#nombre_ProductoE").val(sp[1]);
	$("#precio_ProductoE").val(sp[2]);
	$("#ganancia_ProductoE").val(sp[3]);
	$("#tipoarreglo1E").val(sp[4]);
	if(sp[5]=='1'){
		$("#activo_Producto").prop( "checked", true );
	}
	$("#fechaCreacion_Producto").val(sp[6]);
	$("#empleadoCracion_Producto").val(sp[7]);
	$("#fechaModificacion_Producto").val(sp[8]);
	$("#empleadoModificacion_Producto").val(sp[9]);
	$("#fechaEliminacion_Producto").val(sp[10]);
	$("#empleadoEliminacion_Producto").val(sp[11]);
	cargarImagenes();
}

function pasarProductoEliminar(empleado){
	$("#ExitoEmpleado").hide();
	var sp =empleado.split("+");
	$("#Codigo_ProductoEliminar").val(sp[0]);
	$("#Nombre_ProductoEliminar").val(sp[1]);
}
function borrarProducto(){
	var datos = {"tipo":"3","clave":$("#Codigo_ProductoEliminar").val()};
	//style="display: none;" alert($("#iduser11").text());
	$.ajax(
	{	
		data:datos,
		url:"../php/crudProducto.php",
		type:"POST",
		async:true,
	}).done(function(data){
		if(data==1){
			$("#ExitoProducto").text("Producto borrado con exito");
			$("#ExitoProducto").show();
			vaciarProductos();
			cargarDatosProductos();
		}else{
			$("#errorProducto").text("Ocurrio un error al borrar");
			$("#errorProducto").show();
		}
	}).fail(function(data){
		alert(data);
	})
}




function cargarTipoCombo(){
	$.ajax(
	{	
		url:"../php/consultaTipoProducto.php",
		type:"GET",
		dataType: "json",
		success: function(data){
		  $.each(data,function(key, registro) {
		    $("#tipoarreglo1").append('<option value='+registro.tipoP_intCodigo+'>'+registro.tipoP_nvchDescripcion+'</option>');
		  });        
		},
		error: function(data) {
		  alert('error');
		}
	})
}
function cargarTipoComboE(){
	$.ajax(
	{	
		url:"../php/consultaTipoProducto.php",
		type:"GET",
		dataType: "json",
		success: function(data){
		  $.each(data,function(key, registro) {
		    $("#tipoarreglo1E").append('<option value='+registro.tipoP_intCodigo+'>'+registro.tipoP_nvchDescripcion+'</option>');
		  });        
		},
		error: function(data) {
		  alert('error');
		}
	})
}





