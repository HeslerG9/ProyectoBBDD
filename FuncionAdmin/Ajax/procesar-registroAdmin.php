<?php
include_once("../../class/class-admin.php");

	switch ($_GET["accion"]) {
        case '1':
	
			$admin = new Admin(
				$_POST["NumeroEmpleado"],
				$_POST["Nombres"],
				$_POST["Apellidos"],
				$_POST["NumeroID"],
				$_POST["correo"],
				$_POST["FechaNacimiento"],
				$_POST["Contrasena"],
				$_POST["TipoUsuario"]
			);
	
			echo $admin->registrarAdmin();
			echo $admin->registrarCredencialAdmin();
			break;
		
	}

?>