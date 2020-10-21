<!DOCTYPE HTML>
<html>
    <head>
    	<title>Consultoria Administrativa</title>
        <meta charset="UTF-8">
        <html lang="es">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <link rel="stylesheet" href="../CSS/fontello.css">
        <link rel="stylesheet"  href="../CSS/curriculum.css" type="text/css">
         
      <script type="text/javascript" src="validacionEmp.js"></script>  

 <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



    </head>
     <style >
   .form-control{
       height: 40px;
   }
  
   input[type=checkbox]{
  /* Doble-tamaño Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari y Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;
}

   </style>
   
<body>
 <nav class="navbar navbar-default navbar-static-top navbar-fixed-top " role="navigation" style=" background: #2692A3; ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" 
            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <h6  style="color:white; font-family: 'FontAwesome', sans-serif; font-size: 30px;"><img src="imagenes/lo.png"  id="logo" oncontextmenu="return false" style="height:25px">Consultoria </h6>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

     <ul class="nav navbar-nav navbar-right">
        <li><a href="principal.php" style="color:white">Inicio</a></li>
         <li><a href="login.php" style="color:white">Volver</a></li>
      <!--li><a href="#" class="glyphicon glyphicon-log-in"> Acceder</a></li-->
    </ul>
  </div>
  </div>
</nav>



                <div class="container contenedor " style="margin-top:80px">
                     <h2>Registrar Empresa</h2>
           <form  method="post" class="mt-4 " action="regempresa_back.php" name="formsolicitud">

                    <hr><br>

                    <div class="form-group row">
                      <div class="form-group col-sm-6" >
                   <input type="text" id="email" name="email" maxlength="47" placeholder= "Email" class="widthinput form-control" autofocus="autofocus" required > 
                 </div>
                   <div class="form-group col-sm-6">
                      <input type="password" id="pass" name="pass" placeholder="Contraseña"  class="widthinput form-control" onchange="validarPass()" required>
                      <h9 class="msg" id="msjValidacionPass"></h9>
                   </div>
                   </div>
                     
                     


                    <div class="form-group row">
                      <div class="form-group col-sm-6">
                    <input type="text" name="nombFant" id="nombFant" maxlength="47" placeholder="Nombre de Fantasia" class="widthinput form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                    <input type="text" name="razon" id="razon" maxlength="47" placeholder="Razon Social"  class="widthinput form-control" required>
                     </div>
                     </div>


                    <div class="form-group row">
                      <div class="form-group col-sm-6">
                   <input type="text" name="cuit"  id="cuit" placeholder="Numero de CUIT" class="widthinput form-control" onchange="validarCuit()" required>
                    <h9 class="msg" id="msjValidacionCuit"></h9>
                   </div>
                     <div class="form-group col-sm-6">
                    <select name="selectProv" class="widthinput form-control" required >
                     <option disabled selected >Seleccionar Provincia</option>
                      <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `provincia`");
                                

                                  while ($provincias = $consultaD->fetch_assoc()) {
                                      $provincia['nombreProvincia'] = utf8_encode($provincias['nombreProvincia']);

                                      echo "<option value='".$provincias['id']."'>".$provincia['nombreProvincia']."</option>";

                                  }
                        
                            ?>
                               </select>
                     </div>
                     </div>

                    <div class="form-group row">
                       
                           <div class="form-group col-sm-6">
                             <input type="tel"  id="telColab"  name="telemp" maxlength="9" placeholder="Telefono con Codigo de Area" class="widthinput form-control"  onchange="validarTel()" required>
                             <h9 class="msg" id="msjValidacionTel"></h9>
                             
                           </div>
                        
                      <div class="form-group col-sm-6">
                         <input type="text" id="nombre" name="nomcontac" maxlength="40" placeholder="Nombre Contacto" class="widthinput form-control" onchange="validarNombre()"  required>
                         <h9 class="msg" id="msjValidacionNombre"></h9>
                      </div>
                    </div>

                     <div class="form-group row">
                     <div class="form-group col-sm-6">
                     <input type="text" name="actividad" id="actividad" maxlength="47" placeholder="Actividad Desarrollada" class="widthinput form-control" required>
                   </div>
                     <div class="form-group col-sm-6">
                     <input type="text" name="empleados" id="empleados" maxlength="47" placeholder="Cantidad de Empleados" class="widthinput form-control" onchange="validarNumero()" required>
                     <h9 class="msg" id="msjValidacionEmpleados"></h9>
                     </div>
                   </div>
                  <div class="form-group row">
                    <div class="form-group col-sm-12 text-center">
        <input type="checkbox"  name="DG_terms" value="No" id="prv_ck" required> 

       <label style="margin-left:10px">Acepto las <a style="color:blue" href="">Condiciones de  Uso</a> y <a style="color:blue" href="">Politicas de Privacidad</a></label>
        </div>
                   </div>
                        <input type="submit" value="Registrarse" id="boton" class="btn btn-lg btn-primary" style="background-color:#2874A6 "  > 
                      <br>
            </form>
            
          </div>
      

<?php
        include "footerB3.html"
     ?>
</html>
