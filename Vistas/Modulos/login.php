
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
    <div class="col s12 m12 l2">
                
    </div>
    <div class="col s12 m12 l8">
        <form method="post" action="">
            <div class="centered-image">
                <img src="Vistas/imagenes/logo.png" alt="Imagen" width="150">
            </div>
            <div class="col s12 m12 l12">
                <h5 style="text-align: center">Bienvenido a MathBattles</h5> 
            </div>
            

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">contact_mail</i>
                    <input id="email" name="correo" type="email" class="validate" required>
                    <label for="email">Correo electrónico</label>
                    <span class="helper-text" name="email" data-error="Email Incorrecto" data-success="Email Correcto">Correo Electrónico</span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">key</i>
                    <input id="icon_prefix" type="password" name="contraseña" class="validate" required>
                    <label for="icon_prefix">Contraseña</label>
                </div>
                
            </div>

            <div class="center-align">
                <input type="submit" value="Ingresar">
            </div>
            <div class="row"> 
            <div class="col s12 m12 l12">
                
            </div>

            <div class="center-align">
                <a href="index.php?ruta=ingreso" class="waves-effect waves-purple btn-flat">volver a inicio </a>
            </div>
            </div>            
        </form>
    </div>
    <div class="col s12 m12 l2">
                
    </div>
</div>