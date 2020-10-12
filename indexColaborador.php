
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


 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <style >

 body{
  background-image: url("imagenes/Sin título.png");
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

?>

  <body >
      <div class="container text-center mx-auto" style="width: 100%; margin-top:80px">
       <div class="jumbotron " style="background: rgba(38, 146, 163, 0.55)">

        <h1 style="color:white" class="display-5">Bienvenido Colaborador!</h1>
        <h5 style="color:white;font-size:28px;" class="lead">Mantente al día con tus consultas</h5>
        <hr class="my-4" style="border: 0.4px solid ;">

      </div>




      <!--Contenido Colapsado-->
      <div class="form-group">
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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


    </div>




    </body>

    <?php
    include "footer.html";

    ?>
</html>