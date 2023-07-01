<!DOCTYPE html>  <!-- Vistas/plantilla.php-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>CRUD</title>
		<!--Import Google Icon Font-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	
	
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
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