<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises where idpais='.$_POST['pais']);

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","cantidadescala":"'.$fila[1].'","horafechasalida":"'.$fila[2].'","horafechallegada":"'.$fila[3].'","descripcion":"'.$fila[4].'","nombre":"'.$fila[5].'","idpais":"'.$fila[6].'","idpuertaorigen":"'.$fila[7].'","idpuertadestino":"'.$fila[8].'","precio":"'.$fila[9].'"},';  
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>