

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="estilos/estilos.css">

  <link rel="stylesheet" href="estilos/bootstrap.css">
  
  <link rel="stylesheet" href="estilos/estiloFooter.css">

  <!-- Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
</head>

<body>




  <!-- Modal -->
  <div id="infoModal"class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">INFORMACIÓN!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>LOS DATOS SON INCORRECTOS! REVISALOS</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

  <div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img src="img/bandera.png" alt="LOGO CBTIS 217" style="width: 70px;">
      </a>

      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Login.php">PRACTICAS PROFECIONALES</a>
        </li>
      </ul>
    </nav>
  </div>


  <!-- formulario para login -->
  <div class="modal-dialog text-center">
    <div class="col-sm-12 cuerpo-seccion">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="img/user.png" />
        </div>
        <form class="col-12" action="ValidarLogin.php" method="POST">
          <div class="form-group" id="user-group">
            <input name="txtEmail" type="text" class="form-control" placeholder="Nombre de usuario" />
          </div>
          <div class="form-group" id="contrasena-group">
            <input name="txtpassword" type="password" class="form-control" placeholder="Contrasena" />
          </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
          <br>
          <br>
        </form>
      </div>
    </div>
  </div>

</body>
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<?php
//modal para informar en dado caso que los datos 
//del login sea incorrecto
session_start();
if (isset($_SESSION["modal"])) {
  
  $valorModal= $_SESSION["modal"];
  if($valorModal==0){
    ?>
     <script>$('#infoModal').modal('show'); </script>
     <?php
  }
  $_SESSION["modal"]=2;
}

?>

<?php
include 'Cod/footer.php';
?>

</html>