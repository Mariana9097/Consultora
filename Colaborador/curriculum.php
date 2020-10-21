<!DOCTYPE HTML>
<html>
    <head>
      <title>Consultoria Administrativa</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <html lang="es">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="../CSS/curriculum.css" type="text/css">
        <link rel="stylesheet" href="CSS/fontello.css">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="validacionColab.js"></script>  


    </head>
   <style >
   .forma{
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
h5{
  font-size:24px;
}
h6{
  font-size:16px;
}
   </style>
    <body> 
    <nav class="navbar navbar-default navbar-static-top navbar-fixed-top " role="navigation" style=" background: #2692A3; ">
  <div class="container-fluid">
  
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


   
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="principal.php" style="color:white">Inicio</a></li>
         <li><a href="login.php" style="color:white">Volver</a></li>
      <!--li><a href="#" class="glyphicon glyphicon-log-in"> Acceder</a></li-->
    </ul>
  </div>
  </div>
</nav>


     
  <div class="container contenedor">
          <h1 >Registrarme como Colaborador</h1><br><br>
            <form  method="post" class="mt-4 " action="curriculum_back.php" name="formsolicitud">
               
                    <label>Datos Personales</label>
                    <hr>
                     
                     <div class="form-group row">
                <div class="col-sm-6 form-group">
                     <input type="email"  id="email"  class="form-control forma"  name="email" maxlength="47" placeholder="Email" autofocus="autofocus" required >

                </div>
                   <div class="col-sm-6 form-group">
                     <input type="password" id="pass"  class="form-control forma"  name="pass" placeholder="Contraseña"  onchange="validarPass()" required>
                     <h9 class="msg" id="msjValidacionPass"></h9>
            </div>
             </div>


                    <div class="form-group row">    
                    <div class="col-sm-6 form-group">
                        <input type="text" name="nombre" id="nombre"  class="form-control forma"  maxlength="40" placeholder="Nombre" onchange="validarNombre()" required>
                         <h9 class="msg" id="msjValidacionNombre"></h9>
                      </div>
                    <div class="col-sm-6 form-group">
                        <input type="text" name="apellido" id="apellido"  class="form-control forma"  maxlength="47" placeholder="Apellido" onchange="validarApellido()" required>
                        <h9 class="msg" id="msjValidacionApellido"></h9>
                      </div>
                    </div>


                    <div class="form-group row">
                 <div class="col-sm-6 form-group">
                          <input type="tel" name="telColab" id="telColab"   class="form-control forma" maxlength="12" placeholder="Telefono con Codigo de Area"  onchange="validarTel()" required>
                           <h9 class="msg" id="msjValidacionTel"></h9>
                      </div>
                   
                  <div class="col-sm-6 form-group">
                     <select name="selectProv" required class="form-control forma" >
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
                   
                    

 <!-- ------IDIOMA----------------------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
                        <div class="form-row">
                   <div class="col-md-12 control-label ">
               
                    
                    <br>
                      <label>Datos Profesionales</label> 
                
                      <hr>
                  
                </div></div>

            <div id="type_containe" >
                <div class="row form-group type-row " id="edit-0">
                    
                    <div class=" form-group col-md-4 control-label ">
                       
                    <select id="selectIdioma" name="selectIdioma[]" class="form-control forma" >
                      <option disabled selected>Seleccionar Idioma</option>
                       <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `idioma`");
                                

                                  while ($idiomas = $consultaD->fetch_assoc()) {
                                      $idioma['nombreIdioma'] = utf8_encode($idiomas['nombreIdioma']);

                                      echo "<option value='".$idiomas['id']."'>".$idioma['nombreIdioma']."</option>";

                                  }
                        
                            ?>

                    </select>

                    </div>
                    <div class="col-md-3 control-label">
                        <select id="selectNivel" name="selectNivel[]"  class="form-control forma">
                   <option disabled selected>Nivel</option>
                       <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `idiomanivel`");
                                

                                  while ($niveles = $consultaD->fetch_assoc()) {
                                      $nivel['nivel'] = utf8_encode($niveles['nivel']);

                                      echo "<option value='".$niveles['id']."'>".$nivel['nivel']."</option>";

                                  }
                        
                            ?>
                    </select>
                    </div>
                  

                        <div class="col-md-1 ">

                            <a class="add-type pull-right col-md-1" href="javascript: void(0)" tiitle="Click to add more" onclick="añadirIdioma()" style="color:#2962FF;">Agregar otro</a>

                        
                    </div>
                </div>

            </div>

  
            <div id="type-containe" class="hide">
                <div class="row form-group type-row text-center" id="">
                    
                  
                    <div class="form-group col-md-4">
                       
                    <select id="selectIdioma" name="selectIdioma[]"  class="form-control forma" >
                      <option disabled selected>Seleccionar Idioma</option>
                      <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `idioma`");
                                

                                  while ($idiomas = $consultaD->fetch_assoc()) {
                                      $idioma['nombreIdioma'] = utf8_encode($idiomas['nombreIdioma']);

                                      echo "<option value='".$idiomas['id']."'>".$idioma['nombreIdioma']."</option>";

                                  }
                        
                            ?>

                    </select>

                    </div>
                    <div class="col-md-3 control-label" name="nivel" id="nivel">
                         <select id="selectNivel" name="selectNivel[]" class="form-control forma" >
                   <option disabled selected>Nivel</option>
                       <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `idiomanivel`");
                                

                                  while ($niveles = $consultaD->fetch_assoc()) {
                                      $nivel['nivel'] = utf8_encode($niveles['nivel']);

                                      echo "<option value='".$niveles['id']."'>".$nivel['nivel']."</option>";

                                  }
                        
                            ?>
                    </select>
                    </div>
                  
                        <div class="col-md-1">
                          
   
                          <a class="remove-type pull-right col-md-1" targetDiv="" data-id="0" href="javascript: void(0)" style="color:#453b3b">Eliminar</a></div>
                    </div>
           
            
      
        <script>

        <!--Añadir dinamicamente-->

            jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-type').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-containe .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-type').attr('targetDiv', type_div);
                        element.appendTo('#type_containe');

                    }
                });

                jQuery(".remove-type").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            });
        </script>
    </div>

