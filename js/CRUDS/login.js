

$(document).ready(function() {
	$("#login").click(function(){
		//alert("Boton ha reaccionado!! Backa!!");
		var user = $("#user").val();
		var pass = $("#pass").val();
		//alert("Agarró datos");
		if ($.trim(user).length > 0 && $.trim(pass).length > 0) {
			$.ajax({
				url:"php/loguear.php",
				method:"POST",
				data:{user:user, pass:pass},
				cache:"false",
				beforeSend:function(){
					$("#login").val("Conectando...");
				},

				success:function(data) {
					var sp =data.split("-");
					$("#login").val("INICIAR SESION");
					if (sp[1]=='1') {
						$(location).attr('href','frontend/indexadmin.php?tipo='+sp[0]);
						
					}else{
						$('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dimiss='alert'>&times;</button><strong>¡Error!</strong> Los datos son incorrectos. </div>")
					}
				}
			});

		}
		else{
			alert("Campos vacios");
		}
	});
});