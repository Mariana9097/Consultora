 <?php
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
                    
                   date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $actual = date('Y-m-d');
                    $date1= new DateTime($actual);
                    $datetime1 = new DateTime($resultado['fechaInicioTarea']);
                    $datetime2 = new DateTime($resultado['fechaFinTarea']);
                    $interval = $date1 ->diff($datetime2);
                    $intervalo = $interval->format('%a');
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
                          
                          case ($diferencia > $diferenciatotal*0.40  ):
                            $boton = 'warning';
                            break;

                          default:
                            $boton= 'danger';
                            $result1 ='Vence hoy';
                            $intervalo ='';
                            break;
                        }
        

                      }
                         
                    }
                      echo " <tr>
                        <td><a>".$resultado['nombreTarea']." </a></td>
                        <td><a class='btn btn-light' data-toggle='modal' data-target='#staticBackdrop2' style='background-color:#DCDCDC;' onclick='setearPublicacion(" . $resultado['id'] . ");' >Ver</a></td>
                       <td>" . $fechaInicioFormateada . "</td>
                        <td>" . $fechaFinFormateada . "</td>
                        <td><img style='width:50px;height:50px;border-radius:155px; border:1px solid #666;' src='../imagenes/ejemplo.jpg'>  " . $encargado['apellido'] . ", " . $encargado['nombre'] . "</td> 
                        <td>".$result."<br>";
                        if($result!='Finalizada'){
                          echo"<button class=' btn btn-$boton'>".$result1." ".$intervalo."</button></td>";
                       }
                        echo "</tr>";
                }
            } 
        
            echo "</tbody>";
?>