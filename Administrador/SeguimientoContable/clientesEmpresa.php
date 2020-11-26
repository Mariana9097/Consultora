<!DOCTYPE html>
<html lang="es">
    <head>
         <meta charset="UTF-8">
        <html lang="es">
        <meta name="viewport" context="width=device-width, user-scalable=no, initial_scale=1, maximum-scale=1, minimum-scalable=1">
        <!--<link rel="import" href="index.html" id="miimport">-->    
        <link rel="stylesheet" href="CSS/fontello.css">
        <link rel="stylesheet" href="CSS/estilos.css">
        
       
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">
        <style>
            .custom-file-label::after {
                content: "Elegir";
            }
        </style>
  
      </head>
    <?php
        include "../../cabeceraCobranza.html";
         include "../../conexionBDC.php";
    ?>

    <body>
       <div class="container">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                         
                            <div class="alert alert-danger">
                               
                            </div>
                           
                            <form action="agregarCliente.php" method="POST">

                                <div class="form-row ">
                                    <div class="col-sm-3 my-2">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre del cliente" >
                                    </div>
                                    <div class="col-sm-3 my-2">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                        
                                    </div>
                                    <div class="col-sm-3 my-2">
                                        <input type="number" name="telefono" class="form-control" placeholder="Teléfono">
                                    </div>
                                    <div class="col-auto center my-2">
                                    <select name="selectEmpresa" required class="form-control forma" >
                                      <option disabled selected >Pertenece a</option>
                                        <?php
                                              

                                              $consulta = $con->query("SELECT * FROM empresaclientes");
                                            

                                              while ($empresaclientes = $consulta->fetch_assoc()) {
                                                 

                                                  echo "<option value='".$empresaclientes['id']."' selected>".$empresaclientes['nombre']."</option>";

                                              }
                                    
                                        ?>
                                    </select>
                                    </div>
                                    <div class="col-auto center my-2">
                                     
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                    
                                     </div>
                                     </div>
                                     </form>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop1">Importar Excel</button>
                                    
                                                           
                        </div>
                    </div>
                    
                     <div class="mb-4 table-responsive">
                    <table class="table">
                        <thead> 
                            <tr>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Plazo de pago</th>
                                <th>Pertenece a</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
               
                $consultaClientes = $con->query("SELECT * FROM clientes INNER JOIN empresaclientes ON clientes.empresacliente_id = empresaclientes.id ORDER BY clientes.empresacliente_id ASC");

                while ($resultadoClientes = $consultaClientes->fetch_assoc()) {
                    $cliente=$resultadoClientes['idcliente'];
                    if($resultadoClientes['fechaBajaCliente'] != NULL || $resultadoClientes['fechaBajaCliente'] != " "){
                            $urlReinc = 'reincUsuario.php?id='.$resultadoClientes['idcliente'];
                            echo "<tr class='table-info'>
                                <td>" . $resultadoClientes['nombrecliente'] . "</td>
                                <td>" . $resultadoClientes['email'] . "</td>
                                <td>" . $resultadoClientes['telefonocliente'] . "</td>
                                <td>" . $resultadoClientes['plazopago'] . "</td> 
                                <td>" . $resultadoClientes['nombre'] . "</td> 
                                
                                <td><button data-toggle='modal' data-target='#modalEditar' class='btn btn-info mr-1 mb-1' onclick='editar(".$resultadoClientes['idcliente'].");'>Modificar</button>
                                   
                                </td>
                                
                            </tr>";}}
                            ?>
                        </tbody>
                    </table>

                </div>
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

<!-- Modal editar datos de un cliente -->
<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar permiso</h5>
            </div>
            <form enctype="multipart/form-data" action="editarClientes.php" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="editarNombre">Nombre</label>
                        <input type="text" name="editarNombre" id="editarNombre" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarEmail">Email</label>
                        <input type="text" name="editarEmail" id="editarEmail" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarTelefono">Teléfono</label>
                        <input type="text" name="editarTelefono" id="editarTelefono" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarPlazo">Plazo de pago</label>
                        <input type="text" name="editarPlazo" id="editarPlazo" class="form-control" required>
                    </div>
                     <div class="mb-2">
                        <label for="editarEmpresa">Empresa</label>
                        <input type="text" name="editarEmpresa" id="editarEmpresa" class="form-control" required readonly>
                    </div>
                      <input type ="text" id="editarId" name="editarId" hidden >
                      <button deshabilitado class='btn btn-danger  my-4' style=" float:left" onclick='darBaja(" . $funcion['id'] . ");'><i class='fa fa-trash mr-1'></i></button>
                    <button type="button" class="btn btn-secondary  my-4" style=" float:right "data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary mx-4 my-4" style=" float:right">Aceptar</button>
                </div>

                   
                   
                
                   

               
            </form>
        </div>
    </div>
</div>
    </body>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/paginacion.js"></script>
    <script src="funcionesSContable.js"></script>

</html>
