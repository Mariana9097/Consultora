<?php
include "../../conexionBDC.php";

$cuil = $_POST["cuil"];

if(!empty($_POST["id"])){
	
	$id = $_POST["id"];
	//verificar que el mail no este registrado por ningun otro tipo de usuario 
	$cuilCliente = $con->query("SELECT cuilcliente FROM clientes WHERE cuilcliente = '$cuil' AND idcliente <> '$id' AND fechaBajaCliente IS NULL");
}

else{
	//verificar que el mail no este registrado por ningun otro tipo de usuario 
	$cuilCliente = $con->query("SELECT cuilcliente FROM clientes WHERE cuilcliente = '$cuil'AND fechaBajaCliente IS NULL");

}
$existe = false;

if (($cuilCliente->num_rows)==0) {
    $existe = true;
}

$myJSON = json_encode($existe);
    
echo $myJSON;  

?>