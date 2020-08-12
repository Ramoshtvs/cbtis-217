<?php

require('conexion.php');
session_start();
//obtencion del id eliminar para validar la eliminacion 
$idEliminar = $_GET['id'];
$datos = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = ".$idEliminar);
if($datos->execute()){
    //variable de session para saber si se ah eliminado
    //y asi mostrar un mensaje que se a eliminado el alumno
   $_SESSION['eliminoUsuario'] = 'true';
   //redireccionar a la pagina donde esta la tabla de los alumnos
   header('LOCATION:  Admin.php');
}else{
    $_SESSION['eliminoUsuario'] = 'false';
    header('LOCATION: Admin.php');
}

?>