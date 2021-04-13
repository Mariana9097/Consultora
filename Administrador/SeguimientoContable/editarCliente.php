<?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['editarNombre'])) {
    $nombreCliente = $_POST['editarNombre'];
    $telefonoCliente = $_POST['editarTelefono'];
    $cuilCliente= $_POST['editarCuil'];
    $idCliente = $_POST['editarId'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');
      
        $update = $con->query("UPDATE clientes 
        SET nombrecliente = '$nombreCliente',cuilcliente = '$cuilCliente', telefonoCliente = '$telefonoCliente'
        WHERE idcliente = '$idCliente'");

        if ($update) {
            echo "Bien";
            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=1");
        } else {
            echo "Error";
            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=2");
        }
        
} else {
    echo "Error";
    header("location:../SeguimientoContable/clientesEmpresa.php?resultadoeditar=5");
    
}


?>