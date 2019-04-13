<?php
    session_start(); 
    $archivo = fopen("../../bd-Json/credencialesEmpleados.json","r");
    while(($linea=fgets($archivo))){
        $registro = json_decode($linea,true);
        if (
            $_POST["NumEmp"]==$registro["NumEmp"] && 
            $_POST["ContraEmp"]==$registro["ContraEmp"]
        ){
            $registro["estatus"] = "1"; 
            $registro["mensaje"] = "Acceso autorizado";
            $_SESSION["NumEmp"] = $_POST["NumEmp"];
            $_SESSION["NumEmp"] = $registro["NumEmp"];

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