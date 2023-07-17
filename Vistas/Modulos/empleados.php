<?php
$empleados = new EmpleadosC();
$resultado = $empleados->ExtraernivelC();

$vidas = new EmpleadosC();
$resultadovidas = $vidas->ExtraervidasC();

$niveles = new EmpleadosC();
$resultadoniveles = $niveles->ExtraernivelesC();

$puntaje = 0;



foreach ($resultadoniveles as $key => $niveles) {
  $puntaje = $puntaje + $niveles['puntaje'];
  $numeroArray[] = $niveles['idNivel']; // Agregar cada número al nuevo array
}

if (!empty($numeroArray)) {
  $numeroMasAlto = max($numeroArray); // Obtener el número mayor del nuevo array
} else {
  $numeroMasAlto = 0;
}

?>

<style>
  /* Estilos CSS anteriores */
body {
    background: #0d47a1;
    margin: 0;
    padding: 0;
  }

  @font-face {
    font-family: 'Minecraftia';
    src: url('Vistas/fuentes/Minecraftia-Regular.ttf') format('truetype');
  }

  @keyframes heartbeat {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(0.8);
    }
    100% {
      transform: scale(1);
    }
  }

  h3 {
    font-family: 'Minecraftia', sans-serif;
  }

  nav {
    background-color: #0d47a1;
    padding: 10px;
  }

  nav ul {
    list-style-type: none;
    display: flex;
    align-items: center;
  }

  nav li {
    margin-right: 10px;
  }

  nav li:last-child {
    margin-right: 0;
  }

  nav img {
    width: 30px;
    height: 30px;
    margin-right: 5px;
    animation: heartbeat 1s infinite;
  }

  nav h3 {
    margin: 0;
    font-size: 16px;
  }

  .heart-container {
    position: fixed;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
  }

  .heart-container img {
    width: 30px;
    height: 30px;
    margin-bottom: 5px;
    animation: heartbeat 1s infinite;
  }

  .triangle-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 400px;
  }

  .row {
    display: flex;
    justify-content: center;
  }

  .col-4 {
    flex-basis: 33.33%;
  }

  .bubble {
  position: relative;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #f39c12;
  margin: 10px;
  animation-name: bounce-in;
  animation-duration: 1s;
  animation-delay: calc(var(--delay) * 0.1s);
  animation-fill-mode: both;
  display: flex;
  justify-content: center;
  align-items: center;
}

