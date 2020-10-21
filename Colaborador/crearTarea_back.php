<?php
include "../conexionBD.php";

$proyecto = 1;
$encargado = $_POST['encargado'];
$nombre = $_POST["nombreTarea"];
$descripcion = $_POST["descripcionTarea"];
$comienzo = $_POST["comienzoTarea"];
$fin = $_POST["finTarea"];

if (!empty($nombre = $_POST["nombreTarea"])) {
$con->query("INSERT INTO tareas (nombreTarea, descripcion, fechaInicioTarea, fechaFinTarea ,proyecto_id, colaborador_id)
 VALUES ('$nombre', '$descripcion','$comienzo', '$fin', '$proyecto','$encargado')");
}else{
	echo "vacio";
}