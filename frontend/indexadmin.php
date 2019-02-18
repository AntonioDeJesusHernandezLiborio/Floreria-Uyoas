<?php session_start();

    if(isset($_SESSION['user'])){
       
    }else{
    	//echo "No has iniciado sesión";
    	echo "<script>
                alert('No has iniciado sesión');
                window.location= 'url.php'
    	</script>";
    	
        header ('location: ../login.php');
    }
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>INICIO-Uyoa'S Arte Floral</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	</head>
<body>
	<script type="text/javascript">

	</script>
	<header>
		<?php include '../Menu.php' ?>
	</header>
	
	<div class="container">
		<section class="main row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
				<p>
					<h1> Bienvenido a Uyoa'S Arte Floral</h1 >
					<h3>
					<br>
					Donde contraras arreglos para eventos especiales y flores para toda ocasión.
					visitanos no te arrepentiras estamos en en exterior del mercado laurel local 5 y 6 
					a unos pasos del cobaeh, Valle del Encinal, 43000 Huejutla, Hgo.
					</h3>
				</p>
			</article>	
			<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
				<p>
					<h4> Llama al 01 789 688 0152 </h4>
				</p>
			</aside>	
			<br>
			<br>
		</section>
		<div class="">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3 color1">
					<p>
						<img id="foto" src="../fotos/arreglo1.jpg" class="img-responsive img-thumbnail">
					</p>
				</div>
				<div class="col-xs-6 col-sm-6  col-md-3 color1">
					<p>
						<img id="foto" src="../fotos/arreglo2.jpg" class="img-responsive img-thumbnail">
					</p>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 color1">
					<p>
						<img id="foto" src="../fotos/arreglo3.jpg" class="img-responsive img-thumbnail">
					</p>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 color1">
					<p>
						<img id="foto" src="../fotos/arreglo4.jpg" class="img-responsive img-thumbnail">
					</p>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="" value="pulsame" id="ie"></input>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#ie").click(function(){
				alert($("#iduser1").text());
			})
		})

	</script>
	<div id="iduser1" style="display: none;" ><?php echo $TIPO; ?></div>
	<footer>
		<div class="container">
			<h4>s
				 &copy;copyright Uyoa'S Arte Floral 2019-2020 todos los derechos reservados
			</h4>
		</div>
	</footer>
   </body>
</html>