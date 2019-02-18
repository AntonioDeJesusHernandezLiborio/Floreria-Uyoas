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
	<title>En proceso-Uyoa'S Arte Floral</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="shortcut icon" href="../logo/logo_version/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"> </script>
	<script type="text/javascript" src="../js/nuevoBase.js"></script>
	</head>
<body>
	<header>
		<?php include '../Menu.php' ?>
	</header>
	
	<div class="container">
		<section class="main row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12 text-justify text-muted"  class="tama" >
				<p>
					<h1> Estamos trabajando en ello....</h1 >
					<h3>
					<br>
					Ésta pagina está en proceso....
					</h3>
					<img src="def.jpg" alt="Working" width="80%" height="auto">
				</p>
			</article>	
				
			<br>
			<br>
		</section>
		
	</div>

   </body>
</html>