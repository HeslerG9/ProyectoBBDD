<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    if($_POST['paiso']=='' && $_POST['paisd']==''){
        $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises');
    }else if($_POST['paiso']==''){
        $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises where idpaisd='.$_POST['paisd']);
    }else if($_POST['paisd']==''){
        $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises where idpaiso='.$_POST['paiso']);
    }else{
        $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_vuelo_paises where idpaiso='.$_POST['paiso'].' and idpaisd='.$_POST['paisd']);
    }

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","paiso":"'.$fila[3].'","paisd":"'.$fila[4].'","ao":"'.$fila[5].'","ad":"'.$fila[6].'","cantidadescala":"'.$fila[7].'","fo":"'.$fila[8].'","fd":"'.$fila[9].'","tc":"'.$fila[10].'","precio":"'.$fila[11].'"},';  
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>