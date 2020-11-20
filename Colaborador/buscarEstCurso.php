<?php
include "../conexionBD.php";

$id = $_POST['idColab'];


$cursos = $con->query("SELECT * FROM cursos WHERE colaborador_id = '$id'");

while ($curso = $cursos->fetch_assoc()) {
$obj = {'cursos':$curso['nombreCurso'], 'anio':35};

}

$myJSON = json_encode($obj);

echo $myJSON;

?>
