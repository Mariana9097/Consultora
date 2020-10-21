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

?>
 <body style="background: linear-gradient(to bottom, #FAFAFA, #AED6F1);" >

 	<a href="proyectos.php" class="btn btn-info my-2 mx-2">Volver</a>
 	<div class="container" >
 	    
  
  <div class="tabContainer">
    <div class="buttonContainer">
      <button  style="border-top-left-radius: 20px; " onclick="showPanel(0,'#AED6F1')">GENERAL</button>
      <button onclick="showPanel(1,'#AED6F1')">COLABORADORES</button>
      <button style="border-top-right-radius: 20px;" onclick="showPanel(2,'#AED6F1')">TAREAS</button>
    </div>

    <div class="tabPanel">
      <form class="contform mx-5 ">
            <div class="form-group row">
                <label for="colFormLabel" id="label_general" class="col-sm-4 col-form-label"> Nombre del proyecto:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" id="label_general" class="col-sm-4 col-form-label">Fecha de inicio:</label>
                <div class="col-sm-4">
                    <input type="date"  class="form-control" >
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" id="label_general" class="col-sm-4 col-form-label">Fecha de entrega límite:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" >
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" id="label_general" class="col-sm-4 col-form-label">Tipo de proyecto</label>
                <div class="col-sm-4">
                    <select class="form-control">
                      <option selected disabled>Seleccionar</option>
                        <option>Asesoria</option>
                        <option>Contable</option>
                        <option>Calidad</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel"  id="label_general" class="col-sm-4 col-form-label">Presupuesto estimado</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" >
                </div>
            </div>
        </form>
    </div>
    <div class="tabPanel" >
      <div class="contenedorPanel" style="margin-top:-80px">
        <button class="btn btn-info mx-3"  id="add_field" style="margin-bottom:20px;font-weight: bold;">+ Añadir colaborador</button>
        
        <div id="listas" class="mx-5">
            
        </div>
      </div>
      </div>
      
    <div class="tabPanel">
        <div class="contenedorPanel" style="margin-top:-80px">
        <button class="btn btn-info "  data-toggle="modal" data-target="#staticBackdrop" id="add_field" style="margin-bottom:20px;font-weight: bold;">+ Añadir tareas</button>
            <div class="table-responsive">
        <table class="table table-secondary table-hover table-bordered text-center" style="background:#B2EBF2">
        
            <?php
            $con = new mysqli("localhost","root","","consultora");
            setlocale(LC_ALL, 'Spanish'); //Formato de fechas en español strftime("%A %d %B %Y %H:%M:%S", strtotime(fecha));
            $tareas = $con->query("SELECT * FROM tareas WHERE proyecto_id = 1 
                ORDER BY (fechaInicioTarea) DESC");
        
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
                   
                    if($resultado['finalizada']==0){
                      $result="Finalizada"; 
                    }else{
                       $result="Sin realizar";  
                    }
                    $fechaFormateada = strftime("%d de %B ", strtotime($resultado['fechaInicioTarea']));
                    echo "<tr>
                        <td><a>" . $resultado['nombreTarea'] . "</a></td>
                        <td><a class='btn btn-light' onclick='setearPublicacion(" . $resultado['id'] . ");' data-toggle='modal' data-target='#modalVerPublicacion' style='background-color:#DCDCDC'>Ver</a></td>
                        <td>" . $fechaFormateada . "</td>
                        <td>" . $resultado['fechaFinTarea'] . "</td> 
                        <td><img style='width:50px;height:50px;border-radius:155px; border:1px solid #666;' src='imagenes/ejemplo.jpg'>  " . $encargado['apellido'] . ", " . $encargado['nombre'] . "</td> 
                        <td>".$result."</td>
                       
                        </tr>";
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
<div class="modal fade modal-lg" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"  style="margin-top:130px ;">
    <div class="modal-dialog text-center" >
        <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);"  >
               
            <div class="modal-body" >
             
               <h5 class="modal-title my-2" id="staticBackdropLabel" style="color:white"> Nueva tarea</h5>
               <div class="row">
                <div class="col-md-6">
                   Nombre de la tarea<input type="text" class="form-control"></input>
                </div>
                <div class="col-md-6">
                  Encargado de realizarla <input class="form-control"></input>
                </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                  Fecha de comienzo<input type="date" class="form-control"></input>
                </div>
                <div class="col-md-6">
                  Fecha de finalización<input type="date" class="form-control"></input>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                  Descripción de la tarea<textarea class="form-control"></textarea>
                </div>
               </div> 
                <div class="col-md-12 text-center" >
                 <button type="button" class="btn btn-primary  my-4 mx-2" style="background-color:#2874A6; ">Guardar</button>            
                 <button type="button" class="btn btn-outline-secondary my-4 mx-5" data-dismiss="modal" id="btnCerrar" >Cerrar</button>
          
             </div>
          </div>
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



   //Campo dinámico de colaboradores
   var campos_max = 8;   //max de 10 campos

        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div class="row my-3" style="background-color:#85C1E9; padding: 15px"><input list="nombres" class="col-md-4 form-control" id="colab_proyecto" name="colab_proyecto" placeholder="Seleccionar nombre" />\
                              <datalist id="nombres">\
                                <option value="nombre">\
                                <option value="nombre">\
                                <option value="nombre">\
                                <option value="nombre">\
                                <option value="nombre">\
                            </datalist>\
                            <select class="col-md-2 form-control" id="select_cargo" name="select_cargo">\
                                <option selected value="1">Colaborador</option>\
                                <option value="2">Encargado</option>\
                            </select>\
                               <label class="col-md-4">colaborador@gmail.com</label>\
                                <a href="#" class="remover_campo col-md-2">Remover</a>\
                                </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
</script>


 <?php
        include "../footer.html"

     ?>
</html>


