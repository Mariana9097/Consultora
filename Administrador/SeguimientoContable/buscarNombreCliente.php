<?php
	include "../../conexionBDC.php";

	$nombre = $_POST["nombre"];

	if(!empty($_POST["id"])){

		$id = $_POST["id"];

		//verificar que el mail no este registrado por ningun otro tipo de usuario 
		$nombreCliente = $con->query("SELECT nombrecliente FROM clientes WHERE nombrecliente = '$nombre' AND idcliente <> '$id' AND fechaBajaCliente IS NULL");

	}
	else{
		//verificar que el mail no este registrado por ningun otro tipo de usuario 
		$nombreCliente = $con->query("SELECT nombrecliente FROM clientes WHERE nombrecliente = '$nombre' AND fechaBajaCliente IS NULL");

	}
	$existe = false;

	if (($nombreCliente->num_rows)==0) {
	    $existe = true;
	}

	$myJSON = json_encode($existe);
	    
	echo $myJSON;  

?>