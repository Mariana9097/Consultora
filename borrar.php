


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
        

        <style >
        .modal-body{
           background-image: url("imagenes/login.png");
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

    if(isset($_SESSION['resultado2'])):?>
    <div id="usuario-logueado" class="bloque">
      <h3><?=$_SESSION['resultado2']['nombre'];?></h3>
    </div>

  <?php       endif; ?>
  <body>
   
<div class="container text-center" style="width:20rem; margin-top:80px">
 
     <a class="btn btn-link my-2" href="restablecer-contrasenia.php">Olvidé mi contraseña</a>
     <a href="#" class="btn btn-link my-2" data-toggle="modal" data-target="#staticBackdrop">REGISTRARME</a>

  </div>
 
    

 
 
 
 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"  style="margin-top:130px ;">
    <div class="modal-dialog text-center" >
        <div class="modal-content"  >
               
            <div class="modal-body" >
             
               <h5 class="modal-title my-2" id="staticBackdropLabel" style="color:white"> Registrame como</h5>
               
         
                    <a href="registrarEmpresa.php" class="btn btn-outline-light btn-lg  my-4"  style="width:45%; height:70px "><strong>Empresa</strong></a>
          
                    <a href="curriculum.php" class="btn btn-outline-light btn-lg my-4 " style="width:45%; height:70px;"><strong>Colaborador</strong></a>
       
             <br><br><br>
             <div class="text-right ">
               <button type="button" class="btn btn-outline-secondary my-1" data-dismiss="modal" id="btnCerrar" >Cerrar</button>
            </div>
          </div>
           </div>
    </div>
</div>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>