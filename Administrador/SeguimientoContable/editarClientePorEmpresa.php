<?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['editarNombre'])) {
    $nombreCliente = $_POST['editarNombre'];
    $telefonoCliente = $_POST['editarTelefono'];
    $emailCliente = $_POST['editarEmail'];
    $plazopago = $_POST['editarPlazo'];
    $empresa = $_POST['editarEmpresa'];
    $idCliente = $_POST['editarId'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');
      
        $update1 = $con->query("UPDATE clientes 
        SET nombrecliente = '$nombreCliente',cuilcliente = '$cuilCliente', telefonoCliente = '$telefonoCliente'
        WHERE idcliente = '$idCliente'");

        $update2 = $con->query("UPDATE infocliente SET emailcliente = '$emailCliente', plazopago = '$plazopago', empresacliente_id = '$idEmpresa'
        WHERE cliente_id = '$idCliente'");

        if ($update1 AND $update2) {
            echo "Bien";
            header("location:../SeguimientoContable/clientesPorEmpresa.php?resultado=1");
        } else {
            echo "Error";
            header("location:../SeguimientoContable/clientesPorEmpresa.php?resultado=2");
        }
        
} else {
    echo "Error";
    header("location:../SeguimientoContable/clientesPorEmpresa.php?resultadoeditar=5");
    
}


?>