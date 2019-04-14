<?php
include_once("../../class/class-docente.php");

switch ($_GET["accion"]){
    case '1':

    $docente = new Docente(
    $_POST["NombreDoc"],
    $_POST["ApellidoDoc"],
    $_POST["CorreoDoc"],
    $_POST["TelDoc"],
    $_POST["NumDoc"],
    $_POST["FechaNaDoc"],
    $_POST["CarreraDoc"],
    $_POST["ContraDoc"],
    $_POST["CentroDoc"]
);



echo $docente->registrarDocente();
echo $docente->registrarCredencialDocente();
break;
}

?>