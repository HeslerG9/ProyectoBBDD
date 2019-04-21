<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises where idpais='.$_POST['pais']);

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","cantidadescala":"'.$fila[1].'","horafechasalida":"'.$fila[2].'","horafechallegada":"'.$fila[3].'","avion_idavion":"'.$fila[4].'","tipoclase_idtipoclase":"'.$fila[5].'","nombre":"'.$fila[6].'","idpais":"'.$fila[7].'","idpuertaorigen":"'.$fila[8].'","idpuertadestino":"'.$fila[9].'"},';  
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>