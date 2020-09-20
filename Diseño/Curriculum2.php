<!DOCTYPE HTML>
<html>
    <head>
      <title>Consultoria Administrativa</title>
        <meta charset="UTF-8">
        <html lang="es">
        <meta name="viewport" context="width=device-width", user-scalable=no, initial_scale=1, maximum-scale=1, minimum-scalable=1>
        <link rel="stylesheet"  href="css/estilos.css" type="text/css">
        <link rel="stylesheet"  href="css/curriculum.css" type="text/css">
    
     
        <link type="text/css" rel="stylesheet" href="css/tail.select.css" />
        
       
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    </head>
   
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
       <h3 class="icon-rebel" style="color:white; font-family: 'FontAwesome', sans-serif;  font-size: 28px;">Consultoria Administrativa </h3>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
         <li><a href="#" >Inicio</a></li>
      <li><a href="#" class="glyphicon glyphicon-log-in"> Acceder</a></li>
    </ul>
  </div>
  </div>
</nav>

     
       
                <section class="contenedor">
            <form action="" name="formsolicitud">
                <br>
                <h2>Registrarme como Colaborador</h2><br>

                
                    <label>Datos Personales</label>
                    <hr>
                     
                     <div class="form-row ">
                      <div class="form-group col-md-6 ">
                        <input type="text"  id="email"  class="form-control"  name="email" maxlength="47" placeholder= "Email" required > 
                      </div>
                      <div class="form-group col-md-6">
                      <input type="password" id="pass"  class="form-control"  name="pass" placeholder="Contraseña"  required>
                      </div>
                    </div>


                    <div class="form-row">    
                      <div class="form-group col-md-6">
                        <input type="text" name="nombre" id="nombre"  class="form-control"  maxlength="40" placeholder="Nombre" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" name="apellido" id="apellido"  class="form-control"  maxlength="47" placeholder="Apellido" required>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                         <input type="text" name="telefono"  id="telefono" class="form-control" maxlength="4"  placeholder="(Código de área)" pattern="[0-9]{1-4}">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="tel" name="telColab" id="telColab"   class="form-control" maxlength="9" placeholder="Telefono" pattern="[0-9]{1-9}" required><br>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                     <select name="selectProv"  class="form-control" onchange="cambia()" >
                          <option disabled selected >Seleccionar Provincia</option>
                          <option value="1">Bs. As.</option>
                          <option value="2">Catamarca</option>
                          <option value="Chaco">Chaco</option>
                          <option value="Chubut">Chubut</option>
                          <option value="Cordoba">Cordoba</option>
                          <option value="Corrientes">Corrientes</option>
                          <option value="Entre Rios">Entre Rios</option>
                          <option value="Formosa">Formosa</option>
                          <option value="Jujuy">Jujuy</option>
                          <option value="La Pampa">La Pampa</option>
                          <option value="La Rioja">La Rioja</option>
                          <option value="Mendoza">Mendoza</option>
                          <option value="Misiones">Misiones</option>
                          <option value="Neuquen">Neuquen</option>
                          <option value="Rio Negro">Rio Negro</option>
                          <option value="Salta">Salta</option>
                          <option value="San Juan">San Juan</option>
                          <option value="San Luis">San Luis</option>
                          <option value="Santa Cruz">Santa Cruz</option>
                          <option value="Santa Fe">Santa Fe</option>
                          <option value="Sgo. del Estero">Sgo. del Estero</option>
                          <option value="Tierra del Fuego">Tierra del Fuego</option>
                         <option value="Tucuman">Tucuman</option>
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
                       
                    <select id="idioma" name="idioma" class="form-control" >
                      <option disabled selected>Seleccionar Idioma</option>
                      <option value="1">Español</option>
                      <option value="2">Ingles</option>
                      <option value="3">Italiano</option>
                      <option value="4">Portugues</option>
                      <option value="5">Frances</option>
                      <option value="6">Chino</option>
                      <option value="7">Aleman</option>
                      <option value="8">Koreano</option>

                    </select>

                    </div>
                    <div class="col-md-3 control-label">
                        <select id="nivel" name="nivel"  class="form-control">
                   <option disabled selected>Nivel</option>
                      <option value="1">Basico</option>
                      <option value="2">Intermedio</option>
                      <option value="3">Avanzado</option>
                      <option value="4">Nativo</option>
                    </select>
                    </div>
                  

                        <div class="col-md-1 ">

                            <a class="add-type pull-right col-md-1" href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign" ></i></a>

                        
                    </div>
                </div>
            </div>

  </div>
            <div id="type-containe" class="hide">
                <div class="row form-group type-row text-center" id="">
                    
                  
                    <div class="form-group col-md-4">
                       
                    <select id="idioma" name="idioma"  class="form-control" >
                      <option disabled selected>Seleccionar Idioma</option>
                      <option value="1">Español</option>
                      <option value="2">Ingles</option>
                      <option value="3">Italiano</option>
                      <option value="4">Portugues</option>
                      <option value="5">Frances</option>

                   <option value="6">Chino</option>
                      <option value="7">Aleman</option>
                      <option value="8">Koreano</option>

                    </select>

                    </div>
                    <div class="col-md-3 control-label" name="nivel" id="nivel">
                         <select id="nivel"  class="form-control" >
                   <option disabled selected>Nivel</option>
                      <option value="1">Basico</option>
                      <option value="2">Intermedio</option>
                      <option value="3">Avanzado</option>
                      <option value="4">Nativo</option>
                    </select>
                    </div>
                  
                        <div class="col-md-1">
                          
   
                          <a class="remove-type pull-right col-md-1" targetDiv="" data-id="0" href="javascript: void(0)"><i class="glyphicon glyphicon-remove"></i></a></div>
                    </div>
                </div>
            </div>
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

              <hr>
                  
                      <div id="type_container1">
                        
                <div class="row form-group type-row " id="edit-0">
                    
                    <div class="col-md-4 form-group control-label">
                       
                    <select class="selecest form-control " name="est" id="est" >
                      <option disabled selected >Seleccionar Estudios</option>
                      <option>Tecnicatura en Administracion de Empresas/Publica</option>
                      <option>Licenciatura en Administracion de Empresas/Publica</option>
                      <option>Licenciatura en Ciencias Eonomicas</option>
                      <option>Contabilidad</option>
                      <option>Licenciatura en Recursos Humanos</option>
                      <option>Licenciatura en Negocios Internacionales</option>
                      <option>Licenciatura en Marketing/Mercadotecnia</option>
                    </select>
                     </div>

                    <div class="col-md-3 control-label">
                       <select name="egreso" id="egreso"  class="form-control" >
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

                            <a class="add-est pull-right col-md-1" href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign" ></i></a>

                        
                    </div>
                </div>
            </div>

  </div>
            <div id="type-container1" class="hide">
                <div class="row form-group type-row  text-center" id="">
                    
                  
                    <div class=" form-group col-md-4">
                       
                    <select class="selecest form-control" name="est" id="est" >
                      <option disabled selected >Seleccionar Estudios</option>
                      <option>Tecnicatura en Administracion de Empresas/Publica</option>
                      <option>Licenciatura en Administracion de Empresas/Publica</option>
                      <option>Licenciatura en Ciencias Eonomicas</option>
                      <option>Contabilidad</option>
                      <option>Licenciatura en Recursos Humanos</option>
                      <option>Licenciatura en Negocios Internacionales</option>
                      <option>Licenciatura en Marketing/Mercadotecnia</option>
                    </select>
                     </div>
                    <div class="col-md-3 control-label" name="nivel" id="nivel">
                        <select name="egreso" id="egreso"  class="form-control" >
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
                          
   
                          <a class="remove-est pull-right col-md-1" targetDiv="" data-id="0" href="javascript: void(0)"><i class="glyphicon glyphicon-remove"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <script>

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
                       
                    <input id="curso" name="curso"  placeholder="Curso Realizado"  class="form-control">

                    </select>

                    </div>
                    <div class="col-md-2 form-group">
                        <select name="cursoegreso" id="cursoegreso"  class="form-control" >
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
                       <input type="number" id="cant" name="cant"  class="form-control" >
                     </div>
                    <div class="col-md-4 control-label">
                        <select name="duracioncant" id="duracion"  class="form-control" >
                    <option selected> horas</option>
                      <option>dias</option>
                      <option>meses</option>
                      <option>años</option>
                  </select>
                    </div>

                  

                        <div class="col-md-1 ">

                            <a class="add-curso pull-right" href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign " ></i></a>

                        
                    </div>
                    </div>
                </div>
            </div>

  </div>
            <div id="type-container2" class="hide text-center">
                <div class="row form-group type-row mx-5 text-center" id="">
                    
                  
                    <div class="col-md-4 form-group">
                       
                     <input id="curso" name="curso"  placeholder="Curso Realizado"  class="form-control">

                    </div>
                    <div class="col-md-2 control-label form-group" >
                         <select name="cursoegreso" id="cursoegreso"  class="form-control" >
                    <option disabled selected >Realizado en</option>
                      <?php     
                            $anio_menor = date('Y') - 50;
                            $anio_actual= date('Y');
                            
                    for ($v = $anio_menor; $v < $anio_actual; ++$v) { 
                        $valores = ++$anio_menor;
                        $opcion = "Realizado " . "$valores";
                        
                            echo "<option value=\"$valores\">$opcion</option>";
                            
                        $array_valores[$v] = $valores;            // Creamos array con los años
                        $array_opcion[$v] = $opcion;            // Creamos array con las opciones

} 
                    ?>
                    </select>
                    </div>
                  <div class="col-md-6">
                    <div class="col-md-3 control-label form-group">
                       <input type=number id="cant" name="cant"   class="form-control">
                     </div>
                    <div class="col-md-4 control-label form-group">
                        <select name="duracioncant" id="duracion"   class="form-control">
                    <option selected> horas</option>
                      <option>dias</option>
                      <option>meses</option>
                      <option>años</option>
                  </select>
                    </div>
                  
                        <div class="col-md-1 ">
                          
    
                          <a class="remove-curso pull-right col-md-1 " targetDiv="" data-id="0" href="javascript: void(0)"><i class="glyphicon glyphicon-remove"></i></a></div>
                    </div>
                </div>
                </div>
            </div>
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


  

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                   
                    
                         
                         
                       <div class="form-row ">
                         <hr>
                    <div class="col-md-6 form-group">

                  <select class="selectpicker form-control" id="habilidad" multiple  >
                    <option disabled selected > </option>
                       <option value="1">Buena comunicación</option>
                        <option value="1">Buena organización</option>
                        <option value="1">Trabajo en equipo</option>
                        <option value="1">Puntualidad</option>
                        <option value="1">Pensamiento crítico</option>
                        <option value="1">Sociable</option>
                        <option value="1">Creativo</option>
                        <option value="1">Facilidad de comunicación</option>
                        <option value="1">Facilidad de adaptación</option>
                        <option value="1">Personalidad amigable</option>
                    </select>
                      
                   </div>
                   <div class=" form-group col-md-6">
                      
                            <textarea class="control-label form-control "name="conoc" placeholder="Conocimientos" required></textarea>
                           
                         </div>

                 </div>
                  
                    <br>
                    <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Agregar perfil Linked (Opcional)</label>
                     <input type="url" name="linked" id="linked" placeholder="URL" class="form-control"><br>
                   </div>
                 
                      <div class="form-group col-md-6">
                        <label>Subir CV (Opcional)</label>
                        <input type="file" name= "file-input" class="file-input form-control" id="file-input" accept="application/pdf">
                      </div>
                    </div>
                    
             <div class="text-center">
              <br>
    <input type="submit" value="Enviar" id="boton" class="btn btn-lg btn-success">
</div>
                   
                  
                
            </form>
          </div>
        </section>
      <footer style="background-color:teal">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
    
  </div>
</footer>
      </body>
      </html>