<?php
session_start();
 //echo '<script>alert (" el tipo es: '. $_SESSION["tipo"] .'");</script>';
 if (!isset($_SESSION["tipo"])) {
    header("location: Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Alumno</title>
    <!-- <link rel="stylesheet" href="estilos/estilos.css"> -->
    <link rel="stylesheet" href="estilos/bootstrap.css">
    <link rel="stylesheet" href="estilos/estiloFooter.css">
</head>
<body>
  
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
        <h4><a class="nav-link" href="alumno.php">ALUMNO <span class="sr-only">(current)</span></a></h4>
      </li>
      <li class="nav-item active">
        <h4><a class="nav-link" href="Archivos.php">ARCHIVOS <span class="sr-only">(current)</span></a></h4>
      </li>
      <li class="nav-item active">
        <h4><a class="nav-link" href="archivosAlumnos.php">SUBIR ARCHIVOS<span class="sr-only">(current)</span></a></h4>
      </li>
    </ul>
    <div class="col-4 d-flex justify-content-end  mr-4">
    <h5><a class="nav-link" href="#"><?= $_SESSION["nombre"]; ?> <span class="sr-only">(current)</span></a></h5>
                <a class="btn btn-sm btn-outline-danger" href="CerrarSession.php">Cerrar sesión</a>
            </div>
  </div>

</nav>
<!-- parte para descargar los documentos  -->
<h1>Archivo 1</h1>
<p>hkjfhjkdfhsfjkhsdkjfhkjdhskjdhkfjhsdfkjhkjfsdhdf
sdhfkjdshkjfhkdjhfjkhdskjhfdkjdh
sdhfjkhfjkhfdjkhfdjkhfdskjhdjkfhdjkfhdjk</p>
<a href="DocumentosPracticas\001SOLICITUD DE PRACTICAS PROFESIONALES.doc">Descargar PDF</a>
</body>
<?php   
include 'Cod/footer.php';
?>
</html>