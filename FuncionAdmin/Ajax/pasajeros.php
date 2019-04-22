<?php
    include '../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_pasajeros_registrados');

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","pnombre":"'.$fila[1].'","papellido":"'.$fila[2].'","correoelectronico":"'.$fila[3].'","numeroidentidad":"'.$fila[4].'","nombre":"'.$fila[5].'","fecharegistro":"'.$fila[6].'"},'; 
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    echo $formato;
?>