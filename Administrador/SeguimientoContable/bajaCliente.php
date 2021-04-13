<?php
 include "../../conexionBDC.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
$id = $_POST['bajaId'];
$currentDateTime = date('Y-m-d H:i:s');

$consulta = $con->query("UPDATE `clientes` SET `fechaBajaCliente`= '$currentDateTime' WHERE `idcliente`= '$id'");
//$consulta = $con->query("DELETE FROM clientes WHERE idcliente = '$id'");

if($consulta){
   header("location:../SeguimientoContable/clientesEmpresa.php?resultado=1");
  
}else{
     header("location:../SeguimientoContable/clientesEmpresa.php?resultado=2");

}

?>