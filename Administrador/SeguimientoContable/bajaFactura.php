<?php
 include "../../conexionBDC.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
$id = $_POST['bajaId'];
$currentDateTime = date('Y-m-d H:i:s');

$consulta = $con->query("UPDATE `facturas` SET `fechaBajaFactura`= '$currentDateTime' WHERE `id`= '$id'");
//$consulta = $con->query("DELETE FROM clientes WHERE idcliente = '$id'");

if($consulta){
   header("location:../SeguimientoContable/facturas.php?resultado=1");
  
}else{
     header("location:../SeguimientoContable/facturas.php?resultado=2");

}

?>