.bubble-number {
  font-family: 'Minecraftia', sans-serif;
  font-size: 24px;
  font-weight: bold;
  color: white;
}
.bubble:hover {
    animation-name: bubble-hover;
    animation-duration: 0.5s;
  }
  @keyframes bubble-hover {
    0% {
      transform: scale(1);
      opacity: 1;
    }
    50% {
      transform: scale(1.1);
      opacity: 0.7;
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  @keyframes bounce-in {
    0% {
      transform: scale(0);
      opacity: 0;
    }
    60% {
      transform: scale(1.2);
    }
    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  .smaller-image {
    width: 90%;
  }

  .content {
    min-height: calc(100vh - 100px);
  }

  .footer {
    background-color: #0d47a1;
    padding: 20px;
    text-align: center;
    position: sticky;
    bottom: 0;
  }

  .footer img {
    max-width: 100%;
    height: auto;
  }

  @media (max-width: 600px) {
    /* Estilos para dispositivos móviles */
    .row {
      flex-wrap: wrap;
    }

    .col-s12 {
      flex-basis: 100%;
    }
  }

  @media (min-width: 601px) and (max-width: 992px) {
    /* Estilos para tablets */
    .col-m6 {
      flex-basis: 50%;
    }
  }

  @media (min-width: 993px) {
    /* Estilos para pantallas más grandes */
    .col-l3 {
      flex-basis: 25%;
    }
  }
  .character-img {
    max-width: 100%;
    height: auto;
  }
  .col.s4.offset-s4 h3 {
    color: #f39c12;
  }

  .tooltip {
    position: relative;
    display: inline-block;
  }

  .tooltip-text {
    visibility: hidden;
    width: 120px;
    background-color: #000;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s;
  }

  .tooltip:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
  }
  /* Estilos CSS para las burbujas bloqueadas */
  .bubble.disabled {
    opacity: 0.5;
    pointer-events: none;
  }
  

</style>

<div class="content">
  <nav>
    <ul>
      <li><img src="Vistas/imagenes/espada.png" alt="Espada" class="heart-img1"></li>
      <li><h3 class="white-text text-darken-2">03</h3></li>
      <li><img src="Vistas/imagenes/diamante.png" alt="Diamante" class="heart-img1"></li>
      <li><h3 class="white-text text-darken-2">03</h3></li>
      <li><img src="Vistas/imagenes/estrella.png" alt="Estrella" class="heart-img1"></li>
      <li><h3 class="white-text text-darken-2">0<?=$puntaje?></h3></li>
    </ul>
  </nav>
  <div class="row">
      
      
    </div>

  <div class="row">
  <div class="col s2">
        
      </div>
  <div class="col s4">
        <a href='index.php?ruta=multijugador' class="waves-effect waves-light btn-large yellow black-text" ><i class="material-icons right">people_alt</i>Multijugador</a>
      </div>
     
    <div class="col s4 offset-s4"><h3>NIVELES</h3></div>
    
    <div class="col s4">
        <a href='index.php?ruta=salir' class="waves-effect waves-light btn-large yellow black-text" ><i class="material-icons right">logout</i>Salir</a>
      </div>
  </div>
  

  <div class="heart-container">
    <?php foreach ($resultadovidas as $key => $vidas): 
      
      ?>
      
      <?php switch ($vidas['nrovida']) {
        case 0:
          ?>
            
          <?php
              $_SESSION['vida']=$vidas['nrovida'];

          break;
        case 1:
          ?>
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <?php

            $_SESSION['vida']=$vidas['nrovida'];
          break;
        case 2:
          ?>
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <?php
          $_SESSION['vida']=$vidas['nrovida'];
          break;
        case 3:
          ?>
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <img src="Vistas/imagenes/corazon.png" alt="Corazón 1" class="heart-img">
          <?php
          $_SESSION['vida']=$vidas['nrovida'];
          break;
        default:
          break;
      } ?>
    <?php endforeach; ?>
  </div>

  <div class="row">
    <div class="col s12 push-s5 center-align">
      <div class="triangle-container">
        <?php foreach ($resultado as $key => $value): ?>
          <?php if ($key == 0 || $key == 1 || $key == 3 || $key == 6): ?>
            <div class="row">
          <?php endif; ?>

          <div class="col-4">
            <?php if ($value['idNivel'] > $numeroMasAlto || $vidas['nrovida']==0): ?>
              <div class="bubble disabled">
                <span class="bubble-number"><span class="material-icons">lock</span></span>
                
              </div>
            <?php else: ?>
              <?php if ($value['nombreNivel'] != "proximamente") {
                ?>
                <a href='index.php?ruta=subnivel&id=<?=$value['idNivel']?>' class="tooltip">
                <?php
              } else {
                ?>
                <a href='index.php?ruta=empleados' class="tooltip">
                <?php
              }
                ?>
              
                <div class="bubble">
                  <span class="bubble-number"><?=$value['idNivel']?></span>
                </div>
                <span class="tooltip-text"><?=$value['nombreNivel']?></span>
              </a>
            <?php endif; ?>
          </div>

          <?php if ($key == 0 || $key == 2 || $key == 5 || $key == 10): ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
   
  </div>

  

  <div class="col s5 pull-s7">
    <a href="pagina20.html">
      <img class="responsive-img smaller-image character-img" src="Vistas/imagenes/image10.gif">
    </a>
  </div>
</div>

<div class="footer">
  <img src="Vistas/imagenes/image1.png" alt="Footer Image">
</div>

<script>
  const hearts = document.querySelectorAll('.heart-img');

  function showHeartsSequentially() {
    let index = 0;

    function showNextHeart() {
      if (index < hearts.length) {
        hearts[index].style.display = 'block';
        index++;
        setTimeout(showNextHeart, 500);
      }
    }

    showNextHeart();
  }

  showHeartsSequentially();
</script>