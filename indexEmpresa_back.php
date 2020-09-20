<?php
include "conexionBD.php";


$consulta = $_POST["textarea_consulta"];
$contacto = $_POST["nomCons"];
$telefono = $_POST["telCons"];

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d H:i:s');

//$con->query('SELECT id FROM colaborador

$con->query('INSERT INTO `consulta`(`contenidoCons`, `nomCons`, `telCons`, `empresa_id`,`fechaCons`)
 VALUES ("'.$consulta.'", "'.$contacto.'", "'.$telefono.'", "'.$empresa_id.'","'.$fechaActual.'");');


        header("location: indexEmpresa.php");
?>
