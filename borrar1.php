<?php
include "conexionBD.php";



$cursos = $con->query("SELECT * FROM cursos");

if(mysqli_num_rows($cursos)>0){
$response["listacursos"] = array();

while ($curso = $cursos->fetch_object()) {
    $cursoscolab = array();
    $cursoscolab["id"] = $curso->id;
    $cursoscolab["nombreCurso"] = $curso->nombreCurso;
     
     array_push($response["listacursos"], $cursoscolab);

}

$response["success"] = 1;

echo json_encode($response);
}else{
    $response["success"] = 0;
    $response["message"] = "no hay";
    echo json_encode($response);
}

?>
