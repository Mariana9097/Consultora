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


  /*$('#btnGetPersonas').click(function(){
    $('#tblPersonas tbody').html('');
    $.post(baseurl+"cpersona/getPersonas",
      function(data){
        var p= JSON.parse(data);
        $.each(p, fucntion(i, item){
          $('#tblPersonas tbody').append(
            '<tr>'+
                '<td>')
        })
      })
  }
  */

  
</script>
 </head>

<body style="background: linear-gradient(to bottom, #FAFAFA, #AED6F1);" >

    <a href="proyectos.php" class="btn btn-info my-2 mx-2">Volver</a>
    <div class="container" >
        
  

    
        
      
        <table class="table table-secondary table-hover table-bordered text-center" style="background:#B2EBF2">
        
          <?php
            $con = new mysqli("localhost","root","","consultora");
            setlocale(LC_ALL, 'Spanish'); //Formato de fechas en español strftime("%A %d %B %Y %H:%M:%S", strtotime(fecha));
            $tareas = $con->query("SELECT * FROM tareas WHERE proyecto_id = 1 ORDER BY (fechaInicioTarea) DESC");
             $i=0;
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
                    $id_tarea = $resultado['descripcion'];
                   $t = $con->query("SELECT * FROM tareas WHERE id = 2 ");
      
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
                      
                  echo " <tr>
                        <td><a>".$resultado['nombreTarea']." </a></td>
                        <td><a class='btn btn-light' data-toggle='modal' data-target='#staticBackdrop2' style='background-color:#DCDCDC'  onClick=result('$id_tarea')>Ver</a></td>
                       <td>" . $fechaInicioFormateada . "</td>
                        <td>" . $fechaFinFormateada . "</td>
                        <td><img style='width:50px;height:50px;border-radius:155px; border:1px solid #666;' src='../imagenes/ejemplo.jpg'>  " . $encargado['apellido'] . ", " . $encargado['nombre'] . "</td> 
                        <td>".$result."<br>";
                        if($result!='Finalizada'){
                          echo"<button class=' btn btn-$boton'>".$result1." </button></td>";
                       }
                        echo "</tr>";
                }
            } 
        
            echo "</tbody>";
          
          ?>
        
        </table>
    </div>
      
   

<!-- Modal ver descripción de tarea-->
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: linear-gradient(to bottom, #2874A6, #AED6F1);" >
     <div class="modal-body" style="background:#E3E4E5;">

      <h6>Detalles:</h6>
      
      <input readonly class="form-control" name="mdescripcion" id="mdescripcion" style="border:none">
    
      <script>
      
      </script>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
result = function(descrip){
    $('#mdescripcion').val(descrip);
  };

</script>