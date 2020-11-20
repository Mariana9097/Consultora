<?php
include "../conexionBD.php";



$cursos = $con->query("SELECT * FROM cursos");

$response= array();

$curso = $cursos->fetch_object();
//    $cursoscolab = array();
    $response = $curso->id;
    $response = $curso->nombreCurso;
     
   

//}

$response["success"] = 1;

echo json_encode($response);


?>
