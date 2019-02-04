function nuevaArreglo(){
	var codigo = prompt("Codigo");
	var nombre = prompt("Nombre");
	if(codigo!=null && nombre!=null){
		var nuevoBase="<tr><td>  "+codigo+"  </td> <td>  "+nombre+"  </td></tr>";
    	var nuevaFila = document.createElement("TR");
   		nuevaFila.innerHTML=nuevoBase;
   	 	document.getElementById("arreglo").appendChild(nuevaFila);
	}
}

function agregarBase(){
	var codigo = prompt("Codigo");
	var nombre = prompt("Nombre");
	if(codigo!=null && nombre!=null){
		var nuevoBase="<tr><td>  "+codigo+"  </td> <td>  "+nombre+"  </td></tr>";
    	var nuevaFila = document.createElement("TR");
   		nuevaFila.innerHTML=nuevoBase;
   	 	document.getElementById("bases").appendChild(nuevaFila);
	}
}
function agregarJardinera(){
	var codigo = prompt("Codigo");
	var nombre = prompt("Nombre");
	if(codigo!=null && nombre!=null){
		var nuevoBase="<tr><td>  "+codigo+"  </td> <td>  "+nombre+"  </td></tr>";
    	var nuevaFila = document.createElement("TR");
   		nuevaFila.innerHTML=nuevoBase;
   	 	document.getElementById("jardineras").appendChild(nuevaFila);
	}
}

function agregarAlfombra(){
	var codigo = prompt("Codigo");
	var nombre = prompt("Nombre");
	if(codigo!=null && nombre!=null){
		var nuevoBase="<tr><td>  "+codigo+"  </td> <td>  "+nombre+"  </td></tr>";
    	var nuevaFila = document.createElement("TR");
   		nuevaFila.innerHTML=nuevoBase;
   	 	document.getElementById("alfombra").appendChild(nuevaFila);
	}
}