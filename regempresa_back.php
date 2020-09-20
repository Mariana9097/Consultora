<?php
include "conexionBD.php";


$email = trim($_POST["email"]);
$password = $_POST["pass"];
$nombre = $_POST["nombre"];
$razon = $_POST["razon"];
$cuit = $_POST["cuit"];
$telemp = $_POST["telemp"];
$provincia = $_POST["selectProv"];
$nomcontac = $_POST["nomcontac"];
$actividad = $_POST["actividad"];
$empleados = $_POST["empleados"];


$fechaActual = date("Y-m-d");

$password_cifrada = password_hash($password, PASSWORD_BCRYPT);

$con->query('INSERT INTO `empresa`(`nombreFantasia`, `razonSocial`, `email`, `password`,`fechaRegistro`, `cuit`, `telefono`, `nombContacto`, `actividad`, `empleados`, `provincia_id`)
 VALUES ("'.$nombre.'", "'.$razon.'", "'.$email.'", "'.$password_cifrada.'","'.$fechaActual.'", "'.$cuit.'", "'.$telemp.'","'.$nomcontac.'","'.$actividad.'","'.$empleados.'", "'.$provincia.'");');


header("location: login.php");
?>