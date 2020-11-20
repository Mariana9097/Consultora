<html>
 <head>
 	<title>Consultora</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="../CSS/proyectoModerador.css">
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
    width: 32%;
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
    min-height: 100%;
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
#btnenviar{
  background-color:#2874A6;
  float: right;
  padding: 0px 50px; 
 
}
pre {
    white-space: pre-wrap;       /* css-3 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}
  

 </style>
 <?php
	include "../cabeceraLogin.html";
  include "../conexionBD.php";

?>
 <body style="background: linear-gradient(to bottom, #FAFAFA, #AED6F1); " >

 	<a href="proyectos.php" class="btn btn-info my-2 mx-2">Volver</a>
 	<div class="container" >
 	    
  
  <div class="tabContainer">
    <div class="buttonContainer">
     
      <button onclick="showPanel(0,'#AED6F1')" style="outline:none;">TAREAS</button>
      <button style="border-top-right-radius: 20px; outline:none;" onclick="showPanel(1,'#AED6F1')">SEGUIMIENTO</button>
    </div>


<!--SECCION TAREAS-->
    <div class="tabPanel" >
      <div class="contenedorPanel" style="margin-top:-80px;">
        
        <div id="listas" class="mx-5" >
          <?php

          $consulta= $con->query("SELECT * FROM `colabproy` WHERE `proyecto_id` =  1");
           
          while ($colaboradores = $consulta->fetch_assoc()) {
             $id_colab = $colaboradores['colaborador_id'];
             $cargo_colab = $colaboradores['cargo'];
             $consultacolab = $con->query("SELECT * FROM `colaborador` WHERE `id` = $id_colab");
             $resultadocolab =  $consultacolab->fetch_assoc();
             $nombre_colab = $resultadocolab['nombre'];
             $apellido_colab = $resultadocolab['apellido'];
             //$nombre_colab = $colaboradores['nombre'];
             //$apellido_colab = $colaboradores['apellido'];
        
             echo "<div class='row my-5' style='background-color:#85C1E9; padding: 15px; margin-bottom:50px'>
            <input readonly class='col-md-4 my-2 form-control' id='colab_proyecto' name='colab_proyecto' placeholder='$nombre_colab  $apellido_colab'>
            <input readonly class='col-md-2 my-2 form-control' id='cargo' name='cargo' placeholder='$cargo_colab'>
            <a data-toggle='modal' data-target='#staticBackdrop3' class='btn btn-outline-info col-md-1 mx-5 my-2' onclick='resultCV(" . $colaboradores['colaborador_id'] . ");' style='border:none; background-color:#85C1E9'>CV</a>
             
            <button type ='submit' class='col-md-3 my-2 btn btn-info'  data-toggle='modal' data-target='#staticBackdrop' onClick=result3('$nombre_colab','$apellido_colab','$id_colab') style='font-weight: bold;'>+ Asignar tarea</button>
                    
            <br><br>
            </div>";
           }?>
        </div>
      </div>
      </div>

<!--SECCION SEGUIMIENTO-->      
    <div class="tabPanel">
        <div class="contenedorPanel" style="margin-top:-80px;">
        <button type="button" class="btn btn-primary btn-lg mx-2 "  id="btnenviar">Enviar</button>
            <div class="table-responsive" style="padding:30px;">
        <table id='dataTable' class="table table-secondary table-hover table-bordered text-center" style="background:#B2EBF2;"><!--table-layout: fixed;-->
        
          <?php

            include "../buscarTareas.php"; 

          ?>
        
        </table>
    </div>
      </div>


    </div>
      
   
  </div>
</div>



  <!-- Modal tarea nueva-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"  style="margin-top:20px ; ">
    <div class="modal-dialog modal-xl text-center" >
        <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);"  >
               
            <div class="modal-body" >
              <form  method="post" class="mt-4 " action="crearTarea_back.php" name="formtarea" enctype="multipart/form-data">
               <h5 class="modal-title my-2" id="staticBackdropLabel" style="color:white"> Nueva tarea</h5>
               <div class="row">
                <div class="col-md-6">
                   Nombre de la tarea<input type="text" name="nombreTarea" class="form-control" required>
                </div>
                <div class="col-md-6">
                  Encargado de realizarla<input id ="mencargado" readonly class="form-control" >
                 <input readonly hidden name="mtareaid" id="mtareaid">
                </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                  Fecha de comienzo<input type="date" name="comienzoTarea" class="form-control" required>
                </div>
                <div class="col-md-6">
                  Fecha de finalización<input type="date" name="finTarea" class="form-control" required>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                 Descripción de la tarea<textarea name="descripcionTarea" class="form-control"></textarea>
                </div>
               </div> 
                
              <div class="input__row uploader my-4" >
                <div id="inputval" class="input-value"></div>
                <label for="file_descrip" class="form-control"><i class="fa fa-cloud-upload "></i>Subir archivo</label>
                <input id="file_descrip" name="file_descrip" class="custom-file-upload upload " type="file">
              </div>
  
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
    
      <div class="modal-body" style="background:#FAFAFA;">
        <label>Silvia Montenegro</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        <input readonly hidden name="mcvid" id="mcvid" >
      <br>
      <?php
       $id = "estudios";
       //$estudios = $con->query("SELECT * FROM tareas WHERE proyecto_id = 1 ORDER BY (fechaInicioTarea) DESC");
       //$cursos = $con->query("SELECT * FROM cursos WHERE colaborador_id = 1 ORDER BY (fechaInicioTarea) DESC");
     
      echo "<h6>Estudios</h6>
      <div id='mestudios'> $id_colab</div>";
        ?>
      <hr class='white'>
      <h6>Cursos</h6>
      <div class="lista" id='mcursos'></div>
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
        <input readonly class="form-control" name="mdescripcion" id="mdescripcion" style="border:none">
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

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


result3 = function(encargnombre, encargapellido, id){
    
    var nombre = encargnombre +" " +encargapellido;
    $('#mencargado').val(nombre);
    $('#mtareaid').val(id);
  };

//subir archivo
 $('#file_descrip').on('change',function(){
   $('#inputval').text( $(this).val());
 });

   
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="../paginacion.js"></script>
<script src="setDescripcion.js"></script>
 </body>

 <?php
        include "../footer.html"

 ?>

</html>