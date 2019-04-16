<?php
 

 $_POST['numero-identidad']='0801-1999-12222';
 $_POST['horas-vuelo']=3000;

include '../../class/class-conexion.php';
        $conexion=new Conexion();
        //si falla
        if ($conexion==false) {
            echo('{"error": "falló la conexión"}');
            return;
        };

        $resultado=$conexion->ejecutarConsulta(
            'SELECT * from public.sp_registro_piloto(
                '."'".$_POST['numero-identidad']."'".', 
                '.$_POST['horas-vuelo'].', 
                '."'".'AGREGAR'."'".'
            )'
        );
        $mensaje='"Mensaje2":'.'"'.(pg_fetch_row($resultado))[1].'"}';

        //$registro = json_encode($_POST);
        /* $registro='{"password":'.$contraseña.'}'; */

        echo $mensaje;

