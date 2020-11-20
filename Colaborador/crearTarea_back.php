<?php
include "../conexionBD.php";



$nombre = $_POST["nombreTarea"];
$descripcion = $_POST["descripcionTarea"];
$archivo = $_FILES['file_descrip'];
$nombrefile = $archivo['name'];
$comienzo = $_POST["comienzoTarea"];
$fin = $_POST["finTarea"];
$encargado =$_POST["mid"];
$proyecto = 1;
//$file= mysql_real_escape_string(file_get_contents($_FILES["file_descrip"]["tmp_name"]));
if (!empty($nombre = $_POST["nombreTarea"])) {

	$sql1= $con->query("INSERT INTO tareas (nombreTarea, descripcion, fechaInicioTarea, fechaFinTarea ,proyecto_id, colaborador_id)
	 VALUES ('$nombre', '$descripcion','$comienzo', '$fin', '$proyecto','$encargado')");
	$traerid= $con->query("SELECT MAX(id) AS id FROM tareas WHERE proyecto_id = $proyecto AND colaborador_id = $encargado");
	$id = $traerid->fetch_assoc();
	//$sql2= $con->query("INSERT INTO filesdescrip (filedescrip, tarea_id) VALUES ('$nomfile', '$id')");


	//$con->query("SELECT id FROM tareas WHERE proyecto_id = 1 ORDER BY (fechaInicioTarea) DESC");
	//$con->query("INSERT INTO fileDescrip (fileDescrip, tarea_id) VALUES ('$fil', '$')");
	
	if(!empty($nombrefile)){
		if(!is_dir('FileTareas')){
		mkdir('FileTareas', 0777);
	}
	move_uploaded_file($archivo['tmp_name'], 'FileTareas/'.$nombrefile);
	}
	
}

header("location: proyectoModerador.php");