<!-- ----ESTUDIOS------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

         
                  
                      <div id="type_container1">
                         <hr>
                <div class="row form-group type-row " id="edit-0">
                    
                    <div class="col-md-4 form-group control-label">
                       
                    <select class="selecest form-control forma " name="selectEst[]" id="selectEst" >
                      <option disabled selected >Seleccionar Estudios</option>
                       <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `estudio");
                                

                                  while ($estudio = $consultaD->fetch_assoc()) {
                                      

                                      echo "<option value='".$estudio['id']."'>".utf8_encode($estudio['nombreEstudio'])."</option>";

                                  }
                        
                            ?>
                    </select>
                     </div>

                    <div class="col-md-3 control-label">
                       <select name="egreso[]" id="egreso"  class="form-control forma" >
                    <option disabled selected >Año de Egreso</option>
                      <?php     
                            $anio_menor = date('Y') - 50;
                            $anio_actual= date('Y');
                            
                    for ($v = $anio_menor; $v < $anio_actual; ++$v) { 
                        $valores = ++$anio_menor;
                        $opcion = "Egreso " . "$valores";
                        
                            echo "<option value=\"$valores\">$opcion</option>";
                            
                        $array_valores[$v] = $valores;            // Creamos array con los años
                        $array_opcion[$v] = $opcion;            // Creamos array con las opciones
                        
                        } 
                    ?>
                    </select>
                      </div>
                  

                        <div class="col-md-1 ">

                            <a class="add-est pull-right col-md-1" href="javascript: void(0)" tiitle="Click to add more"  onclick="añadirEstudio()" style="color:#2962FF;">Agregar otro</a>

                        
                    </div>
                </div>
            </div>

        
            <div id="type-container1" class="hide">
                <div class="row form-group type-row  text-center" id="">
                    
                  
                    <div class=" form-group col-md-4">
                       
                    <select class="selecest form-control forma" name="selectEst[]" id="selectEst" >
                      <option disabled selected >Seleccionar Estudios</option>
                     <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `estudio");
                                

                                  while ($estudio = $consultaD->fetch_assoc()) {
                                      

                                      echo "<option  value='".$estudio['id']."'>".utf8_encode($estudio['nombreEstudio'])."</option>";

                                  }
                        
                            ?>
                    </select>
                     </div>
                    <div class="col-md-3 control-label" name="nivel" id="nivel">
                        <select name="egreso[]" id="egreso"  class="form-control forma" >
                    <option disabled selected >Año de Egreso</option>
                      <?php     
                            $anio_menor = date('Y') - 50;
                            $anio_actual= date('Y');
                            
                    for ($v = $anio_menor; $v < $anio_actual; ++$v) { 
                        $valores = ++$anio_menor;
                        $opcion = "Egreso " . "$valores";
                        
                            echo "<option value=\"$valores\">$opcion</option>";
                            
                        $array_valores[$v] = $valores;            // Creamos array con los años
                        $array_opcion[$v] = $opcion;            // Creamos array con las opciones
                        
                        } 
                    ?>
                    </select>
                      </div>
                  
                        <div class="col-md-1">
                          
   
                          <a class="remove-est pull-right col-md-1" targetDiv="" data-id="0" href="javascript: void(0)" style="color:#453b3b">Eliminar</a></div>
                    </div>


              
       <script >

         <!--Añadir dinamicamente-->

            jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-est').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-container1 .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-est').attr('targetDiv', type_div);
                        element.appendTo('#type_container1');

                    }
                });

                jQuery(".remove-est").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            });

           
        </script>
    </div>

  <!--CURSO ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    <div id="type_container2">
       <hr>
          <div class="row form-group type-row  text-center" id="edit-0">
                    
                    <div class="col-md-4  form-group">
                       
                    <input type="text" id="curso" name="curso[]"  placeholder="Curso Realizado"  class="form-control forma" >

                    </div>
                    <div class="col-md-2 form-group">
                        <select name="cursoegreso[]" id="cursoegreso"  class="form-control forma" >
                    <option disabled selected >Realizado en</option>
                      <?php     
                            $anio_menor = date('Y') - 50;
                            $anio_actual= date('Y');
                            
                    for ($v = $anio_menor; $v < $anio_actual; ++$v) { 
                        $valores = ++$anio_menor;
                        $opcion =  "$valores";
                        
                            echo "<option value=\"$valores\">$opcion</option>";
                            
                        $array_valores[$v] = $valores;            // Creamos array con los años
                        $array_opcion[$v] = $opcion;            // Creamos array con las opciones
                        
                        } 
                    ?>
                    </select>
                    </div>
                 <div class="col-md-6">

                    <div class="col-md-3 control-label form-group">
                       <input type="number" id="cant" name="cant[]" placeholder="Duracion" class="form-control forma" >
                     </div>
                    <div class="col-md-4 control-label">
                        <select name="tiempo[]" id="tiempo"  class="form-control forma" >
                  
                      <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `tiempo");
                                

                                  while ($anio = $consultaD->fetch_assoc()) {
                                      

                                      echo "<option selected value='".$anio['id']."'>".utf8_encode($anio['unidadTiempo'])."</option>";

                                  }
                        
                            ?>
                  </select>
                    </div>

                  

                        <div class="col-md-1 ">

                            <a class="add-curso pull-right col-md-1" href="javascript: void(0)" tiitle="Click to add more" onclick="añadirCurso()" style="color:#2962FF;">Agregar otro</a>

                        
                    </div>
                    </div>
                </div>
           
           </div>
            <div id="type-container2" class="hide text-center">
                <div class="row form-group type-row mx-5 text-center" id="">
                    
                  
                    <div class="col-md-4 form-group">
                       
                     <input type="text" id="curso" name="curso[]"  placeholder="Curso Realizado"  class="form-control forma">

                    </div>
                    <div class="col-md-2 control-label form-group" >
                         <select name="cursoegreso[]" id="cursoegreso"  class="form-control forma" > 
                    <option disabled selected >Realizado en</option>
                      <?php     
                            $anio_menor = date('Y') - 50;
                            $anio_actual= date('Y');
                            
                    for ($v = $anio_menor; $v < $anio_actual; ++$v) { 
                        $valores = ++$anio_menor;
                        $opcion = "$valores";
                        
                            echo "<option value=\"$valores\">$opcion</option>";
                            
                        $array_valores[$v] = $valores;            // Creamos array con los años
                        $array_opcion[$v] = $opcion;            // Creamos array con las opciones

} 
                    ?>
                    </select>
                    </div>
                  <div class="col-md-6">
                    <div class="col-md-3 control-label form-group">
                       <input type="number" id="cant" name="cant[]"  placeholder="Duracion" class="form-control forma">
                     </div>
                    <div class="col-md-4 control-label form-group">
                        <select name="tiempo[]" id="tiempo"   class="form-control forma">
                    <option selected> Seleccionar</option>
                         <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `tiempo");
                                

                                  while ($anio = $consultaD->fetch_assoc()) {
                                      

                                      echo "<option selected value='".$anio['id']."'>".utf8_encode($anio['unidadTiempo'])."</option>";

                                  }
                        
                            ?>
                  </select>
                    </div>
                  
                        <div class="col-md-1 ">
                          
    
                          <a class="remove-curso pull-right col-md-1 " targetDiv="" data-id="0" href="javascript: void(0)" style="color:#453b3b">Eliminar</a></div>
                  
        </div>
       <script>

        <!--Añadir dinamicamente-->

            jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-curso').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-container2 .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-curso').attr('targetDiv', type_div);
                        element.appendTo('#type_container2');

                    }
                });

                jQuery(".remove-curso").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            });
        </script>

    </div>

