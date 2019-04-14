<?php
include_once("../../class/class-estudiante.php");

	switch ($_GET["accion"]) {
        case '1':
	
			$estudiante = new Estudiante(
				$_POST["NombreAlumno"],
				$_POST["ApellidoAlumno"],
				$_POST["CorreoAlumno"],
				$_POST["TelAlumno"],
				$_POST["ContraAlumno"],
				$_POST["NumCta"],
				$_POST["FechaIngreso"],
				$_POST["FechaNac"],
				$_POST["CentroEstudio"],
				$_POST["Carrera"]
			);
	
			echo $estudiante->registrarEstudiante();
			echo $estudiante->registrarCredencialEstudiante();
			break;
		
	}

?>