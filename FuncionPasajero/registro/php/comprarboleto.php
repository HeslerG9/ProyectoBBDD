<?php
session_start();

switch ($_GET["opcion"]) {
    /*Registra Empleados*/
    case 1:
        //se establece una conexion a la base de datos
        include '../../class/class-conexion.php';
        $conexion=new Conexion();
        //si falla
        if ($conexion==false) {
            echo('{"error": "falló la conexión"}');
            return;
        };

        /*Insertar la persona*/
        $resultado=$conexion->ejecutarConsulta(
        'SELECT * from public.sp_registro_boleto(null,
            '.$_POST['seleccion-Asiento'].', 
            '.$_POST['idvuelo'].', 
            '.$_SESSION['idpasajero'].', 
            '.$_POST['maletas'].', 
            '.'1'.", 
            'AGREGAR'
        )");

        $resultado_procedimiento=pg_fetch_row($resultado);
        $mensaje='{"Mensaje1":'.'"'.$resultado_procedimiento[1].'"';
        
        if ($resultado_procedimiento[0]=='t' && $resultado_procedimiento[2]>0) {
            //Eliminando lo que se pudo haber insertado
            $conexion->ejecutarConsulta(
                'SELECT * from public.sp_registro_boleto(
                    '.$resultado_procedimiento[2].',
                    null, 
                    null, 
                    null, 
                    null, 
                    null'.", 
                    'ELIMINAR'
                )");

            $mensaje.='}';
            echo $mensaje;
            return;
        }

        //$mensaje='{"Mensaje1":'.'"'.(pg_fetch_row($resultado))[1].'",';
        $resultado=$conexion->ejecutarConsulta(
            'SELECT totalprecioboleto from boleto where idboleto='.$resultado_procedimiento[2].'
            ');
    
            $resultado_procedimiento=pg_fetch_row($resultado);
            $mensaje.=',"Mensaje2":'.'"'.$resultado_procedimiento[0].'"}';

        echo $mensaje;
        break;
  
}
