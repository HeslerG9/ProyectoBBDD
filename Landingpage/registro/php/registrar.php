<?php

switch ($_GET["opcion"]) {
    /*Registra pasajeros*/
    case 1:
        //se establece una conexion a la base de datos
        include '../../class/class-conexion.php';
        $conexion=new Conexion();
        //si falla
        if ($conexion==false) {
            echo('{"error": "falló la conexión"}');
            return;
        };
        //si se han enviado datos

        /* $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); */

        /*Insertar la persona*/
        $conexion->ejecutarConsulta(
        'SELECT public.sp_registro_persona(
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

        /*Insertar el pasajero*/



        $registro = json_encode($_POST);

        echo $registro;
        break;
    
    case 2:
        include '../../php/conexion.php';
        //si se han enviado datos

        $usuario = mysqli_real_escape_string($conexion, $_POST["numero-cuenta"]);
        $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

        $ingresarusu = mysqli_query($conexion, 'insert into usuarios(cuenta,clave,nivel) values
        ("' . $usuario . '","' . $contraseña . '","2")') or die('<p>Error al registrar</p><br>' . mysqli_error($conexion));

        $ingresarestu = mysqli_query($conexion, 'insert into docentes(`primer-nombre`, `segundo-nombre`, `primer-apellido`, `segundo-apellido`, `fecha-nacimiento`, `n_empleado`, `nivel_academico`, `facultad`, `t_contrato`, `n_identidad`, `email`, `foto`) VALUES 
        ( "' . $_POST["primer-nombre"] . '",
        "' . $_POST["segundo-nombre"] . '",
        "' . $_POST["primer-apellido"] . '",
        "' . $_POST["segundo-apellido"] . '",
        "' . $_POST["fecha-nacimiento"] . '",
        "' . $usuario . '",
        "' . $_POST["nivel-academico"] . '",
        "' . $_POST["carrera"] . '",
        "' . $_POST["contrato"] . '",
        "' . $_POST["numero-identidad"] . '",
        "' . $_POST["email"] . '",
        "img/perfil-por-defecto.jpg")')
            or die('<p>Error al registrar docente</p><br>' . mysqli_error($conexion));
        break;
    
    case 3:
        include("../../class/class-sesion.php");
        $consulta='UPDATE `usuarios` SET `nivel`="3" WHERE `cuenta`="'.$_POST["docente"].'"';
        mysqli_query(sesion::conexion(),$consulta);
        echo("Se hizo correctamente");
    break;
}
