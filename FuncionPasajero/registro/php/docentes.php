<?php
    include("../../class/class-sesion.php");

    $consulta='SELECT `primer-nombre`, `primer-apellido`, `n_empleado` FROM `docentes` WHERE `facultad`="'.$_POST["carrera"].'"';

    $resultado=mysqli_query(sesion::conexion(),$consulta);

    $tope=mysqli_num_rows($resultado);

    if($tope==0){
        echo('');
        exit;
    }else{
        $formato="{";
        for($i=0;$i<$tope;$i++){

            $fila=mysqli_fetch_row($resultado);

            /* $consulta='SELECT `clave` FROM `usuarios` WHERE `cuenta`="'.$fila[2].'"';
            //echo('SELECT `clave` FROM `usuarios` WHERE `cuenta`="'.$fila[3].'"');
            $resultado2=mysqli_query(sesion::conexion(),$consulta);
            $fila2=mysqli_fetch_row($resultado2); */

            $formato.='"'.$i.'":{"nombre":"'.$fila[0].' '.$fila[1].'","n_empleado":"'.$fila[2].'"},';
        }
    }

    $formato.='"total":"'.$tope.'"}';

    echo $formato;

?>