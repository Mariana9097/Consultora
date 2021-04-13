<?php
include "../../conexionBDC.php";
include "../class.upload.php";
?>
<div class="container" ><!--Oculta todos los Notice que muestra por el error en la libreria-->
    <?php
    $correcto = [];
    $yaAgregados = [];
    $formatoIncorrecto = [];

    if (isset($_FILES["inpGetFile"])) {

        $up = new Upload($_FILES["inpGetFile"]);

        if ($up->uploaded) {
            $up->Process("./uploads/");
            if ($up->processed) {
                /// leer el archivo excel
                require_once '../../PHPExcel/Classes/PHPExcel.php'; //incluimos la librería PHPExcel con la cual leeremos el archivo y tipo de archivo.
                $archivo = "uploads/" . $up->file_dst_name;
                $inputFileType = PHPExcel_IOFactory::identify($archivo); //abrimos/identificamos el archivo.
                $objReader = PHPExcel_IOFactory::createReader($inputFileType); //creamos un objeto tipo Reader 
                $objPHPExcel = $objReader->load($archivo);
                $sheet = $objPHPExcel->getSheet(0);

                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $colNumber = PHPExcel_Cell::columnIndexFromString($highestColumn);

                $currentDate = date('Y-m-d');
                $empresa = $_POST['selectImportFact'];


                $row = 1;
                
                    $fechaemision = $sheet->getCell("B" . $row)->getValue();
                    $nrofact = $sheet->getCell("E" . $row)->getValue();
                    $cliente = $sheet->getCell("F". $row)->getValue();
                    $monto = $sheet->getCell("G" . $row)->getValue();

                    //valido que la primera fila de la tabla excel sea
                    //den ese orden, sino esta asi no importa la lista a la base

                    $fechaemision_p = strtolower($fechaemision);
                    $nrofact_p = strtolower($nrofact);
                    $cliente_p = strtolower($cliente);
                    $monto_p = strtolower($monto);
           
                    
                        for ($row = 2; $row <= $highestRow; $row++) {

                            $fechaemision = $sheet->getCell("B" . $row)->getValue();
                            //$fechaemision = $fechaemisio->format('Y-m-d');
                            $nrofact = $sheet->getCell("E" . $row)->getValue();
                            $cliente = $sheet->getCell("F". $row)->getValue();
                            $monto = $sheet->getCell("G" . $row)->getValue();

                            $ConsultaCliente = $con->query("SELECT * FROM clientes WHERE  nombrecliente = '$cliente' AND fechaBajaCliente IS NULL");
                            
                            
                            if (mysqli_num_rows($ConsultaCliente) > 0 ) {
                                $traeridCliente = $ConsultaCliente->fetch_assoc();
                                    $cliente_id = $traeridCliente['idcliente'];
                                    if($fechaemision!=''){
                                        $rtdo = $con->query('INSERT INTO facturas (nrofact, fechaEmision, montofact, cliente_id , estado_id, empresacliente_id , faltaRetencion) VALUES ("' . $nrofact . '","' . $fechaemision . '","' . $monto . '", "' . $cliente_id . '",1, "' . $empresa . '",1);');
                                        array_push($correcto, $nrofact);

                                        

                                        $insertIncidencia = $con->query('INSERT INTO factincidencias (fechaincidencia) VALUES ("' . $currentDate . '");');
                             
                                    }
                                
                                    
                            }else{

                                array_push($yaAgregados, $nrofact);
                                echo $highestRow;

                            }
                        }
                    
                        
                            //header("location:../SeguimientoContable/clientesEmpresa.php?");
                        
                unlink($archivo);
              
              }
    }
}
                        
      
    ?>
</div>