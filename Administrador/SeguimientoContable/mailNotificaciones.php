<?php

	include "../../conexionBDC.php";
    include "../../cabeceraCobranza.html";
?>
<body>

    <div class="container" id="dvTable" name="dvTable">
    
        <div class='my-3 jumbotron overflow-auto' style='background-color:PowderBlue;'>
            <h5>Se enviarán notificaciones a las siguientes empresas:</h5>
                            
                             
    <?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y-m-d');
        
        $empresaid = $_POST['selectEmpresa'];
        $consulta2 = "SELECT nombre FROM empresaclientes WHERE id = '$empresaid'";
	    $consultaEmpresa = $con->query($consulta2)->fetch_assoc();
	    $nombreEmpresa = $consultaEmpresa["nombre"];
           
        //Se busca a todos los clientes que tiene una empresa
        $consulta1 = "SELECT empresacliente_id, plazopago, email, nombrecliente, idcliente FROM clientes WHERE empresacliente_id = '$empresaid'";
        $consultaCli = $con->query($consulta1) or die($con->error);
        

while($consultaCliente = $consultaCli->fetch_assoc()){

	$clienteid = $consultaCliente['idcliente'];
    $nombre = $consultaCliente['nombrecliente'];
    $email= $consultaCliente['email'];
	$consulta = "SELECT id, nrofact, fechaEmision, montofact, estado_id , cliente_id , faltaRetencion FROM facturas WHERE cliente_id = '$clienteid' ORDER BY cliente_id";
    $consultaFact = $con->query($consulta) or die($con->error);
    
    $aux=0;
    
        while ($resultadoFact = $consultaFact->fetch_assoc()) {
        $i=0;

            if($resultadoFact['estado_id']==1 || $resultadoFact['faltaRetencion']== 1){
                
                $idFact = $resultadoFact["id"];
                $nroFact =  $resultadoFact["nrofact"];
                $monto =  $resultadoFact["montofact"];
                $fechaEmision =  $resultadoFact["fechaEmision"];
                $retencion = $resultadoFact['faltaRetencion'];

                

                //Se calcula fecha despues del primer plazo
                $mod_date = strtotime($resultadoFact['fechaEmision']."+".$consultaCliente['plazopago']." days");
                $fechavencimiento= date("Y-m-d",$mod_date);
                
                
                echo "<form action='enviarMail.php' method='post'>
                <div class='form-check mx-5'>
                    <input type='checkbox' id='unoo' name='check[]' value='1' onclick='checkea($idFact)' checked>
                    <label class='form-check-label' for='check'>".$nombre." - $".$monto." - Emitida el ".$fechaEmision."</label>
                    <input id='idClienteFact' name='idClienteFact[]' value='".$clienteid."' hidden>
                    <input id='emailClienteFact' name='emailClienteFact[]' value='".$email."' hidden>
                    <input id='idFact' name='idFact[]' value='".$idFact."' hidden>
                    <input id='idFact' name='retencion[]' value='".$retencion."' hidden>
                    <input id='montoFact' name='montoFact[]' value='".$monto."' hidden>
                    <input id='fechaEmisionFact' name='fechaEmisionFact[]' value='".$fechaEmision."' hidden>
                    <input value='1' id='".$idFact."'  name='marcado[]' hidden>
                   
                    
                </div>
  
                ";
                
                $i++;
                
            }
                
        }

}


    ?>

     <button type='submit' class='btn btn-primary btn-lg my-4' id='btnConfirmar' style='padding:5px 70px'>Enviar<i class='far fa-share-square'></i>
    </button>
     
    </form>

    
   <!--form class='form-group' method='POST' id='enviarMail' name='enviarMail' action='enviarMail.php' enctype='multipart/form-data' role='form'>
    <div class='my-4'>
          
            <button type='submit' class='btn btn-primary btn-lg' id='btnEnviar' style='padding:5px 70px'>Enviar <i class='far fa-share-square'></i></button>
        </div>

         </form-->
        
    </div>


</body>
<script>  
    
function checkea(id) {
    //eval("debugger;");
    
     if (document.getElementById(id).value==1){
    document.getElementById(id).value=0;
    }else{
     document.getElementById(id).value=1;
    }

    
}
</script>


