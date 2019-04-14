<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta(
        'SELECT * from public.sp_registro_pasajero(
            '."'".'IDENTIDAD'."'".', 
            '."'".'123'."'".', 
            '."'".'AGREGAR'."'".'
        )'
    );

    $arreglo=pg_fetch_row($resultado);

    //echo json_encode(pg_fetch_row($resultado));
    echo $arreglo[0].'/n';
    if ($arreglo[0]=='t'){
        echo 'ocurrio error';
    }else{
        echo 'no ocurrio error';
    }

?>