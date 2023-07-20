<?php
$empleados = new EmpleadosC();
$resultado = $empleados->MostrarsubnivelC();



foreach ($resultado as $key => $values) {
  
  $titulo = $values['nombreNivel'];
  $descripcion = $values['descripcion'];
}

$niveles = new EmpleadosC();
$resultadoniveles = $niveles->ExtraernivelesC();
$contrador=0;
foreach ($resultadoniveles as $key => $niveles) {
  if ($_SESSION['Nivel']==$niveles['idNivel']) {
    $contrador= $contrador+1;
    $numeroArray[] = $contrador; // Agregar cada número al nuevo array
    
  }
  }
  

if (!empty($numeroArray)) {
  $numeroMasAlto = max($numeroArray); // Obtener el número mayor del nuevo array
  $_SESSION['detecccion']=$numeroMasAlto;
  
} else {
  $numeroMasAlto = 0;
}


$respuestaCorrecta=1;
?>

<style>
  body {
    font-family: 'Minecraftia', sans-serif;
    background-color: #024caf;
  }

  .bubbles-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }

  .bubble {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background-color: #f39c12;
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    animation-name: wave;
    animation-duration: 1s;
    animation-fill-mode: both;
    animation-iteration-count: infinite; /* Repetición infinita de la animación */
  }

  @keyframes wave {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-50px);
    }
  }

  .bubble:nth-child(odd) {
    animation-delay: 0.1s;
  }

  .bubble:nth-child(even) {
    animation-delay: 0.3s;
  }
  .tooltip {
    position: relative;
    display: inline-block;
  }
</style>

<div class="col s12">
  <h5 class="center-align"><?= $titulo ?></h5>
</div>
<div class="row">
  <div class="col s3"></div>
  <div class="col s6">
    <p class="sublevel-description" style="text-align: justify;">
      <?= $descripcion ?>
    </p>
  </div>
  <div class="col s3">
    <a href='index.php?ruta=empleados' class="waves-effect waves-light btn-large yellow black-text">
      <i class="material-icons right">assignment_return</i>Volver
    </a>
  </div>
</div>

<div class="bubbles-container">
  <?php foreach ($resultado as $key => $vidas) : ?>
    <div class="bubble">
      <?php if (($key+1) <= $numeroMasAlto) : ?>
        <a href="index.php?ruta=pregunta&idsubnivel=<?= $vidas['idSubnivel'] ?>">
          <span class="bubble-number"><?= $key + 1 ?></span>
        </a>
      <?php else : ?>
        <span class="bubble-number">
          <i class="material-icons">lock</i>
        </span>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>




  <style>
  body {
    font-family: 'Minecraftia', sans-serif;
    background-color: #024caf;
  }

  .progress-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin-top: 20px;
    position: relative;
  }

  .centered-image {
    text-align: center;
    margin-bottom: 20px;
  }

  .progress {
    background-color: #fed708;
    position: relative;
    height: 20px;
    width: 600px;
    background-color: #f5f5f5;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #ccc;
    box-sizing: border-box;
  }

  .determinate {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: #4caf50;
    border-radius: 10px;
  }

  .time {
    position: absolute;
    top: 0;
    right: -70px;
    display: flex;
    align-items: center;
    font-weight: bold;
  }

  .card-question {
    margin-top: 20px;
    background-color: #fed708;
    border: 2px solid black;
    position: relative;
    padding: 20px;
  }

  .card-question::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 40px;
    background-image: url('Vistas/imagenes/estrella.png');
    background-size: cover;
  }

  .card-answer {
    border: 2px solid black;
  }

  .selected {
    background-color: #fed708 !important; /* Cambia el color de fondo seleccionado a #fed708 */
    color: black !important; /* Cambia el color de texto seleccionado a negro */
  }

  .card-button {
    background-color: #fed708;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .card-button:hover {
    background-color: #e0e0e0;
  }

  .card-button:active {
    background-color: #bdbdbd;
  }

  #fireworks-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 40%;
    height: 40%;
    z-index: 9999;
    pointer-events: none;
  }

  .firework {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: #FFD700;
    border-radius: 50%;
  }

  .particle {
    position: absolute;
    top: 100%;
    left: 50%;
    width: 4px;
    height: 4px;
    background-color: #FFD700;
    border-radius: 50%;
    animation: particle 2s ease-out infinite;
  }

  @keyframes particle {
    0% {
      transform: translate(-50%, 0);
      opacity: 1;
    }
    100% {
      transform: translate(-50%, -100px);
      opacity: 0;
    }
  }
</style>

<div class="card card-question card-button">
  <div class="card-content center-align">
  
    <span class="card-title center-align">Pregunta 1</span>
    <div id="fireworks-container"></div>
  </div>
</div>

<div class="row">
  <div class="col s12 m6 offset-m3">
    <div class="progress-container">
      <div class="progress">
        <div class="determinate"></div>
      </div>
      <div class="time" id="countdown">10</div>
    </div>

    <div class="card card-question card-button">
      <div class="card-content">
        <p class="center-align">¿Cuánto es 1+1?</p>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m6">
        <div class="card card-answer card-button" onclick="selectAnswer(1)">
          <div class="card-content center-align">
            <p>1</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card card-answer card-button" onclick="selectAnswer(2)">
          <div class="card-content center-align">
            <p>2</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card card-answer card-button" onclick="selectAnswer(3)">
          <div class="card-content center-align">
            <p>3</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card card-answer card-button" onclick="selectAnswer(4)">
          <div class="card-content center-align">
            <p>4</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  var selectedAnswer = null;

  function selectAnswer(answer) {
    selectedAnswer = answer;
    $('.card-answer').removeClass('selected');
    if (answer !== null) {
      $('.card-answer[data-answer="' + answer + '"]').addClass('selected');
      submitAnswers(); // Llama a la función submitAnswers() después de seleccionar la respuesta
    }
  }

  function submitAnswers() {
    if (selectedAnswer !== null) {
      if (selectedAnswer === 1) {
        createFirework(); // Llama correctamente al método createFirework()
        showStar(); // Muestra la estrella al seleccionar la primera pregunta
        console.log("bien");
      } else {
        console.log("mal");
      }
    } else {
      alert('Por favor, selecciona una respuesta');
    }
  }

  function createFirework() {
    var firework = document.createElement('div');
    firework.className = 'firework';

    var particle = document.createElement('div');
    particle.className = 'particle';

    firework.appendChild(particle);
    document.getElementById('fireworks-container').appendChild(firework);

    setTimeout(function() {
      firework.parentNode.removeChild(firework);
    }, 2000);
  }

  function showStar() {
    var starImg = document.createElement('img');
    starImg.src = 'Vistas/imagenes/estrella.png';
    starImg.className = 'star-image';

    var questionCard = document.querySelector('.card-question');
    var cardContent = questionCard.querySelector('.card-content');
    cardContent.appendChild(starImg);
  }
</script>

<script>

  $(document).ready(function() {
  var progressBar = $('.determinate');
  var progressWidth = $('.progress').width();
  var animationDuration = 10000; // Duración en milisegundos (10 segundos)
  var countdownElement = $('#countdown');
  var countdown = parseInt(countdownElement.text());

  var interval = setInterval(function() {
    countdown--;
    countdownElement.text(countdown);

    if (countdown === 0) {
      clearInterval(interval);
    }
  }, 1000);

  progressBar.animate({ width: 0 }, animationDuration, 'linear', function() {
    // Cuando la animación finalice, establecer el ancho a 100%
    progressBar.width(progressWidth);
  });
});
</script>