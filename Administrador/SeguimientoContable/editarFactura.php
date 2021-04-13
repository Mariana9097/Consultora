<?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['editarNroFact'])) {
    $nroFact = $_POST['editarNroFact'];
    $fecha = $_POST['editarFecha'];
    $cliente = $_POST['selecteditarCliente'];
    $total = $_POST['editarTotal'];
    $empresa= $_POST['selecteditarEmpresa'];
    $idFact = $_POST['editarIdFact'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');

    $consultaNombre = $con->query("SELECT * FROM facturas WHERE nrofact= '$nroFact'");
    

    if ((($consultaNombre->num_rows) <2)) {
                        
                        if($cliente==1){
                            if($empresa==1){
                                $update = $con->query("UPDATE facturas
                                SET nrofact = '$nroFact', fechaEmision = '$fecha', montofact = '$total'
                                WHERE id = '$idFact'");
                            }
                            else{
                                $update = $con->query("UPDATE facturas
                                SET nrofact = '$nroFact', fechaEmision = '$fecha', montofact = '$total', empresacliente_id = '$empresa'
                                 WHERE id = '$idFact'");
                            }
                        }else{
                            if($empresa==1){
                                $update = $con->query("UPDATE facturas
                                SET nrofact = '$nroFact', fechaEmision = '$fecha', montofact = '$total',  cliente_id = '$cliente'
                                WHERE id = '$idFact'");
                            }
                            else{
                                $update = $con->query("UPDATE facturas
                                SET nrofact = '$nroFact', fechaEmision = '$fecha', montofact = '$total', cliente_id = '$cliente', empresacliente_id = '$empresa'
                                 WHERE id = '$idFact'");
                            }
                        }

                        if ($update) {
                            echo "Bien";
                            header("location:../SeguimientoContable/facturas.php?resultado=7");
                        } else {
                            echo "Error";
                            //header("location:../SeguimientoContable/facturas.php?resultado=1");
                        }
                    
    } else {
        echo "Error";
        header("location:../SeguimientoContable/facturas.php?resultado=4");
    }
} else {
    echo "Error";
    header("location:../SeguimientoContable/facturas.php?resultado=8");
}

?>