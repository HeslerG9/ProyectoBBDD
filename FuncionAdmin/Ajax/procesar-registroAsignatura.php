<?php
include_once("../../class/class-asignatura.php");

	switch ($_GET["accion"]) {
        case '1':
	
			$asignatura = new Asignatura(
				$_POST["seccion"],
				$_POST["HoraInicio"],
				$_POST["HoraFinal"],
				$_POST["Dias"],
				$_POST["Cupos"],
				$_POST["Aula"],
				$_POST["Asignatura"],
				$_POST["Maestro"]
			);
	
			echo $asignatura->registrarAsignatura();
			break;
		
	}

?>
