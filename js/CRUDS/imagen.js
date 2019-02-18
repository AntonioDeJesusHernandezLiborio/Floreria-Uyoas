$(document).ready(function()
{	

	$("#insertar-productos").submit(insertarProducto);

	function insertarProducto(evento){
		evento.preventDefault();
		var datos = new FormData($('#insertar-productos')[0]);
		$.ajax({
			url:'../php/imagen.php',
			type:'POST',
			data: datos,
			cache:false,
			error: function(){
				alert("Error de conexion.!");
			},
			contentType:false,
			processData:false,
		}).done(function(data){
			alert(data);
		}).fail(function(){
			alert("Error servidor");
		}).always(function(){
			alert("si se ejecuto");
		});
	}


	cargarDatosCategoria();
	$(document).on('change', 'input[type=file]', function(e) {
		    var TmpPath = URL.createObjectURL(e.target.files[0]);
    		$("#imagen").attr('src', TmpPath);
    	});
});


function cargarDatosCategoria(){
	//vaciarCategoria();
	$.ajax(
	{	
		url:"../php/consultaCategoria.php",
		type:"GET",
		dataType: "json",
		success: function(data){
		  $.each(data,function(key, registro) {

		    $("#categoria").append('<option value='+registro.cate_intCodigo+'>'+registro.cate_vchNombre+'</option>');
		  });        
		},
		error: function(data) {
		  alert('error');
		}
	})
}


function vaciarCategoria(){
	var Parent = document.getElementById("categoria");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}