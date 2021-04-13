<?php
 /*include "../../conexionBDC.php";

$idFuncion = $_POST['id'];

$datosFuncion = $con->query("SELECT * FROM clientes WHERE idcliente = '$idFuncion'")->fetch_assoc();
$funcion = array(
    'nombreFuncion'=> $datosFuncion['nombrecliente'],
    'cuilFuncion'=> $datosFuncion['cuilcliente'],
    'telFuncion'=> $datosFuncion['telefonocliente'],
    'idFuncion'=> $datosFuncion['idcliente']
);

$myJSON = json_encode($funcion);

echo $myJSON;
*/
?>

<?php
 include "../../conexionBDC.php";

$idFuncion = $_POST['id'];

$datosFuncion = $con->query("SELECT * FROM clientes WHERE idcliente = '$idFuncion'")->fetch_assoc();
$datosClientePorEmpresa = $con->query("SELECT * FROM infocliente WHERE cliente_id = '$idFuncion'")->fetch_assoc();
$funcion = array(
    'nombreFuncion'=> $datosFuncion['nombrecliente'],
    'cuilFuncion'=> $datosFuncion['cuilcliente'],
    'telFuncion'=> $datosFuncion['telefonocliente'],
    'plazoFuncion'=> $datosClientePorEmpresa['plazopago'],
    'empresaFuncion'=> $datosClientePorEmpresa['empresacliente_id'],
    'emailFuncion'=> $datosClientePorEmpresa['emailcliente'],
    'idFuncion'=> $datosFuncion['idcliente']
);

$myJSON = json_encode($funcion);

echo $myJSON;

?>