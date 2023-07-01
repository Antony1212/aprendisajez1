<?php  //Controladores/adminC.php
class AdminC{
    function __construct(){
        $this->adminM = new AdminM();
    }

    public function IngresoC(){
        if(isset($_SESSION['Ingreso'])) {
            header("location: index.php?ruta=Principal");
        }

        if(isset($_POST["correo"] ))
        {
            
            $datosC = array(

                        "correo"=>$_POST["correo"], 
                        "contraseña"=>$_POST["contraseña"]);

            $tablaBD = "usuario";

            $inicio = $this->adminM->VerificardatosM($datosC);
              

            if (!$inicio) {

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "El Usuario No Existe",
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Intentar De Nuevo',
                                btnClass: 'btn-blue',
                                action: function(){
                                    location.href="index.php?ruta=ingresousuario";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }elseif ($inicio->num_rows)
            {
                
                $pw_temp=$_POST['contraseña'];
                $row = $inicio->fetch_array(MYSQLI_NUM);
                $inicio->close();
                if (password_verify($pw_temp, $row[4])){
                  
                    $username=$row[1];
                    $id_u=$row[0];
                    $roll=$row[5];
                    if ( $roll=="Mecanico") {
                        $rango=$row[9];
                        $_SESSION['foto']=$row[11];
                        $_SESSION['nombre']=$row[2];
                        $_SESSION['apellido']=$row[3];
                        $_SESSION['rango']=$rango;
                        $_SESSION['Equipo']=$row[10];
                    }elseif ($roll=="Empresa") {
                        $_SESSION['nombre']=$row[2];
                    
                    }elseif ($roll=="Cliente") {
                        $_SESSION['nombre']=$row[2];
                    $_SESSION['apellido']=$row[3];
                    }elseif ($roll=="administrador") {
                        $_SESSION['nombre']=$row[2];
                        $_SESSION['apellido']=$row[3];
                    }

                    

                    
                   
                            
                    $_SESSION['username']=$username;
                    $_SESSION['id_u']=$id_u;
                    $_SESSION['roll'] =$roll;
                    
                    session_start();
                    setcookie('username',$_SESSION['username'],time()+ 5);
                    $GLOBALS['entrada']=true;
                    $_SESSION['Ingreso']=true;
                    header("location: index.php?ruta=Principal");
                               
                        
                        

                    
                }else {

                    ?>
                        <script>
                            $.confirm({
                                theme:'Material',
                                title: 'Error',
                                content: "Contraseña Incorrecta Ingrese Nuevamente",
                                type: 'red',
                                typeAnimated: true,
                                columnClass: 'medium',
                                buttons: {
                                    tryAgain: {
                                        text: 'Intentar De Nuevo',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=ingresousuario";
                                        }
                                    },
                                    
                    
                                }
                                });
                        </script>
                    <?php

                }
         
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