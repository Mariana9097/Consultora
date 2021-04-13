<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <style>
            .custom-file-label::after {
                content: "Elegir";
            }
         </style>
        <script>
          docsearch({
            apiKey: 'null',
            indexName: 'orator',
            inputSelector: '#search', // CSS selector to target the <input />
            debug: false, // Set to `true` if you want to inspect the dropdown
          });
        </script>
       
    </head>
    <?php
        include "../../cabeceraCobranza.html";
         include "../../conexionBDC.php";
    ?>
    <body>
       <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                         
                            <div class="alert alert-danger">
                            </div>
                            <div class="alert alert-secondary">
                               <h1>Facturas</h1>
                            </div>
                             
                               <div class="row mx-2">
                                <div class="col-4">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop1">Importar Excel</button>
                                </div>
                                </div>
                            
                                <form method='post' action='mailNotificaciones.php'>
                                   <div class="row m-2">
                                    <div class="col-3">
                                        <select name="selectEmpresa" class="form-control" id="selectEmpresa" required>
                                              <option disabled selected >Pertenece a</option>
                                                <?php
                                                      
                                                  $consulta = $con->query("SELECT * FROM empresaclientes");
                                                
                                                  while ($empresaclientes = $consulta->fetch_assoc()) {
                                                     
                                                      echo "<option value='".$empresaclientes['id']."' selected>".$empresaclientes['nombre']."</option>";

                                                  }
                                            
                                                ?>
                                        </select>
                                    </div>
                                <div class="col-4">   
                                <button type='submit' class='btn btn-outline-primary mx-4'>Enviar notificaciones</a>
                                         
                                </div>                               
                                </form>
                               </div>
                            
                        </div>
                    </div>
                    <!-- -->
                  <div class="table-responsive" style="margin-top:30px;">
                    <table id="dataTable" class="table">
                        <thead> 
                            <tr>
                                <th>Número</th>
                                <th>Fecha Emisión</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
             
               $consultaFact = $con->query("SELECT * FROM facturas WHERE fechaBajaFactura IS NULL ORDER BY fechaEmision ASC");
                  
                    while ($resultadoFact = $consultaFact->fetch_assoc()){
                    $cliente = $resultadoFact['cliente_id'];
                    $empresaid = $resultadoFact['empresacliente_id'];
                    $consulta2 = "SELECT nombrecliente, idcliente FROM clientes WHERE idcliente = '$cliente'";
                    $consultaCliente = $con->query($consulta2)->fetch_assoc() or die($con->error);
                    $estado = $resultadoFact['estado_id'];
                    $consulta3 = "SELECT estadoFact FROM estadofactura WHERE id = '$estado'";

                    $consultaEstado = $con->query($consulta3)->fetch_assoc() or die($con->error);
                    $est = $consultaEstado['estadoFact'];
                    
                    $consultaEmpresa = $con->query("SELECT nombre FROM empresaclientes WHERE id = $empresaid");
                    $resultadoempresa = $consultaEmpresa->fetch_assoc();

                    if($resultadoFact['faltaRetencion']==1){
                        $retencion = "Falta retención";
                    } else{
                         $retencion = "";
                    }
                            echo "<tr class='table-info'>
                                <td>" . $resultadoFact['nrofact'] . "</td>
                                <td>" . $resultadoFact['fechaEmision'] . "</td>
                                <td>" . $consultaCliente['nombrecliente'] . "</td>
                                <td>" . $resultadoFact['montofact'] . "</td> 
                                <td><strong>" . $consultaEstado['estadoFact'] . "</strong ><br>" . $retencion . "</td>
                                <td><button data-toggle='modal' data-target='#modalEditar' class='btn btn-info mr-1 mb-1' onclick='editarFactura(".$resultadoFact['id'].");'>Modificar</button><button data-toggle='modal' data-target='#modalEstado' class='btn btn-info mr-1 mb-1' onclick='estadoFactura(".$resultadoFact['id'].",".$estado.");'>Cambiar Estado</button></td>                   
                                <td>" . $resultadoempresa['nombre'] . "</td>
                            </tr>";
                    
                }

               
                            ?>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
       </div>
                
                    <!--  -->
                </div>
            </div>
       </div>

<!-- Modal importar nomina completa de facturas -->
<div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h3 class="modal-title " id="staticBackdropLabel">Importar lista</h3>
            </div>
            
            
             <form method="POST" id="importPlanilla" name="importPlanilla" action="importFacturas.php" enctype="multipart/form-data" role="form">
            
            <div class="modal-body">

                
                    <h9>La extension para la lista debe ser .xlsx y los campos deben estar ordenados como se muestra a continuación: </h9>
               
                    <div class="container" style="margin-top:50px; ">

                        <div class="custom-file" style="overflow: hidden;" >
                            <input type="file" class="form-control-file" name="inpGetFile" id="inpGetFile" accept=".xlsx" onchange="comprobarLista()" lang="es" required>

                        </div>
                    
                        <select name="selectImportFact" class="form-control" id="selectImportFact" required>
                            <option disabled selected >Pertenece a</option>
                            <?php
                                  
                                $consulta = $con->query("SELECT * FROM empresaclientes");
                            
                                while ($empresaclientes = $consulta->fetch_assoc()) {
                                 
                                    echo "<option value='".$empresaclientes['id']."' selected>".$empresaclientes['nombre']."</option>";

                                }
                        
                            ?>
                        </select>
                    </div>
            
                  </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="btnImportar" type="submit" class="btn btn-primary ">Importar</button>
                    </div>

                </form>
            
            </div>
        </div>
    </div>
