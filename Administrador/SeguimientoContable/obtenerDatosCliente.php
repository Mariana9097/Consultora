<?php
 include "../../conexionBDC.php";

$idFuncion = $_POST['id'];

$datosFuncion = $con->query("SELECT * FROM clientes WHERE idcliente = '$idFuncion'")->fetch_assoc();
$idempresa = $datosFuncion['empresacliente_id'];
$empresa = $con->query("SELECT * FROM empresaclientes WHERE id = '$idempresa'")->fetch_assoc();
$funcion = array(
    'nombreFuncion'=> $datosFuncion['nombrecliente'],
    'emailFuncion'=> $datosFuncion['email'],
    'telFunction'=> $datosFuncion['telefonocliente'],
    'plazoFunction'=> $datosFuncion['plazopago'],
    'empresaFunction'=> $empresa['nombre']

);

$myJSON = json_encode($funcion);

echo $myJSON;

?>