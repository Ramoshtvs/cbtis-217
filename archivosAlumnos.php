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
    <link rel="stylesheet" href="js/dropzone.css">
    <script src="js/dropzone.js"></script>
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

    <h1>subir archivos</h1>

    <!-- <div class="image_upload_div">
    <form action="upload.php" class="dropzone">
    </form>
</div>

 -->

    <!-- <br>
<br>

<form action="validarSubir.php" method="post" enctype="multipart/form-data">
<button type="submit">subir archivos</button>
</form>
<input type="file" name="archivo">
<br> -->

<!-- tabla para ver los archivos que se deben subir 
y redireccionar a la ventana para que los suba y mando por url el tipo de documento 
que se debe subir para luego recuperarlo el la pagina subir archivo -->
    <div class="container">
    <table class="table table-hover table-condensed table-bordered">
        <br>

        <tr>
            <th>Nombre Archivo</th>
            <th>Archivo Subido</th>
            <th>Subir</th>
            <th>Eliminar</th>
        </tr>
       

        <tr>
            <td>001SOLICITUD DE PRACTICAS PROFESIONALES</td>
            <td>false</td>
            <td>
                <a id="editar" type="button" class="btn btn-btn-success" href="subirArchivo.php?archivo=001">subir</a>
                
            </td>
            <td>
                <a type="button" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <tr>
            <td>002 Carta presentación</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=002">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>003 Acuerdo Convenio</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=003">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>004 CARTA DE ACEPTACIóN</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=004">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>005 PROGRAMA DE ACTIVIDADES</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=005">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>006 REPORTE MENSUAL DE PRACTICAS PROFESIONALES</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=006">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>007 INFORME FINAL DE ACTIVIDADES DE PR￁CTICAS PROFESIONALES</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=007">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>008 CARTA DE LIBERACIÓN</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=008">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>009 EXPEDIENTE PRÁCTICAS PROFESIONALES</td>
            <td>false</td>
            <td>
                <button id="editar" type="button" class="btn btn-success" href="subirArchivo.php?archivo=009">subir</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>

    </table>
    </div>
   


</body>
<?php
include 'Cod/footer.php';
?>

</html>