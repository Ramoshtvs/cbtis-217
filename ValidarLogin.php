<?php
session_start();
require 'Conexion.php';

//obtengo el email y lequito los espacios
$Email = trim($_POST["txtEmail"]);

//verifico si el email y el correo no esten vacios
if (!empty($_POST['txtEmail']) && !empty($_POST['txtpassword'])) {

  $datos = $conexion->prepare("select * from usuarios where email = '" . $Email . "'");
  $datos->execute();
  $results = $datos->fetch(PDO::FETCH_ASSOC);
//verifico si las contraseñas intruducina y la que se registro es la misma
//al igual que el resultado sea igual a 6
  if (count($results) ==6 && password_verify($_POST['txtpassword'], $results['password'])) {
    //verifico que el resultado del tipo de usuario sea solamente administrador y usuario
    if ($results["tipo_usuario"] == "administrador" || $results["tipo_usuario"] == "usuario") {
       //si es administrador lo mandara a la paguina de administrador
      if ($results["tipo_usuario"] == "administrador") {
        //  echo"es admingggg           ";
         $_SESSION["id"] = $results["id_usuario"];
         $_SESSION["tipo"]= $results["tipo_usuario"];
         $_SESSION["nombre"]=$results["nombre"];
         $_SESSION["modal"]= 1;
         
         //echo '<script>alert (" el tipo es: '. $_SESSION["tipo"] .'");</script>'; 
         header("location: Admin.php");
       } else {
         //si no sera estudianta y lo mandara a la pagina de estudiante
         $_SESSION["tipo"] = $results["tipo_usuario"];
         $_SESSION["nombre"]=$results["nombre"];
         $_SESSION["Email"]= $results["email"];
         header("location: alumno.php");
         $_SESSION["modal"]= 1;
       }
      // echo"es usuario o admin";
    } else {
      //echo"no es ni usuario ni admin";
    header("location: Login.php");
    $_SESSION["modal"]= 0;
    }
  }
  else {
    //echo"no paso la verificacion"; 
    $_SESSION["modal"]= 0;
    header("location: Login.php");
    
  }
} else {
 header("location: Login.php");
 $_SESSION["modal"]= 0;
 // echo "los datos estan vacios";
}
