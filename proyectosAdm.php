<!doctype html>
<html>


<head>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     
</head>
<?php
include "cabeceraLogin.html";

?>
<body>
	<div class="container" style="margin-bottom:30px">
		<div class="my-2">
			<a href="proyectoNuevo.php" class="btn btn-outline-info">+ Crear proyecto</a>
			
	    </div>
	    <div class='col-md-12' style='width:80%'>
	    <?php
        $con = new mysqli("localhost","root","","consultora");
	    $consultaProyectos = $con->query("SELECT * FROM proyecto WHERE  fechaFinProy IS NULL");
	    while ($resultadoProyecto = $consultaProyectos->fetch_assoc()) {
	    	$empresa = $con->query("SELECT razonSocial FROM empresa WHERE id='" . $resultadoProyecto['empresa_id'] . "'")->fetch_assoc();

	    	echo "
                    <div class='card my-4' style='background-color: #B2EBF2;' >
                        <div class='card-body'>
                            <h4 class='card-title' >".$resultadoProyecto["nombre"]."</h3>
                            <h4 class='my-3'>".$empresa["razonSocial"]."</h3>
                            <h6>Fecha de inicio: ".$resultadoProyecto["fechaInicioProy"]."</h6>
		
							<div class='row my-3'>
						    	<div class='col-md-3'>Estado</div>
						    	<div class='col-md-10'>
						    		<div class='progress' style='height: 30px;'>
					 					<div class='progress-bar progress-bar-striped' role='progressbar' style='width: ".$resultadoProyecto["estado"]."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>".$resultadoProyecto["estado"]."%</div>
									</div>
								</div>
							</div>
							 <a href=# class='btn btn-secondary btn-sm'>Ver más</a>
	                   </div>
                       
                           
                        
                    </div>
          ";
         }
	    ?>
	      </div>
	    </div>
	</div>

</body>
	<?php
        include "footer.html"

     ?>

</html>
