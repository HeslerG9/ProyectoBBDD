<?php

    include("../../class/class-sesion.php");

    $consulta="SELECT `nombre`,`carrera` FROM `ofertaacademica`";

    $resultado=mysqli_query(sesion::conexion(),$consulta);

    //$registro=array();

    $formato="{";

    $tope=mysqli_num_rows($resultado);
    $i=0;

    while($fila=mysqli_fetch_row($resultado)){
        //$registro[]=$fila[0];

        $formato.='"'.$i.'":{"nombre":"'.$fila[0].'","carrera":"'.$fila[1].'"},';

        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;

?>