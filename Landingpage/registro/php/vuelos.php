<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vuelo');

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","cantidadescala":"'.$fila[1].'","horafechasalida":"'.$fila[2].'","horafechallegada":"'.$fila[3].'","piloto_idpiloto":"'.$fila[4].'","avion_idavion":"'.$fila[5].'","tipoclase_idtipoclase":"'.$fila[6].'","idpuertadestino":"'.$fila[7].'","idpuertaorigen":"'.$fila[8].'"},';  
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>