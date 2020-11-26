


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
 
    <i class="fa fa-user fa-5x" alt="imagen-usuario"></i>
    <h1 class="font-weight-normal">Inicio de sesión</h1>

    <form action="login_back.php" method="post" class="form-group m-4">
    <input type="email" name="email" class="form-control m-2" placeholder="Correo electrónico" required autofocus>
    <input type="password" name="contrasenia" class="form-control m-2" placeholder="Contraseña" required>
  
    <div>
      <input type="checkbox">
      <label class="my-2">Recordar</label>
    </div>
    <input type="submit" value="Ingresar" id="inicio" class="btn btn-primary btn-block m-auto" style="width:6rem; font-size: large;">
      </form>
     <a class="btn btn-link my-2" href="restablecer-contrasenia.php">Olvidé mi contraseña</a>
      <a href="#" class="btn btn-link my-2" data-toggle="modal" data-target="#staticBackdrop1">REGISTRARME</a>
    </div>


  </div>
 
    

 
<!-- Modal importar nomina completa de usuarios -->
<div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header ">
                <h3 class="modal-title " id="staticBackdropLabel">Importar lista</h3>
            </div>
            
           
             <form method="POST" id="importPlanilla" name="importPlanilla" action="importMasivousuarioS.php" enctype="multipart/form-data" role="form">
            
            <div class="modal-body" 

               
                
                <div>
                    <h9>La extension para la lista debe ser .xlsx y los campos deben estar ordenados como se muestra a continuación: </h9>

                    <table class="table table-bordered text-center table-info">
                       
                    </table>

                </div>

                
                    <div class="container" style="margin-top:50px;">

                        <div class="custom-file">
                            <input type="file" class="form-control-file" name="inpGetFile" id="inpGetFile" accept=".xlsx" onchange="comprobarLista()" lang="es" required>

                        </div>
                    </div>
                
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="btnImportar" type="submit" class="btn btn-primary " disabled <?php if($dni == null){echo "style='display:none' ";} ?>>Importar</button>
                    </div>

                </form>
            

        </div>
    </div>
 

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>