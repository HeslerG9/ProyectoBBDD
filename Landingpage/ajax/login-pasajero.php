<?php
    session_start();
    $_POST['identidad']='080319980024';
    $_POST['contra-pasajero']='123';

    //se establece una conexion a la base de datos
    include '../class/class-conexion.php';
    $conexion=new Conexion();
    //si falla
    if ($conexion==false) {
        echo('{"error": "falló la conexión"}');
        return;
    };

    $verificar_contraseña=password_verify($contraseña_introducida,$contraseña_guardada['clave']);

    $password=password_hash($_POST['contra-pasajero'], PASSWORD_DEFAULT);
    echo $password;

    /*Consultar si el pasajero esta registrado*/
    $resultado=$conexion->ejecutarConsulta(
        'SELECT * from public.sp_login(
            '."'".$_POST['identidad']."'".', 
            '."'".$password."'".'
        )'
    );

    $array=pg_fetch_row($resultado);

    $mensaje='{"error":"'.$array[0].'","Mensaje":'.'"'.$array[1].'"}';
    
    echo $mensaje;

?>