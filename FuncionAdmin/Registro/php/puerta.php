<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM puerta where terminal_idterminal='.$_POST['terminal']);

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","nombre":"'.$fila[2].'","idterminal":"'.$fila[3].'"},'; 
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>