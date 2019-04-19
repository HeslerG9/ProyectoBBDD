<?php
    session_start(); //Tiene que ser la primera funcion.
    $archivo = fopen("../data/administrador.json","r");
    while(($linea=fgets($archivo))){
        $registro = json_decode($linea,true);
        if (
            $_POST["administrador"]==$registro["usuario"] && 
            sha1($_POST["contrasena"])==$registro["password"]
        ){
            $registro["estatus"] = "1"; //Acceso exitoso
            $registro["mensaje"] = "Acceso autorizado";
            $_SESSION["name"] = $_POST["administrador"];
            $_SESSION["lvl"] = $registro["lvl"];

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