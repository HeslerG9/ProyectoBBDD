<?php
include_once("../../class/class-carrera.php");
	//sleep(5);
	//<div class="bg-danger">
	switch ($_GET["accion"]) {
        case '1':
		$resultado = array();
		/* if ( $_POST["codigoCarrera"] != $_POST["codigoFacultad"]){
			$resultado["codigo_resultado"]=0;
			$resultado["mensaje"]='Error, las contraseñas no coinciden';
			echo json_encode($resultado);
			exit;
		} */
			$carrera = new Carrera(
				$_POST["codigoCarrera"],
				$_POST["codigoCE"],
				$_POST["nombreCarrera"],
				$_POST["codigoFacultad"],
				$_POST["codigoDepartamento"],
				$_POST["cantidadAsignaturas"],
				$_POST["cantidadUv"],
				$_POST["grado"]
			);
			//$resultado["json"]=$carrera->registrarCarrera();

			//$resultado["mensaje"]='Registro guardado con éxito.';
			echo $carrera->registrarCarrera();
			break;
		
	}

?>