</div>

<!-- Modal editar datos de una factura -->
<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos de factura</h5>
            </div>
            <form enctype="multipart/form-data" action="editarFactura.php" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="editarNombre">Nro Factura</label>
                        <input type="text" name="editarNroFact" id="editarNroFact" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarEmail">Fecha Emisión</label>
                        <input type="text" name="editarFecha" id="editarFecha" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarCliente">Cliente</label>
                        <select name="selecteditarClienteFact"  id="selecteditarClienteFact" class="form-control" required>

                            <?php
                                  $con = new mysqli("localhost","root","","cobranzas");


                                  $consultaD = $con->query("SELECT * FROM `clientes`");
                                

                                  while ($clientes= $consultaD->fetch_assoc()) {
                                      

                                      echo "<option value='".$clientes['idcliente']."'>".$clientes['nombrecliente']."</option>";

                                  }
                        
                            ?>
                    </select>
                    </div>
                    <div class="mb-2">
                        <label for="editarTotal">Monto Factura</label>
                        <input type="text" name="editarTotal" id="editarTotal" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarEmpresa">Pertenece a la empresa</label>
                         <select name="selecteditarEmpresaFact"  id="selecteditarEmpresaFact" class="form-control" required>

                            <?php
                                  $con = new mysqli("localhost","root","","cobranzas");


                                  $consultaD = $con->query("SELECT * FROM `empresaclientes`");
                                

                                  while ($empresas= $consultaD->fetch_assoc()) {
                                      
                                      
                                      echo "<option value='".$empresas['id']."'>".$empresas['nombre']."</option>";

                                  }
                        
                            ?>
                    </select>
                    </div>
                     <div class="mb-2">
                        <input type="text" name="editarIdFact" id="editarIdFact" class="form-control" hidden>
                    </div>
                    <button type="button" class="btn btn-secondary  my-4" style=" float:right "data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary mx-4 my-4" style=" float:right">Aceptar</button>
                </div>               
            </form>
            <!--Dentro de este modal está la opción de eliminar-->
            <form enctype="multipart/form-data" action="bajaFactura.php" method="post">
                <input type ="text" id="bajaId" name="bajaId" hidden>
                <button type = "submit" class="btn btn-danger" style=" margin-left:20px; margin-bottom:20px" onclick='return confirmDelete()' ><i class='fa fa-trash '></i></button>
            </form>
        </div>
    </div>
</div>

 <!-- Modal cambiar estado factura-->
<div class="modal fade" id="modalEstado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar estado de factura</h5>
            </div>
            <form enctype="multipart/form-data" action="editarEstadoFactura.php" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label id="labelestado"></label>
                        <input type="text" id="idestado" name="idestado" hidden>
                        <input type="text" id="idfactestado" name="idfactestado" hidden>
                    </div>
                    <div class="mb-2">
                        <label for="agformapago">Forma de pago</label>
                        <select name="agformapago"  id="agformapago" class="form-control" required>
                        
                            <?php
                                  $con = new mysqli("localhost","root","","cobranzas");

                                  $consultaD = $con->query("SELECT * FROM `formapago`");

                                  while ($formapago= $consultaD->fetch_assoc()) {

                                      echo "<option value='".$formapago['id']."'>".$formapago['nombreFormaPago']."</option>";

                                  }
                                  date_default_timezone_set('America/Argentina/Buenos_Aires');
                            ?>
                    </select>
                    </div>
                     <label for="agacreditacion">Fecha de acreditación</label>
                        <input type="date" name="agacreditacion" id="agacreditacion" class="form-control" value="<?php echo date("Y-m-d");?>" required>
                    <div class="mb-2">
                        <label for="agretencion">Falta retención</label>
                        <select name="agretencion" id="agretencion" class="form-control" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </div>
                      <input type ="text" id="cambiarEstadoId" name="cambiarEsatdoId" hidden >
                     
                    <button type="button" class="btn btn-secondary  my-4" style=" float:right "data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary mx-4 my-4" style=" float:right">Aceptar</button>
                </div>               
            </form>
           
            <form enctype="multipart/form-data" action="volverFactPendiente.php" method="post">
                <input type ="text" id="volverId" name="volverId" hidden>
                <button type = "submit" class="btn btn-danger my-4" id="btnVolverPendiente" style=" float:left;" onclick='return confirm("Si vuelve a estado pendiente se perderán los datos del pago")'>Volver a pendiente</button>
            </form>
        </div>
    </div>
</div>


    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../paginacion.js"></script>
    <script src="funcionesSContable.js"></script>
    
    </body>
</html>
