<?php

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
        'SELECT * from public.sp_registro_persona(
            '."'".$_POST['primer-nombre']."'".', 
            '."'".$_POST['segundo-nombre']."'".', 
            '."'".$_POST['primer-apellido']."'".', 
            '."'".$_POST['segundo-apellido']."'".', 
            '."'".$_POST['email']."'".', 
            '."'".$_POST['direccion']."'".', 
            '."'".$_POST['numero-identidad']."'".', 
            '.$_POST['pais'].", 
            'AGREGAR'
        )");

        /*Insertar el telefono si se definió */
        if($_POST['numero-telefono']!=null or $_POST['numero-telefono']!=''){
            $conexion->ejecutarConsulta
            (
                'SELECT public.sp_registro_telefono(
                    '."'".$_POST['numero-identidad']."'".', 
                    '."'".$_POST['numero-telefono']."'".",
                    'Activo', 
                    'AGREGAR'
                )"
            );
        }

        $mensaje='{"Mensaje1":'.'"'.(pg_fetch_row($resultado))[1].'",';

        /*Insertar el Empleado*/

        $resultado=$conexion->ejecutarConsulta(
            'SELECT * from public.sp_registro_Empleado(
                '."'".$_POST['numero-identidad']."'".', 
                '."'".'AGREGAR'."'".'
            )'
        );
        $mensaje.='"Mensaje2":'.'"'.(pg_fetch_row($resultado))[1].'",';

         /*Insertar el cargo has empleado*/
         $resultado=$conexion->ejecutarConsulta(
            'SELECT * from public.sp_cargo_empleado(
                '."'".$_POST['numero-identidad']."'".', 
                '.$_POST['sueldo'].', 
                '.$_POST['cargo'].", 
                 'AGREGAR'
            )");
            $mensaje.='"Mensaje3":'.'"'.(pg_fetch_row($resultado))[1].'"}';
        //$registro = json_encode($_POST);
        /* $registro='{"password":'.$contraseña.'}'; */

        echo $mensaje;
        break;
    
    case 2:
        break;
    
    case 3:
    break;
}
