<?php
    switch($_GET["opcion"]){
        case "1":
            $archivo = fopen("../../bd-json/carrera.json","r");
            $registros=array();
            while(($linea=fgets($archivo))){
                $registros[] = json_decode($linea);
            }
            echo json_encode($registros);
            fclose($archivo);
        break;
        }