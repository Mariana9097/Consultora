<?php
include "../../conexionBDC.php";
include "../class.upload.php";
?>
<div class="container" hidden><!--Oculta todos los Notice que muestra por el error en la libreria-->
    <?php
    $correcto = [];
    $yaInscriptos = [];
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

                $currentDateTime = date('Y-m-d H:i:s');
                
                $first_row = 1;
                
                

                if($dni) {
                    $dni = $sheet->getCell("A" . $first_row)->getValue();
                    $apellido = $sheet->getCell("B" . $first_row)->getValue();
                    $nombre = $sheet->getCell("C" . $first_row)->getValue();

                    //valido que la primera fila de la tabla excel sea
                    //dni, apellido, nombre, en ese orden, sino esta asi no importa la lista 

                    $dni_p = strtolower($dni);
                    $nombre_p = strtolower($nombre);
                    $apellido_p = strtolower($apellido);

                    if (($dni_p == "dni" || $dni_p == "documento") &&  $nombre_p == "nombre" && $apellido_p == "apellido") {
                        for ($row = 2; $row <= $highestRow; $row++) {

                            $dni = $sheet->getCell("A" . $row)->getValue();
                            $apellido = $sheet->getCell("B" . $row)->getValue();
                            $nombre = $sheet->getCell("C" . $row)->getValue();

                            $consultaAl = $con->query("SELECT * FROM usuario WHERE dniUsuario = '$dni'");
                            
                            if (mysqli_num_rows($consultaAl) == 0) {
                                
                                if(validarDNI($dni)){
                                    $sql = 'INSERT INTO `usuario`(`nombreUsuario`,`apellidoUsuario`, `dniUsuario`, `fechaAltaUsuario`, `legajoUsuario`) VALUES ("' . $nombre . '","' . $apellido . '", "' . $dni . '","' . $currentDateTime . '","' . $dni . '");';
                                    $rtdo = $con->query($sql);
                                    array_push($correcto, $dni);
                                }else{
                                    $nombreCompleto = $apellido . ", ".$nombre; 
                                    array_push($formatoIncorrecto, $nombreCompleto);
                                }

                                
                            }else{

                                array_push($yaInscriptos, $dni);
                            }
                        }
                    } else {
                        //echo "<script> alert('error en el formato de la primera fila') </script>";
                        header("Location:/DayClass/Administrador/ConfiguracionSistema/Usuario/configUsuario.php?resultado=6");
                    }

                }else{
                    $dni = $sheet->getCell("A" . $first_row)->getValue();
                    $legajo = $sheet->getCell("B" . $first_row)->getValue();
                    $apellido = $sheet->getCell("C" . $first_row)->getValue();
                    $nombre = $sheet->getCell("D" . $first_row)->getValue();

                    //valido que la primera fila de la tabla excel sea
                    //dni, legajo, apellido nombre, en ese orden, sino esta asi no importa la lista 

                    $dni_p = strtolower($dni);
                    $legajo_p = strtolower($legajo);
                    $nombre_p = strtolower($nombre);
                    $apellido_p = strtolower($apellido);

                    if (($dni_p == "dni" || $dni_p == "documento") && $legajo_p == "legajo" && $nombre_p == "nombre" && $apellido_p == "apellido") {
                        for ($row = 2; $row <= $highestRow; $row++) {

                            $dni = $sheet->getCell("A" . $row)->getValue();
                            $legajo = $sheet->getCell("B" . $row)->getValue();
                            $apellido = $sheet->getCell("C" . $row)->getValue();
                            $nombre = $sheet->getCell("D" . $row)->getValue();


                            $consultaAl = $con->query("SELECT * FROM usuario WHERE dniUsuario = '$dni' AND legajoUsuario = '$legajo'");
                            
                            if (mysqli_num_rows($consultaAl) == 0){
                                
                                if(validarDNI($dni) && validarLegajo($legajo)){
                                    
                                    $sql = 'INSERT INTO `usuario`(`nombreUsuario`,`apellidoUsuario`, `dniUsuario`, `fechaAltaUsuario`, `legajoUsuario`) VALUES ("' . $nombre . '","' . $apellido . '", "' . $dni . '","' . $currentDateTime . '","' . $legajo .'");';
                                    $rtdo = $con->query($sql);

                                    array_push($correcto, $legajo);
                                }else{
                                    $nombreCompleto = $apellido . ", ".$nombre; 
                                    array_push($formatoIncorrecto, $nombreCompleto);
                                }
                                   
                            } else {

                                array_push($yaInscriptos, $legajo);
                            }
                        }
                    } else {
                        //echo "<script> alert('error en el formato de la primera fila') </script>";
                    header("Location:/DayClass/Administrador/ConfiguracionSistema/Usuario/configUsuario.php?resultado=6");
                    }
                    
                }

                unlink($archivo);
            }
        }
    }
    ?>
</div>



















<?php
include "../../conexionBDC.php";
include "../class.upload.php";
?>
<div class="container" hidden><!--Oculta todos los Notice que muestra por el error en la libreria-->
    <?php
    $correcto = [];
    $yaInscriptos = [];
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

                $currentDateTime = date('Y-m-d H:i:s');
            
                        for ($row = 2; $row <= $highestRow; $row++) {

                            $nro = $sheet->getCell("A" . $row)->getValue();
                            $apellido = $sheet->getCell("B" . $row)->getValue();
                            $nombre = $sheet->getCell("C" . $row)->getValue();
                            $nombre = $sheet->getCell("E" . $row)->getValue();

                            $consultaAl = $con->query("SELECT * FROM usuario WHERE dniUsuario = '$dni'");
                            
                            if (mysqli_num_rows($consultaAl) == 0) {
                                
                                if(validarDNI($dni)){
                                    $sql = 'INSERT INTO `usuario`(`nombreUsuario`,`apellidoUsuario`, `dniUsuario`, `fechaAltaUsuario`, `legajoUsuario`) VALUES ("' . $nombre . '","' . $apellido . '", "' . $dni . '","' . $currentDateTime . '","' . $dni . '");';
                                    $rtdo = $con->query($sql);
                                    array_push($correcto, $dni);
                                }else{
                                    $nombreCompleto = $apellido . ", ".$nombre; 
                                    array_push($formatoIncorrecto, $nombreCompleto);
                                }

                                
                            }else{

                                array_push($yaInscriptos, $dni);
                            }
                        }

                }
                    
                }

                unlink($archivo);
            }
      
    ?>
</div>