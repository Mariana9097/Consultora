<?php
 include "../../conexionBDC.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
$id = $_POST['volverId'];
$currentDateTime = date('Y-m-d H:i:s');

$consulta = $con->query("UPDATE `facturas` SET `faltaRetencion`= 1, `fechaacreditacion`= NULL ,`formapago_id`= NULL, estado_id = 2 WHERE `id`= '$id'");


if($consulta){
   header("location:../SeguimientoContable/facturas.php?resultado=1");
  
}else{
     header("location:../SeguimientoContable/facturas.php?resultado=2");

}
?>