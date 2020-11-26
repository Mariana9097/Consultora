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
                $row = 1;
            
                    $nombre = $sheet->getCell("A" . $row)->getValue();
                    $email = $sheet->getCell("B" . $row)->getValue();
                    $telefono = $sheet->getCell("C" . $row)->getValue();

                    //valido que la primera fila de la tabla excel sea
                    //dni, apellido, nombre, en ese orden, sino esta asi no importa la lista 

                    $nombre_p = strtolower($nombre);
                    $email_p = strtolower($email);
                    $telefono_p = strtolower($telefono);

                    
                        for ($row = 2; $row <= $highestRow; $row++) {

                            $nombre = $sheet->getCell("A" . $row)->getValue();
                            $email = $sheet->getCell("B" . $row)->getValue();
                            $telefono = $sheet->getCell("C" . $row)->getValue();

                            $consultaAl = $con->query("SELECT * FROM clientes WHERE email = '$email'");
                            
                            if (mysqli_num_rows($consultaAl) == 0) {
                                
                                
                                    $rtdo = $con->query('INSERT INTO clientes (nombrecliente, email, telefonocliente, fechaAltaCliente) VALUES ("' . $nombre . '","' . $email . '", "' . $telefono . '","' . $currentDate . '");');
                                    
                                    array_push($correcto, $nombre);
                             
                            }else{

                                array_push($yaAgregados, $nombre);

                            }
                        }
                    
                     
                unlink($archivo);
              }
              }
    }
      
    ?>
</div>