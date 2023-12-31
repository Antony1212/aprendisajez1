<?php  // Controladores/empleadosC.php
class EmpleadosC {
    function __construct(){
        $this->empleadosM = new EmpleadosM();
    }

    

    //mostrar empleados
    public function mostrarEmpleadosC(){
        $result = $this->empleadosM->mostrarEmpleadosM();
        return $result;
    }

    //editar empleados
    public function editarEmpleadoC(){
        if(isset($_GET['id'])){
            $datosC = array('id'=>$_GET['id']);
            $result = $this->empleadosM->editarEmpleadoM($datosC);
            return $result;
        }
    }

    //actualizar empleados
    public function actualizarEmpleadoC(){
        if(isset($_POST['nombreE'])){
            $datosC = array(    'id'=>$_POST['idE'],
                                'nombre'=>$_POST['nombreE'],
                                'apellido'=>$_POST['apellidoE'],
                                'email' => $_POST['emailE'],
                                'puesto' => $_POST['puestoE'],
                                'salario' => $_POST['salarioE'],
                            );

            $result = $this->empleadosM->actualizarEmpleadoM($datosC);
            header('location: index.php?rutas=empleados');
            return $result;
        }
    }

    //borrar empleado
    public function borrarEmpleadoC(){
        if(isset($_GET['id'])){
            $datosC = array('id' => $_GET['id']);
            $tablaBD = 'empleados';
            $this->empleadosM->borrarEmpleadoM($datosC, $tablaBD);
            header('location: index.php?rutas=empleados');
        }
    }

    public function ExtraernivelC(){
        $result = $this->empleadosM->ExtraernivelM();
        return $result;
    }

    public function ExtraervidasC(){
        if(isset($_SESSION['idusuario'])) {

            $result = $this->empleadosM->ExtraervidasM();
            return $result;
            
        }
        
    }
    public function RecargarVidasC(){
        if(isset($_SESSION['idusuario'])) {

            $result = $this->empleadosM->RecargarVidasM();
           
            
        }
        header('location: index.php?ruta=empleados');
    }
    
    public function MostrarsubnivelC(){
        if (isset($_GET['id'])) {
            
            $datosC = array('id' => $_GET['id']);
            $result = $this->empleadosM->MostrarsubnivelM($datosC);
            return $result;
        }
        
    }

    public function ExtraernivelesC(){
       
            
            
            $result = $this->empleadosM->ExtraernivelesM();
            return $result;
        
        
    }

    public function ExtraerpreguntaC(){
        if (isset($_GET['idsubnivel'])) {
            
            $datosC = array('id' => $_GET['idsubnivel']);
            $result = $this->empleadosM->ExtraerpreguntaM($datosC);
            return $result;
        }
        
    }
    
}
?>