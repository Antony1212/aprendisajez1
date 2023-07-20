<?php  //Controladores/adminC.php
class AdminC{
    function __construct(){
        $this->adminM = new AdminM();
    }

    public function IngresoC(){
        if(isset($_SESSION['Ingreso'])) {
            header("location: index.php?ruta=empleados");
        }
       
        if(isset($_POST["correo"] ))
        {
            
            $datosC = array(

                        "correo"=>$_POST["correo"], 
                        "contraseña"=>$_POST["contraseña"]);

            $tablaBD = "usuario";

            $inicio = $this->adminM->VerificardatosM($datosC);

            if ($inicio) {
                
                echo "<script>
                        $.confirm({
                            title: 'Alerta',
                            content: 'El correo no está registrado en nuestra página',
                            type: 'red',
                            theme: 'material',
                            boxWidth: '30%',
                            useBootstrap: false,
                            buttons: {
                                confirm: {
                                    text: 'Intentar de Nuevo',
                                    btnClass: 'btn-blue',
                                    keys: ['enter'],
                                    action: function() {
                                        location.href='index.php?ruta=login';
                                    }
                                },
                                return: {
                                    text: 'Registrarse',
                                    btnClass: 'btn-green',
                                    keys: ['enter'],
                                    action: function() {
                                        location.href='index.php?ruta=registrar';
                                    }
                                }
                            }
                        });
                    </script>";
            } else {

                $datos = $this->adminM->ExtraerdatosM($datosC);

                $idUsuariob = $datos['idusuario'];
                $nombreb = $datos['Nombre'];
                $apellidosb = $datos['Apellidos'];
                $correob = $datos['Correo'];
                $contrasenab = $datos['Contraseña'];
                $rollb = $datos['Roll'];
                $contrasena=$_POST["contraseña"];
                
                
               
                if (password_verify($contrasena,$contrasenab)) {
                    // Las contraseñas coinciden, continuar con el inicio de sesión
                    
                    
                    $_SESSION['idusuario']=$idUsuariob;
                    $_SESSION['roll'] =$rollb;
                    $_SESSION['nombre']=$nombreb;
                    $_SESSION['apellido']=$apellidosb;
                    $_SESSION['correo']=$correob;
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    setcookie('nombre',$_SESSION['nombre'],time()+ 5);
                    $GLOBALS['entrada']=true;
                    $_SESSION['Ingreso']=true;


                   
                    echo "<script>
                            M.toast({html: 'Sesión iniciada Exitosamente', displayLength: 1500, completeCallback: function() {
                                location.href = 'index.php?ruta=empleados';
                            }});
                        </script>";
                    
                } else {
                    
                    
                    echo "<script>
                        $.confirm({
                            title: 'Alerta',
                            content: 'Contraseña incorrecta. Por favor, verifica.',
                            type: 'red',
                            theme: 'material',
                            boxWidth: '30%',
                            useBootstrap: false,
                            buttons: {
                                confirm: {
                                    text: 'Intentar de Nuevo',
                                    btnClass: 'btn-red',
                                    keys: ['enter'],
                                    action: function() {
                                        location.href='index.php?ruta=login';
                                    }
                                }
                            }
                        });
                    </script>";
                }//

            }


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
                    $result = $this->adminM->CrearM($datosC);        
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