
 <?php
include "../../conexionBDC.php";

//Si se quiere subir una imagen
if (isset($_POST['agnombre'])) {
    $nombreCliente = $_POST['agnombre'];
    $empresa = $_POST['agempresa'];
    $cuilCliente = $_POST['agcuil'];

    if (isset($_POST['agemail'])) {   
        $emailCliente = $_POST['agemail'];
    }
    if (isset($_POST['agtelefono'])) {
        $telefonoCliente = $_POST['agtelefono'];
    }
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');
         $rtdo = $con->query('INSERT INTO clientes (nombrecliente, cuilcliente, telefonocliente, fechaAltaCliente) VALUES ("' . $nombreCliente . '","' . $cuilCliente . '", "' . $telefonoCliente . '","' . $currentDate . '");');

         $consulta= $con->query('SELECT * FROM clientes WHERE  cuilcliente ="'.$cuilCliente.'" ');
            $rtdoconsulta = $consulta->fetch_assoc();
            if ($consulta->num_rows>0){
                echo "Bien";
            }
            $idcliente = $rtdoconsulta['idcliente'];
            $rtdoemp = $con->query('INSERT INTO infocliente (cliente_id, empresacliente_id, emailcliente) VALUES ("' . $idcliente . '","' . $empresa . '","' . $emailCliente . '");');
         

        if ($rtdo) {
            echo "Bien";
            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=7");
        } else {
            echo "Error";
            header("location:../SeguimientoContable/clientesEmpresa.php?resultado=8");
        }

} else {
    echo "Error";
    header("location:../SeguimientoContable/clientesEmpresa.php?resultado=8");
    
}

?>