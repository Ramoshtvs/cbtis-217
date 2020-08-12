<?php

session_start();
require 'Conexion.php';

//le quito los espacios a lo que se va a registrar
//y como solo se va a registrar alumnos el tipo le paso solo 
//alumno
$tipo=trim('usuario');
$nombre=trim($_POST['txtUsuario']);
$email=trim($_POST['txtEmail']);
//exprecion regular para validar que solo sea correo
$exp="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.([a-zA-Z]{2,4})+$/";
$pass=trim($_POST['txtpassword']);
$confpass=trim($_POST['txtConfirmarpassword']);

 
//verifico que las variables no esten vacias
if (!empty($nombre) && !empty($email) && !empty($pass) && !empty($confpass)) {
    //hago la insercion para el registro del alumno
    $INSERTA = "INSERT INTO usuarios (tipo_usuario, nombre, email, password,confirmarpassword) 
    VALUES (:tipo,:nombre,:email,:password,:confirmarpass)";
    if (!preg_match($exp, $email)) {
        //echo "El Email debe tener un formato Valido";
        //echo preg_match($exp, $email);
        $_SESSION["modalRegistrar"]=0;
    } else {
        if ($_POST['txtpassword'] != $_POST['txtConfirmarpassword']) {
           // echo 'Las contraseñas deben ser iguales';
           $_SESSION["modalRegistrar"]=0;
        } else {
            //var_dump($INSERTA);
            //inserto
             $Datos = $conexion->prepare($INSERTA);
             $password=password_hash($pass,PASSWORD_BCRYPT);
             $Datos->bindParam(':password', $password);
             $confirmarpass=password_hash($confpass,PASSWORD_BCRYPT);
             $Datos->bindParam(':confirmarpass', $confirmarpass);
             $Datos->bindParam(':tipo', $tipo);
             $Datos->bindParam(':nombre', $nombre);
             $Datos->bindParam(':email', $email);

             //si la inserccion fue correcta mandara a la tabla donde estan registrador los alumnos
             if ($Datos->execute()) {
                 header("location: Admin.php");
                 $_SESSION["modalRegistrar"]=1;
             } else {
                 
                $_SESSION["modalRegistrar"]=0;
                 header("location: Registrarse.php");
             }
        }
    }
}else{
    $_SESSION["modalRegistrar"]=0;
header("location: Registrarse.php");
}

?>