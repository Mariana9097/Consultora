<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Consultora</title>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
       
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
                               <h1>Incidencias</h1>
                            </div>                        
                                    
                                <form method='post' action='realizarReporte.php'>
                                    <div class="row my-2">
                                    <div class="col-md-4 mx-auto">
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
                                    <div class="col-md-8 mx-auto">
                                        
                                        <button type='submit' class='btn btn-outline-primary'>Generar Reporte</a>
                                       
                                        
                                    </div>
                                    </div>
                                </form>
                            

                        </div>
                    </div>
                    <!-- -->
                  <div class="table-responsive" style="margin-top:30px;">
                    <table id="dataTable" class="table">
                        <thead> 
                            <tr>
                                <th>Número</th>
                                <th>Cliente</th>
                                <th>Fecha Emisión</th>
                                <th>Programación</th>
                                <th>Total</th>
                                <th>Tema</th>
                                <th>Respuesta</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
             
               $consultaFact = $con->query("SELECT id, nrofact, fechaEmision, montofact, estado_id , cliente_id FROM facturas WHERE empresacliente_id = 1 ORDER BY fechaEmision ASC");
                  
                    while ($resultadoFact = $consultaFact->fetch_assoc()){
                    $cliente = $resultadoFact['cliente_id'];
                    $consulta2 = "SELECT razonsocial, idcliente FROM clientes WHERE idcliente = '$cliente'";
                    $consultaCliente = $con->query($consulta2)->fetch_assoc() or die($con->error);
                    $estado = $resultadoFact['estado_id'];
                    $consulta3 = "SELECT estadoFact FROM estadofactura WHERE id = '$estado'";
                    $consultaEstado = $con->query($consulta3)->fetch_assoc() or die($con->error);
                 
                            
                            echo "<tr class='table-info'>
                                <td>" . $resultadoFact['nrofact'] . "</td>
                                <td>" . $consultaCliente['razonsocial'] . "</td>
                                <td>" . $resultadoFact['fechaEmision'] . "</td>
                                <td>" . $resultadoFact['fechaEmision'] . "</td>
                                <td>" . $resultadoFact['montofact'] . "</td>
                                <td>Detalle respuesta</td>
                                <td>Tema de la incidencia</td>
                                <td><strong>" . $consultaEstado['estadoFact'] . "</strong></td>
                                <td><button data-toggle='modal' data-target='#modalEditar' class='btn btn-info mr-1 mb-1' onclick='editar(".$consultaCliente['idcliente'].");'>Modificar</button></td>                                
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

   

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../paginacion.js"></script>
    <script src="funcionesSContable.js"></script>

    </body>
</html>