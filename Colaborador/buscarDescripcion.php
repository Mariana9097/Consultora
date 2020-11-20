<?php
include "../conexionBD.php";

$id = $_POST['idTarea'];
$tarea = $con->query("SELECT * FROM tareas WHERE id = '$id'")->fetch_assoc();

$obj = array(
    'descripcion' => $tarea['descripcion']

);

$myJSON = json_encode($obj);

echo $myJSON;

?>
