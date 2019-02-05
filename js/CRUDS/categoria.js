$(document).ready(function()
{
	$("#nuevoProducto1").click(function(){
		cargarDatosCategoria();
	});

	$("#guardarProducto").click(function(){
		var src = $("#imagen").attr('src');
		var valores = {"rutaorigen":src};
		$.ajax(
			{
				data:valores,	
				url:"php/imagen.php",
				type:"POST",
				async:true
			}
			).done(function(data){
				alert("Echo");
			}).fail(function(data){
				alert("Error en el servidor"+data);
			}).always(function(data){
				$("#nombreBases").val("");
			})
	});

	$(document).on('change', 'input[type=file]', function(e) {
		    // Obtenemos la ruta temporal mediante el evento
		    var TmpPath = URL.createObjectURL(e.target.files[0]);
		    // Mostramos la ruta temporal
    		$("#imagen").attr('src', TmpPath);
	});
});

function cargarDatosCategoria(){
	vaciarCategoria();
	$.ajax(
			{	
				url:"php/consultaCategoria.php",
				type:"GET",
				async:true
			}
			).done(function(data){
				var cadena= JSON.parse(data);
				for (var i = cadena.length - 1; i >= 0; i--) {
					var nuevoAlumno="<option value="+'"'+cadena[i].cate_intCodigo+'"'+">"+cadena[i].cate_vchNombre+"</option>";
    				var nuevaFila = document.createElement("option");
   					nuevaFila.innerHTML=nuevoAlumno;
   				 	document.getElementById("categoria").appendChild(nuevaFila);
				}
				
			}).fail(function(data){
				alert("Error en el servidor");
			});
}

function vaciarCategoria(){
	var Parent = document.getElementById("categoria");
	while(Parent.hasChildNodes())
	{
   		Parent.removeChild(Parent.firstChild);
	}
}