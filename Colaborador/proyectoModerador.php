<html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <!-- at the end of the `head` -->


<!-- at the end of the `body` -->
<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
<script>
  docsearch({
    apiKey: 'null',
    indexName: 'orator',
    inputSelector: '#search', // CSS selector to target the <input />
    debug: false, // Set to `true` if you want to inspect the dropdown
  });
</script>
 </head>
 <style >
  .tabContainer{
    width:100%;
    height:800px;
  }
   @media (max-width:850px) {
     .tabContainer{
        height:1000px;
        margin-bottom: 90px;
      
     }
  }
   @media (min-width:950px) {
    .tabPanel{
       text-align: center;
    }
  }
  .tabContainer .buttonContainer{
    height: 10%;


  }
  .tabContainer .buttonContainer button{
    width: 30%;
    height: 100% ;
    float: left;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
  }
   .tabContainer .buttonContainer button:hover{
     background-color: #d7d4d4;
     
  
   }
   .tabContainer .tabPanel{
    height: 100%;
    display:none;
    background: linear-gradient(to bottom, #AED6F1,#2874A6);
    padding-top: 105px;
    box-sizing: border-box;

   }
   .container{
    margin-bottom: 100px;

   }
  #label_general{
    font-size: 18px;
  }

    

/* Botoes */
input[type=button] {
        width: 200px;
        height: 30px;
        padding-left: auto;
        padding-right: auto;
        text-align: center;
        font-size: 18px;
}

.dropdown {
  margin: 20px;
}

.dropdown-menu {
  max-height: 20rem;
  overflow-y: auto;
}
.contform{
  text-align: center;
  justify-content: center;
 
  
}
 </style>
 <?php
	include "../cabeceraLogin.html";
  include "../conexionBD.php";

?>
 <body style="background: linear-gradient(to bottom, #FAFAFA, #AED6F1);" >

 	<a href="proyectos.php" class="btn btn-info my-2 mx-2">Volver</a>
 	<div class="container" >
 	    
  
  <div class="tabContainer">
    <div class="buttonContainer">
     
      <button onclick="showPanel(0,'#AED6F1')">TAREAS</button>
      <button style="border-top-right-radius: 20px;" onclick="showPanel(1,'#AED6F1')">SEGUIMIENTO</button>
    </div>

    <div class="tabPanel" >
      <div class="contenedorPanel" style="margin-top:-80px">
        
        <div id="listas" class="mx-5">
          <?php

          $consulta= $con->query("SELECT * FROM `colabproy` WHERE `proyecto_id` =  1");
          
          while ($colaboradores = $consulta->fetch_assoc()) {

            $colab=$colaboradores['colaborador_id'];
            
             $consulta1= $con->query("SELECT * FROM `colaborador` WHERE `id` = $colab");
             echo "<div class='row my-3' style='background-color:#85C1E9; padding: 15px'>
            <input readonly class='col-md-4 form-control' id='colab_proyecto' name='colab_proyecto' placeholder='Montenegro Silvia'/>
            <input readonly class='col-md-2 form-control' id='cargo' name='cargo' placeholder='$colab'>
            <a data-toggle='modal' data-target='#staticBackdrop3' class='remover_campo col-md-2'>CV</a>
             
            <button type ='submit' class='btn btn-info'  data-toggle='modal' data-target='#staticBackdrop' $colab style='margin-bottom:20px;font-weight: bold;'>+ Asignar tarea</button>
                    
   
            </div>";
           }?>
        </div>
      </div>
      </div>
      
    <div class="tabPanel">
        <div class="contenedorPanel" style="margin-top:-80px">
        
            <div class="table-responsive">
        <table class="table table-secondary table-hover table-bordered text-center" style="background:#B2EBF2">
        
          <?php
            $con = new mysqli("localhost","root","","consultora");
            setlocale(LC_ALL, 'Spanish'); //Formato de fechas en español strftime("%A %d %B %Y %H:%M:%S", strtotime(fecha));
            $tareas = $con->query("SELECT * FROM tareas WHERE proyecto_id = 1 ORDER BY (fechaInicioTarea) DESC");
        
            if (($tareas->num_rows) > 0) {

                echo "<thead>
                            <tr>
                                <th>Tarea</th>
                                <th>Descripción</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Encargado</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id= 'Publicaciones'>";
                while ($resultado = $tareas->fetch_assoc()) {
                    $encargado = $con->query("SELECT * FROM colaborador WHERE id='" . $resultado['colaborador_id'] . "'")->fetch_assoc();
                     $tarea= $resultado['descripcion'];
                   date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $actual = date('Y-m-d');
                    $date1= new DateTime($actual);
                    $datetime1 = new DateTime($resultado['fechaInicioTarea']);
                    $datetime2 = new DateTime($resultado['fechaFinTarea']);
                    $interval = $date1 ->diff($datetime2);
                    $boton='light';
                    $fechaInicioFormateada = strftime("%d de %B ", strtotime($resultado['fechaInicioTarea']));
                    $fechaFinFormateada = strftime("%d de %B ", strtotime($resultado['fechaFinTarea']));
                    if($resultado['finalizada']==1){
                      $result='Finalizada'; 
                    }else{
                      $diferencia= $interval->format('%R%a');
                      if($diferencia<0){
                        $result='Retrasada'; 
                        $result1='En  ';
                        $boton= 'dark';
                      }
                      else{
                        $result='Pendiente';
                        $result1='Faltan ';
                        $diferenciat = $datetime1 ->diff($datetime2);
                        $diferenciatotal = $diferenciat->format('%a');

                        switch ($diferenciatotal) {
                          case ($diferencia > $diferenciatotal*0.70):
                            $boton= 'success';
                            break;
                          
                          case ($diferencia > $diferenciatotal*0.40):
                            $boton= 'warning';
                            
                            break;

                          default:
                            $boton= 'danger';
                            break;
                        }
        

                      }
                         
                    }
                      ?>
                   <tr>
                        <td><a><?php echo  $resultado['nombreTarea'] ?></a></td>
                        <td><a class='btn btn-light' data-toggle='modal' data-target='#staticBackdrop2' id="<?php echo $resultado['descripcion'];?>"  style='background-color:#DCDCDC'>Ver</a></td>
                        <?php echo " <td>" . $fechaInicioFormateada . "</td>
                        <td>" . $fechaFinFormateada . "</td>
                        <td><img style='width:50px;height:50px;border-radius:155px; border:1px solid #666;' src='../imagenes/ejemplo.jpg'>  " . $encargado['apellido'] . ", " . $encargado['nombre'] . "</td> 
                        <td>".$result. "<br>";
                        if($result!='Finalizada'){
                          echo"<button class=' btn btn-$boton'>".$result1."".$interval->format('%a días')."</button></td>";
                       }
                        echo "</tr>";
                }
            } 
        
            echo "</tbody>";
          
          ?>
        
        </table>
    </div>
      </div>


    </div>
      
   
  </div>
