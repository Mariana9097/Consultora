<?php
include "conexionBD.php";


$email = $_POST["email"];
$password = $_POST["pass"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telColab = $_POST["telColab"];
$provincia = $_POST["selectProv"];
$aptitudes = $_POST['habilidad'];


$conocimiento = $_POST["conoc"];

//$cv1 = $_POST["fileInput"];
//$cv = $_FILES['fileInput'];
$nombre_archivo = $_FILES['fileInput'];
//$tipo_archivo = $_FILES['file-input']['type'];
//print_r($cv1);
//if(!file_exists($cv1)){
//  echo "No existe";
//}
$linked = $_POST["linked"];

$fechaActual = date("Y-m-d");

 //password_has(pass, PASSWORD_DEFAULT) se usa para cifrar la contraseña y password_verify(pass, pass_cifrada) -> true o false para descifrarla.
$password_cifrada = password_hash($password, PASSWORD_DEFAULT);

$con->query("INSERT INTO colaborador (nombre,apellido, email,password,fechaRegistro,telefono,provincia_id)
 VALUES ('$nombre', '$apellido','$email', '$password_cifrada', '$fechaActual','$telColab','$provincia')");

$consulta1 = $con->query("SELECT * FROM colaborador WHERE email= '$email' AND nombre = '$nombre'");
$resultado1 = $consulta1->fetch_assoc();
$colaborador = $resultado1['id'];


//-----------------Idiomas------------------------------//
if (!empty($_POST['selectIdioma'])) {
$items1 = ($_POST['selectIdioma']);
$items2 = ($_POST['selectNivel']);

while(true){

  $item1 = current($items1);
  $item2 = current($items2);

  $idioma = (($item1 !== false) ? $item1 : ", &nbsp;");
  $nivel = (($item2 !== false) ? $item2 : ", &nbsp;");

  $valores = '('.$idioma.',"'.$nivel.'","'.$colaborador.'"),';

  $valoresQ = substr($valores, 0, -1);

  $con->query("INSERT INTO idiomas (idioma_id,idiomaNivel_id,colab_id)
 VALUES $valoresQ");


  $item1 = next($items1);
  $item2 = next($items2);

  if($item1 ===false && $item2 === false) break;
}
}


//---------------Cursos-----------------------------------//
/*if (!empty($_POST['cursoegreso'])) {
$curso11 = $_POST['curso'];
$curso1=implode($curso11);
$cursoegreso1 = $_POST['cursoegreso'];
$cant1 = $_POST['cant'];
$tiempo1 = $_POST['tiempo'];


while(true){

  $curso2 = current($curso1);
  $cursoegreso2 = $cursoegreso1[0];
  $cant2 = current($cant1);
  $tiempo2 = current($tiempo1);

  $curso= (($curso2  !== false) ? $curso2  : ", &nbsp;");
  $cursoegreso = (($cursoegreso2  !== false) ? $cursoegreso2 : ", &nbsp;");
  $cant = (( $cant2  !== false) ?  $cant2  : ", &nbsp;");
  $tiempo = (($tiempo2  !== false) ? $tiempo2 : ", &nbsp;");

  $valores = '("'.$curso.'","'.$cursoegreso.'","'.$cant.'","'.$tiempo.'","'.$colaborador.'"),';

  $valoresQ = substr($valores, 0, -1);

  $con->query("INSERT INTO  cursos (nombreCurso,anio, duracion, tiempo_id, colaborador_id)
 VALUES $valoresQ");


   $curso2 = next($curso1);
   $cursoegreso2 = next($cursoegreso1);
   $cant2 = next($cant1);
   $tiempo2 = next($tiempo1);

  if($curso2 ===false && $cursoegreso2 === false ) break;
}
}



*/


//----------------------Estudios-------------------------//
if (!empty($_POST['selectEst'])) {
$estudio1 = $_POST['selectEst'];
$egreso1 = $_POST['egreso'];
$curso1 = implode($_POST['curso']);
$cursoegreso1 = $_POST['cursoegreso'];
$cant1 = $_POST['cant'];
$tiempo1 = $_POST['tiempo'];

while(true){

  $estudio2 = current($estudio1);
  $egreso2 = current($egreso1);
  $curso2 = current($curso1);
  $cursoegreso2 = current( $cursoegreso1);
  $cant2 = current($cant1);
  $tiempo2 = current($tiempo1);

  $estudio= (($estudio2  !== false) ? $estudio2  : ", &nbsp;");
  $egreso = (($egreso2  !== false) ? $egreso2 : ", &nbsp;");
  $curso = (($egreso2  !== false) ? $curso2 : ", &nbsp;");
  $cursoegreso = (($egreso2  !== false) ? $cursoegreso2 : ", &nbsp;");
  $cant = (($egreso2  !== false) ? $cant2 : ", &nbsp;");
  $tiempo = (($egreso2  !== false) ? $tiempo2 : ", &nbsp;");

  $valores = '('.$estudio.',"'.$egreso.'","'.$colaborador.'","'.$curso.'","'.$cursoegreso.'","'.$cant.'","'.$tiempo.'"),';

  $valoresQ = substr($valores, 0, -1);

 $con->query("INSERT INTO estudios (estudio_id, anio, colab_id, nombreCurso, anioo, duracion, tiempo_id)
 VALUES $valoresQ");


   $estudio2 = next($estudio1);
   $egreso2 = next($egreso1);
   

  if($estudio2 ===false && $egreso2 === false) break;
}
}
//----------------Aptitudes---------------------------//
foreach ($aptitudes as &$valor) {
  $con->query("INSERT INTO aptitudes (aptitud_id , colab_id) VALUES ('$valor', '$colaborador')");

}
//----------------------------------------------------//
$con->query("INSERT INTO conColaborador (conocimientos, cv, linked, colab_id)
 VALUES ('$conocimiento', '$nombre_archivo', '$linked', '$colaborador')");


//if(!is_dir('curriculums')){
//  mkdir('curriculums');
//}

//move_uploaded_file($cv, 'curriculums. '/' .$nombre_archivo');
//header("location: login.php");

