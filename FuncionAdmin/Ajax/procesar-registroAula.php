<?php
include_once("../../class/class-aula.php");

	switch ($_GET["accion"]) {
        case '1':
	
			$aula = new Aula(
				$_POST["edificio"],
				$_POST["NumeroAula"]
			);
	
			echo $aula->registrarAula();
			break;
		
	}

?>
