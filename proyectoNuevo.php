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
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    font-weight: bold;
  }
   .tabContainer .buttonContainer button:hover{
     background-color: #d7d4d4;
     
  
   }
   .tabContainer .tabPanel{
    height: 100%;
    display:none;
    background-color: gray;
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
	include "cabeceraLogin.html";

?>
 <body style="background: linear-gradient(to bottom, #2874A6, #AED6F1);" >

 	<a href="proyectos.php" class="btn btn-info my-2 mx-2">Volver</a>
 	<div class="container" >
 	    
  
  <div class="tabContainer">
    <div class="buttonContainer">
      <button onclick="showPanel(0,'#AED6F1')">General</button>
      <button onclick="showPanel(1,'#D4E6F1')">Colaboradores</button>
      <button onclick="showPanel(2,'#A9CCE3')">Tareas</button>
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
    <div class="tabPanel">
      <div class="contenedorPanel" style="margin-top:-80px">
        <button class="btn btn-info mx-3"  id="add_field" style="margin-bottom:20px;font-weight: bold;">+ Añadir colaborador</button>
        
        <div id="listas" class="mx-5">
            
        </div>
      </div>
      </div>
      
    <div class="tabPanel">Tareas
        <div class="contenedorPanel" style="margin-top:-80px">
        <button class="btn btn-info "  id="add_field" style="margin-bottom:20px;font-weight: bold;">+ Añadir tareas</button>
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
                                <option  selected disabled >Puesto</option>\
                                <option value="1">1</option>\
                                <option value="2">2</option>\
                                <option value="3">3</option>\
                                <option value="4">4</option>\
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
        include "footer.html"

     ?>
</html>