</div>

</div>

  <!-- Modal tarea nueva-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"  style="margin-top:130px ; ">
    <div class="modal-dialog modal-xl text-center" >
        <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);"  >
               
            <div class="modal-body" >
              <form  method="post" class="mt-4 " action="crearTarea_back.php" name="formtarea">
               <h5 class="modal-title my-2" id="staticBackdropLabel" style="color:white"> Nueva tarea</h5>
               <div class="row">
                <div class="col-md-6">
                   Nombre de la tarea<input type="text" name="nombreTarea" class="form-control"></input>
                </div>
                <div class="col-md-6">
                  Encargado de realizarla<input readonly class="form-control"></input>
                </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                  Fecha de comienzo<input type="date" name="comienzoTarea" class="form-control"></input>
                </div>
                <div class="col-md-6">
                  Fecha de finalización<input type="date" name="finTarea" class="form-control"></input>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                 Descripción de la tarea<textarea name="descripcionTarea" class="form-control"></textarea>
                </div>
               </div> 
                <input hidden name="encargado" value="<?php $colab?>">
                <div class="col-md-12 text-center" >
                 <button type="submit" class="btn btn-primary  my-4 mx-2" style="background-color:#2874A6; ">Guardar</button>            
                 <button type="button" class="btn btn-outline-secondary my-4 mx-5" data-dismiss="modal" id="btnCerrar" >Cerrar</button>
          
             </div>
          </div>
           </div>
           </div>
    </div>

<!-- Modal ver CV-->
<div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);" >
      <div class="modal-header" >
        <h5 class="modal-title" id="staticBackdropLabel">Silvia Montenegro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" style="background:#FAFAFA;">
      <h5>Estudios</h5>
      <p>...</p>
      <hr class="white">
      <h5>Cursos</h5>
      <p>...</p>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ver descripción de tarea-->
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);" >
     <div class="modal-body" style="background:#E3E4E5;">
      <h6>Detalles:</h6>
      <p><?php echo id ?></p>
      
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
 </body>
 <script>
  var tabButtons=document.querySelectorAll(".tabContainer .buttonContainer button");
   var tabPanels=document.querySelectorAll(".tabContainer .tabPanel");

   function showPanel(panelIndex,colorCode){
    tabButtons.forEach(function(node){
      node.style.backgroundColor="";
      node.style.color="";


    });
      tabButtons[panelIndex].style.backgroundColor=colorCode; 
      tabButtons[panelIndex].style.color="black";
      tabPanels.forEach(function(node){
      node.style.display="none";

    });
      tabPanels[panelIndex].style.display="block";
      tabPanels[panelIndex].style.backgroundColor=colorCode;
   }

   showPanel(0,'#AED6F1');



   
</script>


 <?php
        include "../footer.html"

     ?>
</html>