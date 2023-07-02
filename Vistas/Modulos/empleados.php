<?php
//$empleados = new EmpleadosC();
//$pagina = $empleados->mostrarEmpleadosC();
//$empleados->borrarEmpleadoC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Niveles - Escalera de Caracol</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f2f2f2;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .level-row {
      display: flex;
    }

    .level-bubble {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #007BFF;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      margin: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="level-row">
      <a href="#" class="level-bubble waves-effect waves-light btn">1</a>
    </div>
    <div class="level-row">
      <a href="#" class="level-bubble waves-effect waves-light btn">2</a>
      <a href="#" class="level-bubble waves-effect waves-light btn">3</a>
    </div>
    <div class="level-row">
      <a href="#" class="level-bubble waves-effect waves-light btn">4</a>
      <a href="#" class="level-bubble waves-effect waves-light btn">5</a>
      <a href="#" class="level-bubble waves-effect waves-light btn">6</a>
    </div>
    <!-- Continuar con más filas y burbujas para más niveles -->
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

