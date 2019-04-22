<?php
    include '../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_boleto_vuelo_pasajero where idpasajero='.$_POST['idpasajero']);

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"fecha":"'.$fila[1].'","precio":"'.$fila[2].'","paiso":"'.$fila[3].'","paisd":"'.$fila[4].'","salida":"'.$fila[5].'","llegada":"'.$fila[6].'"},'; 
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    echo $formato;
?>