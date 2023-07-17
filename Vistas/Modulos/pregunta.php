
<?php
$pregunta = new EmpleadosC();
$resultadopregunta = $pregunta->ExtraerpreguntaC();

foreach ($resultadopregunta as $key => $niveles) {

  $operacion=$niveles['operacion'];
  $respuesta=$niveles['respuesta'];
  $idSubnivel=$niveles['idSubnivel'];
  


}
function generarNumero() {
  return rand(1, 4);
}

$usuariopregunta=$_SESSION['idusuario'];
$idnivelpregunta=$_SESSION['Nivel'];
$vidausuario=$_SESSION['vida'];
// Ejemplo de uso
$aleatorio = generarNumero();



$respuestaCorrecta=$respuesta;


$pdo = new PDO("mysql:host=localhost;dbname=mathbathles", "root", "");

// Función para actualizar datos en la base de datos cuando se acierta la pregunta
function actualizarAcierto($pdo, $idSubnivel) {
  $query = "UPDATE tabla_preguntas SET aciertos = aciertos + 1 WHERE idSubnivel = :idSubnivel";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':idSubnivel', $idSubnivel);
  $stmt->execute();
}

// Función para actualizar datos en la base de datos cuando se falla la pregunta
function actualizarFallo($pdo, $idSubnivel) {
  $query = "UPDATE tabla_preguntas SET fallos = fallos + 1 WHERE idSubnivel = :idSubnivel";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':idSubnivel', $idSubnivel);
  $stmt->execute();
}
?>
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


  .star-image {
    width: 80px; /* Ajusta el tamaño de la estrella a tu preferencia */
    height: 80px; /* Ajusta el tamaño de la estrella a tu preferencia */
    animation: rotate-pulse 4s linear infinite; /* Combina las animaciones de rotación y pulsación */
  }

  @keyframes rotate-pulse {
    0% {
      transform: rotate(0deg) scale(1);
    }
    50% {
      transform: rotate(360deg) scale(1);
    }
    60% {
      transform: rotate(360deg) scale(1.2);
    }
    100% {
      transform: rotate(0deg) scale(1);
    }
  }

  .plus-100 {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
    color: green;
    font-weight: bold;
    display: none; /* Inicialmente oculto */
  }

  .plus-101 {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
    color: green;
    font-weight: bold;
    display: none; /* Inicialmente oculto */
  }
</style>

<div class="row">
  <div class="col s12 m6 offset-m3">
    <div class="progress-container">
      <div class="progress">
        <div class="determinate"></div>
      </div>
      <div class="time" id="countdown">10</div>
    </div>
    <div class="card card-question card-button">
      <div class="card-content center-align">
        <span class="card-title center-align">Pregunta 1</span>
        <div class="star-container">
          
          <span id="plus-101" class="plus-101">+10 Perfecto</span>
          <span id="plus-100" class="plus-100">+0 Mal</span>
        </div>
        <div id="fireworks-container"></div>
        
      </div>
    </div>
    <div class="card card-question card-button">
      <div class="card-content">
        <p class="center-align">¿Cuánto es <?=$operacion?>?</p>
      </div>
    </div>
    <div class="row">
      <?php
      function generarNumero1() {
        return rand(1, 20);
      }

      for ($contador = 1; $contador <= 4; $contador++) {
        if ($contador == $aleatorio) {
      ?>
          <div class="col s12 m6">
            <div class="card card-answer card-button" data-answer="<?=$respuesta?>" onclick="selectAnswer(<?= $respuesta ?>)">
              <div class="card-content center-align">
                <p><?=$respuesta?></p>
                <span class='fireworks-container'></span>
              </div>
            </div>
          </div>
      <?php
        } else {
          $aleatorio1 = generarNumero1();
          $res = $respuesta + $aleatorio1;
      ?>
          <div class="col s12 m6">
            <div class="card card-answer card-button" data-answer="<?=$res?>" onclick="selectAnswer(<?= $res ?>)">
              <div class="card-content center-align">
                <p><?=$res?></p>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>

<script>
  var selectedAnswer = null;
  var respuestaCorrecta = <?php echo $respuestaCorrecta ?>;

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
      if (selectedAnswer === respuestaCorrecta) {
        createFirework(); // Llama correctamente al método createFirework()
        showStar();
        showPoints(); // Muestra las estrellas y el "+10" al seleccionar la primera pregunta

         // Actualizar datos en la base de datos cuando se acierta la pregunta
       
        $.ajax({
        type: 'POST',
        url: 'Vistas/actualizar_acierto.php', // Ruta a tu archivo PHP que actualiza los datos de acierto
        data: { 
          idSubnivel: <?php echo $idSubnivel ?>,
          usuariopregunta: <?php echo $usuariopregunta ?>,
          idnivelpregunta: <?php echo $idnivelpregunta ?>,
          vidausuario: <?php echo $vidausuario ?>
        
        },
        success: function(response) {
          $.confirm({
            title: 'CORRECTO',
            content: 'Marcaste la respuesta correcta',
            buttons: {
                hide: {
                    text: '',
                    action: function () {}
                }
            },
            closeIcon: false,
            autoClose: 'hide|5000',
            boxWidth: '300px',
            useBootstrap: false,
            backgroundDismiss: true,
            backgroundDismissAnimation: 'shake',
            containerFluid: false,
            type: 'blue',
            typeAnimated: true,
            animation: 'scale',
            animateFromElement: false,
            theme: 'modern',
            onOpen: function () {
                $('.jconfirm').css('background-color', 'blue');
            },
            onClose: function () {
                window.location.href = 'index.php?ruta=subnivel&id=' + <?= $idnivelpregunta ?>;
            }
        });
          console.log('Datos actualizados correctamente (acierto)');
        },
        error: function() {
          console.log('Error al actualizar los datos (acierto)');
        }
        });
         
        
        console.log("bien");

        
      } else {
        showStar();
        showPointsmen();
        
        $.ajax({
        type: 'POST',
        url: 'Vistas/actualizar_fallo.php', // Ruta a tu archivo PHP que actualiza los datos de acierto
        data: { 
          idSubnivel: <?php echo $idSubnivel ?>,
          usuariopregunta: <?php echo $usuariopregunta ?>,
          idnivelpregunta: <?php echo $idnivelpregunta ?>,
          vidausuario: <?php echo $vidausuario ?>
        
        },
        success: function(response) {
          console.log('Datos actualizados correctamente (fallo)');

          $.confirm({
              title: 'MAL',
              content: 'Marcaste la respuesta incorrecta',
              buttons: {
                  hide: {
                      text: '',
                      action: function () {}
                  }
              },
              closeIcon: false,
              autoClose: 'hide|5000',
              boxWidth: '300px',
              useBootstrap: false,
              backgroundDismiss: true,
              backgroundDismissAnimation: 'shake',
              containerFluid: false,
              type: 'orange',
              typeAnimated: true,
              animation: 'scale',
              animateFromElement: false,
              theme: 'modern',
              onOpen: function () {
                  $('.jconfirm').css('background-color', 'yellow');
              },
              onClose: function () {
                  window.location.href = 'index.php?ruta=empleados';
              }
          });
        },

        error: function() {
          console.log('Error al actualizar los datos (fallo)');
        }
        });
       
       
       

        console.log("juansito");
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

  

  function showPoints() {
    var plus101 = document.getElementById('plus-101');
    plus101.style.display = 'block';
  }
  function showPointsmen() {
    var plus100 = document.getElementById('plus-100');
    plus100.style.display = 'block';
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
