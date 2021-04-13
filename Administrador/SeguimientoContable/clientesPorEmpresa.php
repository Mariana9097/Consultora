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
                <div class="col-sm-12 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                         
                            <div class="alert alert-danger">
                               
                            </div>
                            <div class="alert alert-secondary">
                               <h1>Clientes por empresa</h1>
                            </div>
                        <form method='post' action='realizarReporte.php'>
                            <div class="row my-2">
                            <div class="col-md-4 ">
                                <select name="agselectempresa" required class="form-control">
                                        <?php

                                            $consulta = $con->query("SELECT * FROM empresaclientes");

                                            while ($empresaclientes = $consulta->fetch_assoc()) {
                                                
                                                echo "<option value='".$empresaclientes['id']."' selected>".$empresaclientes['nombre']."</option>";

                                            }
                                    
                                        ?>
                                </select>
                                
                            </div>
                             <div class="col-md-2 m-auto">
                            <button class="btn btn-info  m-auto" data-toggle="modal" data-target="#staticBackdrop1">Buscar</button>
                             </div>
                             <div class="col-md-6 m-auto">
                                <button data-toggle='modal' data-target='#modalAgregarNuevo' class='btn btn-info mr-1 mb-1' style="float:right">+ Agregar Nuevo</button>
                            </div>
                            </div> 
                        </form>                                               
                        </div>
                    </div>
                    
                     <div class="table-responsive" style="margin-top:30px;">
                    <table id="dataTable" class="table">
                        <thead> 
                            <tr>
                                <th>Razón social</th>
                                <th>CUIL</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Plazo pago</th>
                                <th>Monto adeudado</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
               
                $consultaClientes = $con->query("SELECT * FROM clientes ");
                
                while ($resultadoClientes = $consultaClientes->fetch_assoc()) {
                    $montoadeudado = 0;
                    $cliente=$resultadoClientes['idcliente'];
                    if($resultadoClientes['fechaBajaCliente'] != NULL || $resultadoClientes['fechaBajaCliente'] != " "){
                        $urlReinc = 'reincUsuario.php?id='.$resultadoClientes['idcliente'];
                        $consultainfocliente = $con->query("SELECT * FROM infocliente WHERE cliente_id = $cliente");
                        $resultadoinfocliente=$consultainfocliente->fetch_assoc();
                        $consultaFacturas = $con->query("SELECT * FROM  facturas where cliente_id = $cliente AND estado_id=2");
                        while ($resultadoFacturas = $consultaFacturas->fetch_assoc()) {
                            $montoadeudado += $resultadoFacturas['montofact'];
                        }
                        echo "<tr class='table-info'>
                            <td>" . $resultadoClientes['nombrecliente'] . "</td>
                            <td>" . $resultadoClientes['cuilcliente'] . "</td>
                            <td>" . $resultadoinfocliente['emailcliente'] . "</td>
                            <td>" . $resultadoClientes['telefonocliente'] . "</td>
                            <td>" . $resultadoinfocliente['plazopago'] . "</td>
                            <td>" . $montoadeudado . "</td>
                            
                            <td><button data-toggle='modal' data-target='#modalEditar' class='btn btn-info mr-1 mb-1' onclick='editarClientePorEmpresa(".$resultadoClientes['idcliente'].");'>Modificar</button>
                               
                            </td>
                            
                            
                        </tr>";}}
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
       </div>
    </div>


<!-- Modal agregar nuevo -->
<div class="modal fade" id="modalAgregarNuevo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Agregar nuevo</h3>
            </div>
            <form action="agregarCliente.php" method="POST">
                <div class="modal-body">
                        <div class="mb-2">
                            <label for="agnombre">Nombre del cliente</label>
                            <select class="form-control" name="nvselectcliente" id="nvselectcliente" required>
                                <?php
                                    
                                    $consulta = $con->query("SELECT * FROM clientes ORDER BY nombrecliente");
                                
                                    while ($clientes = $consulta->fetch_assoc()) {
                                     
                                        echo "<option value='".$clientes['idcliente']."' selected>".$clientes['nombrecliente']."</option>";

                                    }
                            
                                ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="agemail">Email</label>
                            <input type="text" name="agemail" class="form-control">
                        </div>
                         <div class="mb-2">
                            <label for="agcuil">Plazo de pago</label>
                            <input type="text" name="agcuil" class="form-control">
                            
                        </div>
                        <div class="mb-2">
                            <label for="agselectempresa">Pertenece a</label>
                            <select name="agselectempresa" required class="form-control">
                                <?php

                                    $consulta = $con->query("SELECT * FROM empresaclientes");

                                    while ($empresaclientes = $consulta->fetch_assoc()) {
                                        
                                        echo "<option value='".$empresaclientes['id']."' selected>".$empresaclientes['nombre']."</option>";

                                    }
                            
                                ?>
                            </select>
                        </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="btnAgregarCliente"  type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    
                </div>
             </form>
        </div>
    </div>
</div>

<!-- Modal importar listado de clientes 
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
                    <table class="table">
                        <thead > 
                            <tr>
                                <th> Nombre</th>
                                <th> CUIL</th>
                                <th> Email</th>
                                <th> Teléfono</th>
                            </tr>
                        </thead>
                    </table>
               
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
                </div>
            </form>            
        </div>
    </div>
</div>
-->

<!-- Modal editar datos de un cliente -->
<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos de cliente</h5>
            </div>
            <form enctype="multipart/form-data" action="editarClientePorEmpresa.php" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="editarNombre">Nombre</label>
                        <input type="text" name="editarNombre" id="editarNombre" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="editarEmail">Email</label>
                        <input type="text" name="editarEmail" id="editarEmail" class="form-control" >
                    </div>
                    <div class="mb-2">
                        <label for="editarTelefono">Teléfono</label>
                        <input type="text" name="editarTelefono" id="editarTelefono" class="form-control" >
                    </div>
                    <div class="mb-2">
                        <label for="editarPlazo">Plazo de pago</label>
                        <input type="text" name="editarPlazo" id="editarPlazo" class="form-control" required>
                    </div>
                     <div class="mb-2">
                        <label for="editarEmpresa">Empresa</label>
                       <select name="selecteditarEmpresaCliente"  id="selecteditarEmpresaCliente" class="form-control" required>

                            <?php
                                  $con = new mysqli("localhost","root","","cobranzas");


                                  $consultaD = $con->query("SELECT * FROM `empresaclientes`");
                                

                                  while ($empresas= $consultaD->fetch_assoc()) {
                                      
                                      
                                      echo "<option value='".$empresas['id']."'>".$empresas['nombre']."</option>";

                                  }
                        
                            ?>
                    </select>
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
    <script src="../../paginacion.js"></script>
    <script src="funcionesSContable.js"></script>
    

</html>
