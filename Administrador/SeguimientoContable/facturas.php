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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">

       
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
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop1">Importar Excel</button>
                                </div>
                                <div class="col-md-4 mx-auto">
                                    <select name="selectEmpresa" required class="form-control" >
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
                        </div>
                    </div>
                    <table class="table">
                        <thead> 
                            <tr>
                                <th>Número</th>
                                <th>Fecha Emisión</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
             
               $consultaFact = $con->query("SELECT nrofact, fechaEmision, plazopago, empresacliente_id , cliente_id FROM facturas WHERE empresacliente_id = '$empresa' ORDER BY fechaEmision ASC");
               
                while ($resultadoFact = $consulta1->fetch_assoc()) {

                    $cliente=$resultadoClientes['idcliente'];
                    $consultaCliente= $con->query("SELECT nombre FROM clientes WHERE idcliente = '$cliente'")->fetch_assoc();
                    if($resultadoFact['estadoFact_id'] != "ANULADA" || $resultadoFact['estadoFact_id'] != "COBRADA"){
                            $urlReinc = 'reincUsuario.php?id='.$resultadoClientes['idcliente'];
                            echo "<tr class='table-info'>
                                <td>" . $resultadoClientes['nombrecliente'] . "</td>
                                <td>" . $resultadoClientes['email'] . "</td>
                                <td>" . $resultadoClientes['telefonocliente'] . "</td>
                                <td>" . $resultadoClientes['plazopago'] . "</td> 
                                <td>" . $resultadoClientes['nombre'] . "</td> 
                                
                                <td><button data-toggle='modal' data-target='#modalEditar' class='btn btn-info mr-1 mb-1' onclick='editar(".$resultadoClientes['idcliente'].");'>Modificar</button>
                                   
                                </td>
                                
                            </tr>";
                    }
                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
       </div>

<!-- Modal importar nomina completa de clientes -->
<div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h3 class="modal-title " id="staticBackdropLabel">Importar lista</h3>
            </div>
            
            
             <form method="POST" id="importPlanilla" name="importPlanilla" action="importClientes.php" enctype="multipart/form-data" role="form">
            
            <div class="modal-body">

                
                <div>
                    <h9>La extension para la lista debe ser .xlsx y los campos deben estar ordenados como se muestra a continuación: </h9>
               
                    <div class="container" style="margin-top:50px; ">

                        <div class="custom-file" style="overflow: hidden;" >
                            <input type="file" class="form-control-file" name="inpGetFile" id="inpGetFile" accept=".xlsx" onchange="comprobarLista()" lang="es" required>

                        </div>
                    
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    </body>
</html>