</div>
  

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                          <hr>
        <div class="form-row">
                       
            <div class="form-group col-sm-6">

                  <select class="selectpicker form-control "  id="habilidad" name="habilidad[]" multiple required>
                    <option disabled selected >Aptitudes</option>
                         <?php
                                  $con = new mysqli("localhost","root","","consultora");

                                  $consultaD = $con->query("SELECT * FROM `aptitud");
                                

                                  while ($aptitud = $consultaD->fetch_assoc()) {
                                      

                                      echo "<option value='".$aptitud['id']."'>".utf8_encode($aptitud['aptitud_nombre'])."</option>";

                                  }
                        
                            ?>
                    </select>
                      
                   </div>
                  <div class="col-sm-6">
                      
                            <textarea class="control-label form-control "name="conoc" placeholder="Conocimientos" style=" max-width:550px"></textarea>
                           
                         </div>

                 </div>
                  
                    <br>
                    <div class="form-row">
                     <div class="form-group col-sm-6">
                      <label>Agregar perfil Linked (Opcional)</label>
                     <input type="url" name="linked" id="linked" placeholder="URL" class="form-control"><br>
                   </div>
                 
                      <div class="form-group col-sm-6">
                        <label>Subir CV (Opcional)</label>
                        <input type="file" name= "fileInput" class="file-input form-control" id="fileInput" ><!--accept="application/pdf"-->
                      </div>
                    </div>
                    <div class="form-group row">
                    <div class="form-group col-sm-12 text-center">
        <input type="checkbox" name="DG_terms" value="No" id="prv_ck" required> 

       <label style="margin-left:10px">Acepto las <a style="color:blue" href="">Condiciones de  Uso</a> y <a style="color:blue" href="">Politicas de Privacidad</a></label>
        </div>
                   </div>
             <div class="text-center col-sm-12">
              <br>
               <input type="submit" value="Enviar" id="boton" class="btn btn-lg btn-primary" style="background-color:#2874A6; " > 
             </div>
                   
                  
                
            </form>
       
        </div>
  
     <?php
       include "footerB3.html"
     ?>

      </body>


      </html>