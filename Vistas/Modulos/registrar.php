<?php
$registrar = new EmpleadosC();
$registrar->registrarEmpleadosC();
?>


<style>
  body {
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }

  
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .centered-image {
    text-align: center;
    margin-bottom: 20px;
  }
</style>

<div class="col s12 m12 l12">
    <div class="romi col s12 m12 l2">
                
    </div>
    <div class="col s12 m12 l8">
        <form>
            <div class="centered-image">
            <img src="Vistas/imagenes/logo.png" alt="Imagen" width="150">
            </div>
            <div class="col s12 m12 l12">
            <h5 style="text-align: center">Bienvenido a MathBattles</h5>
            <p>Necesitamos algunos datos antes de iniciar*</p>  
            </div>
            <div class="row">
              <div class="col s12 m12 l12">
                  <div class="input-field col s12 m6 l6">
                  <i class="material-icons prefix">person</i>
                    <input  id="first_name2" type="text" class="validate">
                    <label class="active" name="nombre" for="first_name2">Nombres</label>
                  </div>
                  <div class="input-field col s12 m6 l6">
                    <input  id="first_name2" name="apellido" type="text" class="validate">
                    <label class="active" for="first_name2">Apellidos</label>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">contact_mail</i>
                <input id="email" type="email" class="validate">
                <label for="email">Correo electronico</label>
                <span class="helper-text" name="email" data-error="Email Incorrecto" data-success="Email Correcto">Correo Electronico</span>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">key</i>
                <input id="icon_prefix" type="password" class="validate">
                <label for="icon_prefix">Contraseña</label>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">key</i>
                <input id="icon_telephone" type="password" class="validate">
                <label for="icon_telephone">Repita Contraseña</label>
              </div>
            </div>

            <input type="submit" value="Registrarse">
        </form>
    </div>
    <div class="col s12 m12 l2">
                
    </div>
  
</div>





