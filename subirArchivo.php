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
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="estilos/bootstrap.css">
    <link rel="stylesheet" href="estilos/estiloFooter.css">
    <link rel="stylesheet" href="js/dropzone.css">
    <script src="js/dropzone.js"></script>
</head>

<body>
<!--  navbar-->
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


    <!-- <form action="validarSubir.php" method="post" enctype="multipart/form-data">
        <button type="submit">subir archivos</button>
    </form>
    <input type="file" name="archivo"> -->
<!-- arregro asociativo para saber que tipo de documeto es -->
    <?php
   $Archivos = [
    "001" =>"001SOLICITUD DE PRACTICAS PROFESIONALES",
    "002" =>"002 Carta presentación",
    "003"=>"003 Acuerdo Convenio",
    "004"=>"004 CARTA DE ACEPTACIóN",
    "005"=>"005 PROGRAMA DE ACTIVIDADES",
    "006"=>"006 REPORTE MENSUAL DE PRACTICAS PROFESIONALES",
    "007"=>"007 INFORME FINAL DE ACTIVIDADES DE PR￁CTICAS PROFESIONALES",
    "008"=>"008 CARTA DE LIBERACIÓN",
    "009"=>"009 EXPEDIENTE PRÁCTICAS PROFESIONALES"
];
    //obtengo el tipo de archivo a subir
    $parametro = $_GET['archivo'];

//le asigno el valor a la pariable para el archivo
    $NombreArchivo = $Archivos[$parametro];
    ?>
<!-- coloco el tipo de archivo que debe subir para que el alumno lo sepa -->
    <h3>Arrastra o presiona para subir el archivo: <?php echo $NombreArchivo; ?></h3>
    <!-- formulario para subir el documento -->
    <div class="image_upload_div">
        <form action="validarSubir.php?archivo=<?php echo $parametro;?>" method="post" enctype="multipart/form-data">
            <div class="col">
                <label for="imagen">Selecciona una imagen</label>
                <input require accept=".docx,.doc" type="file" class="form-control" name='archivo' id="archivo" placeholder="name@example.com">
            </div>
            <button type="submit" value="subir" name="uploadBtn">SUBIR </button>
        </form>
    </div>


</body>

<?php
include 'Cod/footer.php';
?>


</html>