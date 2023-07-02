<?php  //Modelos/adminM.php
    require_once "conexionBD.php";

    class AdminM extends ConexionBD{
        public function IngresoM($datosC, $tablaBD = 'administradores'){
            $cbd = ConexionBD::cBD();
            $usuario = $datosC['usuario'];
            $clave = $datosC['clave'];
            $query = "SELECT usuario, clave FROM $tablaBD 
                WHERE usuario='$usuario' AND clave='$clave'";
            $result = $cbd->query($query);
            return $result->fetch_array(MYSQLI_ASSOC);
        }
        
        public function VerificardatosM($datosC, $tablaBD = 'usuario') {
            $cbd = ConexionBD::cBD();
            $correo = $datosC['correo'];
        
            // Preparar la consulta con un marcador de posición
            $query = "SELECT * FROM $tablaBD WHERE correo = ?";
            $stmt = $cbd->prepare($query);
        
            // Vincular el parámetro con el valor
            $stmt->bind_param("s", $correo);
        
            // Ejecutar la consulta preparada
            $stmt->execute();
        
            // Obtener el resultado
            $result = $stmt->get_result();
        
            // Obtener el número de filas del resultado
            $numRows = $result->num_rows;
        
            // Cerrar el statement y la conexión
            $stmt->close();
            $cbd->close();
        
            // Comprobar si el correo existe
            if ($numRows > 0) {
                // El correo ya existe, mostrar mensaje de error
               
                return false;
            } else {
                // El correo no existe, continuar con el registro
                return true;
            }
        }

        public function ExtraerdatosM($datosC, $tablaBD = 'usuario') {
            $cbd = ConexionBD::cBD();
            $correo = $datosC['correo'];
        
            // Preparar la consulta con un marcador de posición
            $query = "SELECT * FROM $tablaBD WHERE correo = ?";
            $stmt = $cbd->prepare($query);
        
            // Vincular el parámetro con el valor
            $stmt->bind_param("s", $correo);
        
            // Ejecutar la consulta preparada
            $stmt->execute();
        
            // Obtener el resultado
            $result = $stmt->get_result();
        
            // Obtener los datos como un array asociativo
            $datos = $result->fetch_assoc();
        
            // Cerrar el statement y la conexión
            $stmt->close();
            $cbd->close();
        
            return $datos;
        }
        

        

        public function Registrarusuario($datosC, $tablaBD = 'usuario') {
            $cbd = ConexionBD::cBD();
            $nombre = $datosC['nombre'];
            $apellido = $datosC['apellido'];
            $correo = $datosC['correo'];
            $contrasena = $datosC['contrasena'];
            $rol = $datosC['roll'];

            $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);
        echo "$contrasenaEncriptada";
            $query = "INSERT INTO $tablaBD (idusuario,Nombre, Apellidos, Correo, Contraseña, Roll) VALUES (null,?, ?, ?, ?, ?)";
            $stmt = $cbd->prepare($query);
            $stmt->bind_param("sssss", $nombre, $apellido, $correo, $contrasenaEncriptada, $rol);
            $stmt->execute();
        }
    }
?>