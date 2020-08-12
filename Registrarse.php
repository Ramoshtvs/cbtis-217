<?php

session_start();
require 'Conexion.php';

//variables para mostrar al momento de editar 
//ya que utilizo el mismo formulario para eso
$nombre="";
$Email="";
$ID;

if (!isset($_SESSION["tipo"])) {
  header("location: Login.php");
}
if ($_SESSION["tipo"] != "administrador") {
  header("location: Login.php");
}

//obtencion del id para editar
if (isset($_GET['id'])>=0) {
  # code...

if (isset($_GET['id'])!=null) {
// si los la variable trae datos de hara la pararte editar 
  $ID=$_GET['id'];
  $Editar="SELECT `nombre`, `email` FROM `usuarios` WHERE id_usuario='" . $ID . "'";
  $datos=$conexion->prepare($Editar);

  if ($datos->execute()) {
    # code...
    $results = $datos->fetch(PDO::FETCH_ASSOC);

     $nombre= $results['nombre'];
     $Email=  $results['email'];
    
  }
  

}
}else{}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>REGIISTRARSE</title>
  <link rel="stylesheet" href="estilos/estilos.css">
  <link rel="stylesheet" href="estilos/bootstrap.css">
  <link rel="stylesheet" href="estilos/estiloFooter.css">
  <!-- Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">

</head>

<body>

  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h4 class="modal-title" id="myModalLabel">INFORMACIÓN!</h4>
          </div>
          <div class="modal-body">
            EL ALUMNO SE REGISTRO CORRECTAMENTE
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div id="tabla"></div> -->
  <div class="container">
    <!-- Modal -->
    <div 
    class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h4 class="modal-title text-white" id="myModalLabel">INFORMACIÓN!</h4>
          </div>
          <div class="modal-body">
            REVISE LOS DATOS!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand col-4" href="#">
      <img src="img/bandera.png" alt="LOGO CBTIS 217" style="width: 70px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <h4><a class="nav-link" href="Registrarse.php">REGISTRAR <span class="sr-only">(current)</span></a></h4>
        </li>
        <li class="nav-item active">
          <h4><a class="nav-link" href="Admin.php">ALUMNOS <span class="sr-only">(current)</span></a></h4>
        </li>
      </ul>
      <div class="col-4 d-flex justify-content-end  mr-4">
        <h6><a class="nav-link" href="alumnoAdmin.php"><?= $_SESSION["nombre"]; ?> <span class="sr-only"></span></a></h6>
        <a class="btn btn-sm btn-outline-danger" href="CerrarSession.php">Cerrar sesión</a>
      </div>
    </div>
  </nav>

  <!-- formulario para editar -->

  <div class="modal-dialog text-center">
    <div class="col-sm-12 cuerpo-seccion">
      <div class="modal-content">
        <form class="col-12" action="ValidarRegistrar.php" method="POST">
          <div class="form-group" id="user-group">

            <input name="txtUsuario" type="text" class="form-control" placeholder="Nombre" value="<?php echo $nombre;?>"/>
          </div>
          <div class="form-group" id="user-group">
            <input name="txtEmail" type="text" class="form-control" placeholder="Email" value="<?php echo $Email;?>"/>
          </div>
          <div class="form-group" id="contrasena-group">
            <input name="txtpassword" type="password" class="form-control" placeholder="Contrasena" />
          </div>
          <div class="form-group" id="contrasena-group">
            <input name="txtConfirmarpassword" type="password" class="form-control" placeholder="Confirmar Contrasena" />
          </div>
          <button type="submit" class="btn btn-primary ml-auto"><i class="fa fa-save" style="font-size:24px; color:black"></i> REGISTRAR </button>
        </form>
      </div>
    </div>
  </div>
  <a class="btn btn-danger" href="Admin.php">REGRESAR</a>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</body>

<?php


?>


<?php
if (isset($_SESSION["modalRegistrar"])) {
  
  $valorModal= $_SESSION["modalRegistrar"];
  if($valorModal==0){
    ?>
     <script>$('#myModalError').modal('show'); </script>
     <?php
  }else if($valorModal==1){
?>
<script>$('#myModal').modal('show'); </script>
<?php
  }
  $_SESSION["modalRegistrar"]=2;
}

include 'Cod/footer.php';
?>


</html>