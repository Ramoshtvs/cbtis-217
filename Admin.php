<?php


//se utiliza para acceder a las variables de sesion 
session_start();

//verificando si se estadado de alta y si es admin.


if (!isset($_SESSION["tipo"])) {
  header("location: Login.php");
}
if ($_SESSION["tipo"] != "administrador") {
  # code...
  header("location: Login.php");
}
?>

<?php
//modal para la parte de eliminar eh informar
if(isset($_SESSION['eliminoUsuario']) && $_SESSION['eliminoUsuario'] == 'true'){
  $_SESSION['eliminoUsuario'] = 'dfdfd';
  ?>
          <div class="alert alert-success alert-dismissible fade show" style="z-index: 200;position:absolute;top:2%;left:35%;" role="alert">
          <strong>El registro fue eliminado correctamente.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
  <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
  <title>Tabla Alumnos</title>

  <link rel="stylesheet" href="js/css/bootstrap.css">
  <link rel="stylesheet" href="js/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/estiloFooter.css">
  <!-- <link rel="stylesheet" href="js/css/alertify.css">
  <link rel="stylesheet" href="js/css/themes/default.css"> -->
  <!-- <script src="js/alertify.js"></script> -->
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" /> -->

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
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModalConfirmar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h4 class="modal-title" id="myModalLabel">CONFIRMACIÓN!</h4>
          </div>
          <div class="modal-body">
            SE ELIMINO CORRECTAMENTE EL ALUMNO!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
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

    <!-- navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <h4><a class="nav-link" href="Registrarse.php">REGISTRAR <span class="sr-only">(current)</span></a></h4>
        </li>
        <li class="nav-item active">
          <h4><a class="nav-link" href="Admin.php">ALUMNOS <span class="sr-only">(current)</span></a></h4>
        </li>
      </ul>
      <div class="col-8 d-flex justify-content-end">
        <h5><a class="nav-link" href="#"><?= $_SESSION["nombre"]; ?> <span class="sr-only">(current)</span></a></h5>
        <a class="btn btn-outline-danger" href="CerrarSession.php">Cerrar sesión</a>
      </div>
    </div>
    <br>
  </nav>


  <div class="container">
    <br>
    <div class="row">
      <div class="col-sm-12">
        <caption>
          <a class="btn btn-success" href="Registrarse.php">Agregar Alumno</a>
        </caption>
        <br>
        <table class="table table-hover table-condensed table-bordered">
          <br>

          <tr>
            <th>ID ALUMNO</th>
            <th>TIPO USUARIO</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th></th>
            <th></th>
          </tr>

          <?php

          require 'Conexion.php';



          $datos = $conexion->prepare("SELECT `id_usuario`, `tipo_usuario`, `nombre`, `email` FROM `usuarios` WHERE `tipo_usuario`!='administrador'");
          $datos->execute();
          while ($results = $datos->fetch(PDO::FETCH_ASSOC)) {

          ?>
            <tr>

              <td><?php echo ($results['id_usuario']) ?></td>
              <td><?php echo ($results['tipo_usuario']) ?></td>
              <td><?php echo ($results['nombre']) ?></td>
              <td><?php echo ($results['email']) ?></td>
              <td>

                <button id="editar" type="button" class="btn btn-warning" onclick="obtenerid(<?php echo $results['id_usuario']; ?>)">Editar</button>
              </td>

              <td>
                <button type="button" class="btn btn-danger" onclick="obteneridEliminar(<?php echo $results['id_usuario']; ?>)">Eliminar</button>
              </td>
            </tr>
          <?php

          }
          ?>
        </table>
      </div>

    </div>
  </div>
  <!-- modal para eliminar -->
  <div class="modal" data-backdrop="static" data-keyboard="false" id='modalConfirmacion' tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-danger text-center">
        <h5 class="modal-title text-uppercase">Confirme si desea eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar el registro seleccionado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick='eliminar()'>Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<!-- funciones para verificar si se registro correctamente el alumno -->
<?php
if (isset($_SESSION["modalRegistrar"])) {

  $valorModal = $_SESSION["modalRegistrar"];
  if ($valorModal == 0) {
?>
    <script>
      $('#myModalError').modal('show');
    </script>
  <?php
  } else if ($valorModal == 1) {
  ?>
    <script>
      $('#myModal').modal('show');
    </script>
<?php
  }
  $_SESSION["modalRegistrar"] = 2;
}
//pie de pagina
include 'Cod/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').load('Admin.php');
  });

//funcion para mandar el id para editar
  function obtenerid(id) {
    location.assign('Registrarse.php?id=' + id);
  }
  var idEliminar = 0;
  function obteneridEliminar(idElimina) {
    $('#modalConfirmacion').modal('show');
            idEliminar = idElimina;
  }

  //funcion para mandar el id para eliminar
  function eliminar(){
            $('#modalConfirmacion').modal('hide');
            window.location.href = 'eliminarUsuario.php?id='+idEliminar;
  }
</script>
</body>
</html>