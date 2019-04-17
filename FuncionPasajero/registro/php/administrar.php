<?php
    session_start();
    include("../../class/class-conexion.php");
    $conexion=new Conexion();

switch ($_GET["opcion"]) {
    case 1:
        $resultado=($conexion->ejecutarConsulta('SELECT * FROM `configuracion`'))->fetch_assoc();
        echo(json_encode($resultado));
        break;
    case 2:
    $conexion->ejecutarConsulta('UPDATE `configuracion` SET `estadomatricula` = '.$_GET["dato"].' WHERE 1' );
    echo("echo");
    
       break;
    case 3:
    $conexion->ejecutarConsulta('UPDATE `configuracion` SET `estadosubirnotas` = '.$_GET["dato"].' WHERE 1');
    echo("echo");
       break;
    case 4:

    
    $resultado1=$conexion->ejecutarConsulta('SELECT * FROM `secciones`');
    while( $datos1=$resultado1->fetch_assoc()) 
    { 
          $resultado2=$conexion->ejecutarConsulta('SELECT * FROM '.'`'.$datos1['codigosec'].'`'.'' );
          while( $datos2=$resultado2->fetch_assoc()) 
          { 
             $datos1['asignatura'];
             $datos2['cuenta'];
             $datos3=($conexion->ejecutarConsulta('SELECT * FROM '.'`'.'f3'.$datos2['cuenta'].'`'.' WHERE `codigo`= "'.$datos1['asignatura'].'" '))->fetch_assoc();
               if($datos2['nota']>=65){$obs="APR";}else{$obs="RPB";}
             $conexion->ejecutarConsulta('INSERT INTO '.'`'.'ha'.$datos2['cuenta'].'`'.' (`codigo`, `asignatura`, `uv`, `seccion`, `anio`, `periodo`, `calificacion`, `observacion`) 
             VALUES 
             (
             "'.$datos1['asignatura'].'",
             "'.$datos3['asignatura'].'",
             "'.$datos3['uv'].'",
             "'.$datos3['seccion'].'",
             "'.$datos3['anio'].'",
             "'.$datos3['periodo'].'",
             "'.$datos2['nota'].'",
             "'.$obs.'"
             )' );
             $conexion->ejecutarConsulta('DELETE FROM '.'`'.'f3'.$datos2['cuenta'].'`'.' WHERE `codigo`= "'.$datos1['asignatura'].'" ');
         }
         
         $conexion->ejecutarConsulta('DELETE FROM `secciones` WHERE codigosec="'.$datos1['codigosec'].'"' );
         $conexion->ejecutarConsulta('DROP TABLE IF EXISTS '.'`'.$datos1['codigosec'].'`'.'' );

    }
    echo("listo");
       break;
}
?>