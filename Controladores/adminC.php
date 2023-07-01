<?php  //Controladores/adminC.php
class AdminC{
    function __construct(){
        $this->adminM = new AdminM();
    }

    public function IngresoC(){
        if(isset($_SESSION['Ingreso']))
            header("location: index.php?ruta=empleados");
        if(isset($_POST["usuarioI"])){
            $datosC = array(    
                        "usuario"=>$_POST["usuarioI"], 
                        "clave"=>$_POST["claveI"]);
            $result = $this->adminM->IngresoM($datosC);
            if(isset($result)){
                session_start();
                $_SESSION['Ingreso']=true;
                header("location: index.php?ruta=empleados");
            }
            else
                echo "ERROR AL INGRESAR";
        }
    }

    public function registrarEmpleadosC(){
        
        if (isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['nombre'])) {
            echo "ingreso";
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contraseña'];
            $contrasena1 = $_POST['repitecontraseña'];
            $roll = $_POST['roll'];
            $datosC = array(    
                "correo"=>$_POST["correo"]);
            
            $result = $this->adminM->VerificardatosM($datosC);

            if ($result) {

                if ($contrasena === $contrasena1) {
                    // Las contraseñas coinciden, continuar con el registro
                    // ...
                    $datosC = array(    
                        "nombre"=>$nombre,
                        "apellido"=>$apellido,
                        "correo"=>$correo,
                        "contrasena"=> $contrasena,
                        "roll"=>$roll);

                    $result = $this->adminM->Registrarusuario($datosC);

                    echo "<script>
                                $.confirm({
                                    title: 'Alerta',
                                    content: 'Sus Datos Se Registraron satisfactoriamente',
                                    type: 'green',
                                    theme: 'material',
                                    boxWidth: '30%',
                                    useBootstrap: false,
                                    buttons: {
                                    confirm: {
                                        text: 'Ingresar',
                                        btnClass: 'btn-green',
                                        keys: ['enter'],
                                        action: function() {
                                            location.href='index.php?ruta=login';
                                        }
                                    }
                                    }
                                });
                  
                      </script>";


                } else {
                    // Las contraseñas no coinciden, mostrar mensaje de error
                    echo "<script>
                        $.confirm({
                            title: 'Alerta',
                            content: 'Las contraseñas no coinciden. Por favor, verifica.',
                            type: 'red',
                            theme: 'material',
                            boxWidth: '30%',
                            useBootstrap: false,
                            buttons: {
                                confirm: {
                                    text: 'Intentar Denuevo',
                                    btnClass: 'btn-red',
                                    keys: ['enter'],
                                    action: function() {
                                        location.href='index.php?ruta=registrar';
                                    }
                                }
                            }
                        });
                    </script>";
            }    
            } else {
                // El correo ya existe, mostrar mensaje de error
                echo "<script>
                            $.confirm({
                                title: 'Alerta',
                                content: 'El correo ya está registrado. Por favor, elige otro correo.',
                                type: 'red',
                                theme: 'material',
                                boxWidth: '30%',
                                useBootstrap: false,
                                buttons: {
                                confirm: {
                                    text: 'Intentar Denuevo',
                                    btnClass: 'btn-red',
                                    keys: ['enter'],
                                    action: function() {
                                        location.href='index.php?ruta=registrar';
                                    }
                                }
                                }
                            });
                      </script>";
            }
            

        }

       
        
    }

    public function salirC(){
        session_destroy();
        header("location:index.php?=ingreso");
    }
}
?>