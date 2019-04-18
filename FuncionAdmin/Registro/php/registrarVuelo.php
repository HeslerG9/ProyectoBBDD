<?php

switch ($_GET["opcion"]) {
    /*Registra Vuelo*/
    case 1:
        //se establece una conexion a la base de datos
        include '../../class/class-conexion.php';
        $conexion=new Conexion();
        //si falla
        if ($conexion==false) {
            echo('{"error": "falló la conexión"}');
            return;
        };

        /*Insertar el vuelo*/
        $resultado=$conexion->ejecutarConsulta(
        'SELECT * from public.sp_registro_vuelo(
            null,
            '.$_POST['numero-escala'].', 
            '."'".$_POST['fecha-hora-salida']."'".', 
            '."'".$_POST['fecha-hora-llegada']."'".',
            '.$_POST['piloto'].', 
            '.$_POST['avion'].',  
            '.$_POST['clase'].', 
            '.$_POST['puerta-origen'].', 
            '.$_POST['puerta-destino'].', 
            '."'".'AGREGAR'."'".'
        )');
        
        $resultado_procedimiento=pg_fetch_row($resultado);
        $mensaje='{"Mensaje1":'.'"'.$resultado_procedimiento[1].'"';
        
        if ($resultado_procedimiento[0]=='t') {
            $mensaje.='}';
            echo $mensaje;
            return;
        }else{

            /*Se registea el precio del vuelo*/
            $resultado_precio=$conexion->ejecutarConsulta(
                'SELECT * FROM public.sp_registro_precio_vuelo(
                    '.$_POST['precio-vuelo'].', 
                    '.$resultado_procedimiento[2].', 
                    '."'".'AGREGAR'."'".'
                )');
                
            $resultado_procedimiento_precio=pg_fetch_row($resultado_precio);
            $mensaje.=",";
            $mensaje.='"Mensaje2":'.'"'.$resultado_procedimiento_precio[1].'"';

            /*Insertando las escalas*/
            for ($i=1; $i <= $_POST['numero-escala'] ; $i++) { 
                if($i==$_POST['numero-escala']){
                    $puerta_destino=$_POST['puerta-destino'];
                }else{
                    $puerta_destino=$_POST['puerta-escala-'.($i+1)]; 
                }

                $resultado2=$conexion->ejecutarConsulta(
                    'SELECT * FROM public.sp_registro_escala(
                        '."'".$_POST['fecha-hora-salida-escala-'.$i]."'".', 
                        '."'".$_POST['fecha-hora-llegada-escala-'.$i]."'".',
                        '.$resultado_procedimiento[2].', 
                        '.$_POST['puerta-escala-'.$i].', 
                        '.$puerta_destino.', 
                        '."'".'AGREGAR'."'".'
                    )'
                );

                $resultado_procedimiento2=pg_fetch_row($resultado2);
                /*Si falla el registro de las escalas se borra el vuelo*/
                if($resultado_procedimiento2[0]=='t'){
                    /*Eliminando el vuelo insertado*/
                    $conexion->ejecutarConsulta(
                        'SELECT * FROM public.sp_registro_vuelo(
                            '.$resultado_procedimiento[2].', 
                            null, 
                            null, 
                            null, 
                            null, 
                            null, 
                            null, 
                            null, 
                            null, 
                            '."'".'ELIMINAR'."'".'
                        )'
                    );
                    break;
                }
            }

            $mensaje.=",";
            $mensaje.='"Mensaje3":'.'"'.$resultado_procedimiento2[1].'"}';

            echo $mensaje;
        }
        
        break;
    case 2:
        break;
    
    case 3:
    break;
}