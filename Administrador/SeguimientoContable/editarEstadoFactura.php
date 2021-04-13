<?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['idfactestado'])) {
	$factura = $_POST['idfactestado'];
    $estado = $_POST['idestado'];
    $formapago = $_POST['agformapago'];
    $acreditacion = $_POST['agacreditacion'];
    $retencion = $_POST['agretencion'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');

    $consultaNombre = $con->query("UPDATE facturas SET  formapago_id = '$formapago' , estado_id = '$estado', faltaRetencion = '$retencion', fechaacreditacion = '$acreditacion' WHERE id = '$factura'");
                        

    if ($update) {
        echo "Bien";
        header("location:../SeguimientoContable/facturas.php?resultado=7");
    } else {
        echo "Error";
        header("location:../SeguimientoContable/facturas.php?resultado=8");
    }
                    
} else {
    echo "Error";
    header("location:../SeguimientoContable/facturas.php?resultado=8");
}

?>