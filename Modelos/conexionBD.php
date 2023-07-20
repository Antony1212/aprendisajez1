<?php  //Modelos/conexcionBD.php
class ConexionBD{
    static public function cBD(){
        //$cbd = new mysqli('localhost','root','','mathbathles');
        $cbd = new mysqli('localhost','id20986735_antony','.Dotero1512','id20986735_mathbathles');
        return $cbd;
    }
}
?>