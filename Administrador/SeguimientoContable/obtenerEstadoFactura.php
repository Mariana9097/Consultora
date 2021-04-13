<?php
 include "../../conexionBDC.php";

$idFuncion = $_POST['id'];

$datosFuncion = $con->query("SELECT * FROM facturas WHERE id = '$idFuncion'")->fetch_assoc();
                   
$funcion = array(
    'formapagoFuncion'=> $datosFuncion['formapago_id'],
    'acreditacionFuncion'=> $datosFuncion['fechaacreditacion'],
    'retencionFuncion'=> $datosFuncion['faltaRetencion']

);

$myJSON = json_encode($funcion);

echo $myJSON;

?>