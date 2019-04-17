<?php
    session_start();
    if ($_SESSION['lvl']==1){
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina_Pasajero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>¡Bienvenido <span class="usu"><?php echo($_SESSION['name'])?></span>!</h1>
    <input id="cerrar_sesion" type="button" value="Cerrar-Sesion">

    <script src="js/jquery-3.3.1.js"></script> 
    <script src="js/pasajero_login.js"></script>
</body>
</html>

<?php
    }
    else{
        header ('location: ../Landingpage');
    }
?>