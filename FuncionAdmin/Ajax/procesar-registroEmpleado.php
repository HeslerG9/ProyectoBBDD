<?php
include_once("../../class/class-empleado.php");

switch ($_GET["accion"]){
    case '1':

    $empleado = new Empleado(
    $_POST["NombreEmp"],
    $_POST["ApellidoEmp"],
    $_POST["ContraEmp"],
    $_POST["NumEmp"],
    $_POST["CorreoEmp"],
    $_POST["FechaNaEmp"],
    $_POST["PuestoEmp"]
);



echo $empleado->registrarEmpleado();
echo $empleado->registrarCredencialEmpleado();
break;
}

?>