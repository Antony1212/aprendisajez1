<!DOCTYPE html>  <!-- Vistas/plantilla.php-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>MathBattles</title>
		<link rel="icon" href="Vistas/imagenes/logo.png" type="image/x-icon">
		<!--Import Google Icon Font-->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<!--Import Animate CSS-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <style>
    
	@font-face {
    font-family: 'Minecraftia';
    src: url('Vistas/fuentes/Minecraftia-Regular.ttf') format('truetype');
 	 }
	  body {
      font-family: 'Minecraftia', sans-serif;
    }
  </style>
			
	</head>

	<body>
	
	<script>
		$(document).ready(function() {
			M.updateTextFields();
		});
	</script>
	<script>
		$(document).ready(function(){
			$('select').formSelect();
		});
	</script>
		
		<?php
			date_default_timezone_set("America/Lima");
		
			
			$fechaactual= date('Y-m-d H:i:s');
			session_start();
			$rutasC = new RutasC();
			
		?>	
		<section>

			<?php
				$modulo = $rutasC->procesaRutasC();
				include $modulo;
			?>	
		</section>
	
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>

</html>