<?php
 include "../../conexionBDC.php";

$idFuncion = $_POST['id'];

$datosFuncion = $con->query("SELECT * FROM facturas WHERE id = '$idFuncion'")->fetch_assoc();
$idempresa = $datosFuncion['empresacliente_id'];
$empresa = $con->query("SELECT * FROM empresaclientes WHERE id = '$idempresa'")->fetch_assoc();
$idcliente = $datosFuncion['cliente_id'];
$cliente= $con->query("SELECT nombrecliente, idcliente FROM clientes WHERE idcliente = '$idcliente'")->fetch_assoc();


                   
$funcion = array(
    'nrofactFuncion'=> $datosFuncion['nrofact'],
    'fechaFuncion'=> $datosFuncion['fechaEmision'],
    'montoFuncion'=> $datosFuncion['montofact'],
    'clienteFuncion'=> $cliente['nombrecliente'],
    'empresaFuncion'=> $empresa['nombre'],
    'idclienteFuncion'=> $cliente['idcliente'],
    'idempresaFuncion'=> $empresa['id']

);

$myJSON = json_encode($funcion);

echo $myJSON;

?>