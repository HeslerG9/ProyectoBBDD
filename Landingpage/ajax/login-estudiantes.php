<?php
    session_start(); 
    $archivo = fopen("../../bd-Json/estudiantes.json","r");
    while(($linea=fgets($archivo))){
        $registro = json_decode($linea,true);
        if (
            $_POST["NumCta"]==$registro["NumCta"] && 
            sha1($_POST["ContraAlumno"])==sha1($registro["ContraAlumno"])
        ){
            $registro["estatus"] = "1"; 
            $registro["mensaje"] = "Acceso autorizado";
            $_SESSION["NumCta"] = $_POST["NumCta"];
            $_SESSION["Carrera"] = $registro["Carrera"];
            $_SESSION["NombreAlumno"] = $registro["NombreAlumno"];
            $_SESSION["ApellidoAlumno"] = $registro["ApellidoAlumno"];
            $_SESSION["CorreoAlumno"] = $registro["CorreoAlumno"];

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