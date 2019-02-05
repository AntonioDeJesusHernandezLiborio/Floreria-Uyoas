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
					//alert("Entra al php");
					$("#login").val("Login");
					if (data=="1") {
						alert("Bienvenido");
						$(location).attr('href','frontend/indexadmin.php')
					}else{
						//alert("Vale mierda");
						$('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dimiss='alert'>&times;</button><strong>¡Error!</strong> Los datos son incorrectos. </div>")
					}
				}
			});

		}
		else{
			alert("Favor de llenar todos los campos -_-");
		}
	});
});