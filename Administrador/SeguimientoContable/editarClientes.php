<?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['editarNombre'])) {
    $nombreCliente = $_POST['editarNombre'];
    $emailCliente = $_POST['editarEmail'];
    $telefonoCliente = $_POST['editarTelefono'];
    $plazopago = $_POST['editarPlazo'];
    $empresa = $_POST['editarEmpresa'];
    $idCliente = $_POST['editarId'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');

    $consultaNombre = $con->query("SELECT * FROM clientes WHERE fechaBajaCliente IS NULL AND nombrecliente = '$nombreCliente'");
    $nombreAnterior = $consultaNombre->fetch_assoc()['nombrecliente'];
    $idEmpresa = 1;
    if ((($consultaNombre->num_rows) == 0) || ($nombreCliente == $nombreAnterior)) {
        
                        $update = $con->query("UPDATE clientes 
                        SET nombrecliente = '$nombreCliente',email = '$emailCliente', telefonoCliente = '$telefonoCliente', plazopago = '$plazopago', empresacliente_id = '$idEmpresa'
                        WHERE idcliente = '$idCliente'");

                        if ($update) {
                            echo "Bien";
                            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=7");
                        } else {
                            echo "Error";
                            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=8");
                        }
                    
    } else {
        echo "Error";
        header("location:../SeguimientoContable/clientesEmpresa.php?resultado=4");
    }
} else {
    echo "Error";
    header("location:../SeguimientoContable/clientesEmpresa.php?resultado=8");
}

?>