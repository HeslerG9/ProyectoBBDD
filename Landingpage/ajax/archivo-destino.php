<?php
    session_start();
    //$_POST['identidad']='0803199800264';
    //$_POST['identidad']='5468dsf';
    //$_POST['contra-pasajero']='123'; 

    //se establece una conexion a la base de datos
    include '../class/class-conexion.php';
    $conexion=new Conexion();
    //si falla
    if ($conexion==false) {
        echo('{"error": "falló la conexión"}');
        return;
    };

    if (empty($_SESSION) and isset($_POST['identidad'])){
        //se escaparán caracteres peligrosos
        $identidad_usuario=pg_escape_string($conexion->getLink(),$_POST['identidad']);
        $contraseña_introducida=$_POST['contra-pasajero'];
        
        //se hará la consulta a la base de datos
        $consulta="select pa.password, pa.idpasajero,
        pe.pnombre ||' '||pe.papellido nombre_completo ,pe.numeroidentidad from persona pe
        INNER JOIN pasajero pa on pa.persona_idpersona=pe.idpersona
        where pe.numeroidentidad="."'".$identidad_usuario."'";
        //si hubo un resultado
        //echo $consulta;

        if (pg_num_rows($ejecución_de_la_consulta=$conexion->ejecutarConsulta($consulta))!=0){
            //echo $ejecución_de_la_consulta;
            
            //se obtiene la contraseña registrada
            $contraseña_guardada=pg_fetch_assoc($ejecución_de_la_consulta);
            
            //echo '         '.$contraseña_guardada['password'];

            //se compara la contraseña
            $verificar_contraseña=password_verify($contraseña_introducida,$contraseña_guardada['password']);
            //si el resultado de la comparación ha sido verdadero
            if ($verificar_contraseña){
                //se asigna la sesión y redirecciona

                echo("1");

                $_SESSION['name']=$contraseña_guardada['nombre_completo'];
                $_SESSION['identidad']=$contraseña_guardada['numeroidentidad'];
                $_SESSION['lvl']=1;
                $_SESSION['idpasajero']=$contraseña_guardada['idpasajero'];
               
                
            }//si la contraseña es incorrecta
            else{
               # header ('location: ./');
               print('contraseña mal');
            }
        }//si el usuario no está registrado
        else{
           # header ('location: ./');
           print('La identidad es incorrecta');
        }
    }//si hay una sesion abierta o no se enviaron datos
    else{
        #header ('location: ./');
        print('Ya hay una sesion ');
        print $_SESSION['name'];
    }

?>