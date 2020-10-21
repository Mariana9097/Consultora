
<!DOCTYPE HTML>

<html>
  <head>
    <title>Consultoria Administrativa</title>
        <meta charset="UTF-8">
        <html lang="es">
        <meta name="viewport" context="width=device-width, user-scalable=no, initial_scale=1, maximum-scale=1, minimum-scalable=1">
        <!--<link rel="import" href="index.html" id="miimport">-->    
        <link rel="stylesheet" href="CSS/fontello.css">
        <link rel="stylesheet" href="CSS/estilos.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script type="text/javascript" src="validacionEmp.js"></script>  

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     
     <style >
        .modal-body{
          background-image: url("imagenes/Sin título2.png");
          background-image: no-repeat;
          background-image: fixed;
          background-image: center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        body{
          background-image: url("imagenes/Sin título2.png");
          background-image: no-repeat;
          background-image: fixed;
          background-image: center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
         </style>

  </head>
    
  <?php
    
         include "cabeceraLogin.html";
         include "conexionBD.php";
   /* session_start();
         if (!isset($_SESSION['empresa'])) {
          //Nos envía a la página de inicio
          header("location:login.php");
         }
         $id = $_SESSION['empresa']['id'];
      */
  ?>

  <body>
    <div class="container text-center mx-auto" style="width: 100%; margin-top:80px">
     <div class="jumbotron " style="background: rgba(38, 146, 163, 0.55)">
       <h1 style="color:white" class="display-5">Comienza!</h1>
       <h1 style="color:white;font-size:28px;" class="lead">Trabaja en tus debilidades hasta que se conviertan en fortalezas</h1>
       <hr class="my-4" style="border: 0.4px solid ;">
       <button class="btn btn-dark btn-lg" data-toggle="modal" data-target="#staticBackdrop1">Realizar Consulta</button>
     </div>

        

     

    <!--Contenido Colapsado-->
    <div class="form-row">
     <div class="form-group col-md-8 " >
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link lead" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="height:80px">
                Consultas Pendientes
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <a href="#" >Empresa1</a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="height:80px; ">
                Consultas Terminadas
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <a href="#" >Empresa1</a>
            </div>
          </div>
        </div>
        <div class="card">

          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="height:80px">
                Otros
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
             <a href="#" >Empresa1</a><br>
             <a href="#" >Empresa2</a>
           </div>
         </div>
       </div>
     </div>
    </div>
    <div class="form-group col-md-3 " style="background-color:#E0E0E0; height:320px; margin-bottom:80px">
     <h6 class="lead">Preguntas Frecuentes</h6><hr>
     <div class="mx-5 col-3" >
      <ul>
        <li>AccionesAccionesAcciones AccionesAcciones Acciones</li>
        <li>Marketing</li>
        <li>Financiacion</li>
        <li>Acciones</li>
        <li>Marketing</li>
        <li>Financiacion</li>
        <li>Acciones</li>
        <li>Marketing</li>
        <li>Financiacion</li>
      </ul>
    </div>
    </div>
    </div>



    </div>

   <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content " style="background: rgba(38, 146, 163, 0.75)">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" id="staticBackdropLabel" style="color:white">Realizar Consulta</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="indexEmpresa_back.php" name="modal-form" method="post">

                <textarea id="textarea_consulta" name="textarea_consulta" class=" form-control" required style="min-width: 100%; min-height:200px ; max-height: 400px ;max-width:700px;" placeholder="Escriba su consulta"></textarea>
                <div class="form-row my-2">        

                 <label style="color:white"><strong>Tiempo respuesta:</strong></label>

                 <div class="form-group col-md-8">
                   <select name="selectProv" required class="form-control forma" >
                    <option selected>30 dias</option>
                    <option>15 dias</option>
                     <option>7 dias</option>
                     <option>3 dias</option>
                  </select>
                  <h9 class="msg" id="msjValidacionContacto"></h9>
                </div>
        </div>

              <div class="form-row my-2">
               <div class="form-group col-md-6">
                 <input type="text" name="nomCons" id="nomCons" maxlength="40" placeholder="Nombre Contacto" class=" form-control" onChange="validarContacto()" required>
                 <h9 class="msg" id="msjValidacionContacto"></h9>
               </div>        
               <div class="form-group col-md-6">
                <input type="tel"  name="telCons" id="telCons" maxlength="12" placeholder="Telefono" class="form-control" onChange="validarTelefono()" required>
                <h9 class="msg" id="msjValidacionTelefono"></h9>
              </div>


            </div>
            <div class="form-row my-2">        
             <div class="form-group col-md-9">
              <input type="tel"  name="telCons" id="telCons" maxlength="12" placeholder="Email" class="form-control" onChange="validarTelefono()" required>
              <h9 class="msg" id="msjValidacionTelefono"></h9>
            </div>

            <div class="form-group col-md-3">
            <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseConsulta" role="button" aria-expanded="false" aria-controls="collapseExample">
    +</a>
           </div>
         </div>
          <!--Informacion contacto colapsada-->
           <div class="collapse" id="collapseConsulta">
           <div class="form-row my-2">
               <div class="form-group col-md-6">
                 <input type="text" name="nomCons" id="nomCons" maxlength="40" placeholder="Nombre Contacto" class=" form-control" onChange="validarContacto()" required>
                 <h9 class="msg" id="msjValidacionContacto"></h9>
               </div>        
               <div class="form-group col-md-6">
                <input type="tel"  name="telCons" id="telCons" maxlength="12" placeholder="Telefono" class="form-control" onChange="validarTelefono()" required>
                <h9 class="msg" id="msjValidacionTelefono"></h9>
              </div>
              <div class="form-row my-2">        
             <div class="form-group col-md-9">
              <input type="tel"  name="telCons" id="telCons" maxlength="12" placeholder="Email" class="form-control" onChange="validarTelefono()" required>
              <h9 class="msg" id="msjValidacionTelefono"></h9>
            </div>

            <div class="form-group col-md-3">
            <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseConsulta" role="button" aria-expanded="false" aria-controls="collapseExample">
    +</a>
           </div>
         </div>
        
          </div>
          </div>
          <!---->
       

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-dark mx-auto" data-dismiss="modal" > Cancelar </button>
         <button id="buttonEnviar" type="submit" class="btn btn-dark mx-auto" >ENVIAR</button>

       </div>

     </div>
    </div>
    </div>
     </div>
    </body>


    <?php
    include "footer.html"

    ?>
</html>