<?php
    session_start(); 
    $archivo = fopen("../../bd-Json/credencialesAdmin.json","r");
    while(($linea=fgets($archivo))){
        $registro = json_decode($linea,true);
        if (
            $_POST["NumeroEmpleado"]==$registro["NumeroEmpleado"] && 
            sha1($_POST["Contrasena"])==sha1($registro["Contrasena"])
        ){
            $registro["estatus"] = "1"; 
            $registro["mensaje"] = "Acceso autorizado";
            $_SESSION["NumeroEmpleado"] = $_POST["NumeroEmpleado"];
            $_SESSION["NumeroEmpleado"] = $registro["NumeroEmpleado"];

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