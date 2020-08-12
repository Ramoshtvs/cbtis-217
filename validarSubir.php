<?php 

session_start();
require 'conexion.php';

$Email= $_SESSION["Email"];
// echo $Email;
$carpeta = "Documentos/".$Email;

function subirArchivo(){
    $Email= $_SESSION["Email"];

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
    $parametro = $_GET['archivo'];
    
    
    $NombreArchivo = $Archivos[$parametro];
    

    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'subir') {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
             // get details of the uploaded file
    $fileTmpPath = $_FILES['archivo']['tmp_name'];
    $fileName = $_FILES['archivo']['name'];
    $fileSize = $_FILES['archivo']['size'];
    $fileType = $_FILES['archivo']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = $NombreArchivo . '.' . $fileExtension;
    // directory in which the uploaded file will be moved
    $uploadFileDir = "Documentos/".$Email;
    $dest_path = $uploadFileDir . $newFileName;
    echo $newFileName;
    if(move_uploaded_file($fileTmpPath, $dest_path))
    {
     header("location: archivosAlumnos.php");
    }
    else
    {
        header("location: archivosAlumnos.php");
    }
        }
    }
}


if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
    subirArchivo();

}else{
    subirArchivo();
}

?>