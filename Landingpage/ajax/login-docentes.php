<?php
    session_start(); 
    $archivo = fopen("../../bd-Json/Docentes.json","r");
    while(($linea=fgets($archivo))){
        $registro = json_decode($linea,true);
        if (
            $_POST["NumDoc"]==$registro["NumDoc"] && 
            sha1($_POST["ContraDoc"])==sha1($registro["ContraDoc"])
        ){
            $registro["estatus"] = "1"; 
            $registro["mensaje"] = "Acceso autorizado";
            $_SESSION["NumDoc"] = $_POST["NumDoc"];
            $_SESSION["NombreDoc"] = $registro["NombreDoc"];
            $_SESSION["ApellidoDoc"] = $registro["ApellidoDoc"];
            $_SESSION["CorreoDoc"] = $registro["CorreoDoc"];
            $_SESSION["CarreraDoc"] = $registro["CarreraDoc"];

            echo json_encode($registro);
            exit;
        }
    }
    //No encontro el registro
    $registro = array();
    $registro["estatus"] = "0"; //Acceso no autorizado
    $registro["mensaje"] = "Acceso no autorizado";
    echo json_encode($registro);
?>