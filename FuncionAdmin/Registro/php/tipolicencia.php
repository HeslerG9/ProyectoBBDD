<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM tipolicencia');

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        $formato.='"'.$i.'":{"id":"'.$fila[0].'","descripcion":"'.$fila[1].'"},'; 
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>