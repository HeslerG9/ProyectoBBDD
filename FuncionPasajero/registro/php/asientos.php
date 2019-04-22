<?php
    include '../../class/class-conexion.php';
    $conexion=new Conexion();

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM vw_asientos_disponible
                                           where idvuelo='.$_POST['idvuelo'].' and idasiento not in 
                                           (select asiento_idasiento from boleto where vuelo_idvuelo='.$_POST['idvuelo'].')');

    //$registro=array();

    $formato="{";

    $tope=pg_num_rows($resultado);
    $i=0;

    while($fila=pg_fetch_row($resultado)){

        /* $formato.='"'.$i.'":{"id":"'.$fila[0].'","numeroasiento":"'.$fila[1].'","ubicacion":"'.$fila[2].'","fechaultimomantenimiento":"'.$fila[3].'","avion_idavion":"'.$fila[4].'","tipoasiento_idtipoasiento":"'.$fila[5].'"}'; */
        $formato.='"'.$i.'":{"id":"'.$fila[0].'","numeroasiento":"'.$fila[1].'","ubicacion":"'.$fila[2].'","idvuelo":"'.$fila[3].'"},';
        $i++;
    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>