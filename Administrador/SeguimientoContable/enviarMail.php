<?php
 include "../../cabeceraCobranza.html";

if(!empty($_POST['marcado'] && $_POST['idClienteFact'] && $_POST['idFact'])){

$items0 = ($_POST['marcado']);
$items1 = ($_POST['idClienteFact']);
$items2 = ($_POST['idFact']);
$items3 = ($_POST['montoFact']);
$items4 = ($_POST['fechaEmisionFact']);
$items5 = ($_POST['emailClienteFact']);
$items6 = ($_POST['retencion']);


while(true){
  
  $item1 = current($items1);
  $item2 = current($items2);
  $item3 = current($items3);
  $item4 = current($items4);
  $item5 = current($items5);
  $item6 = current($items6);
  $item0 = current($items0);
  
  $idClienteFact = (($item1 !== false) ? $item1 : ", &nbsp;");
  $idFact = (($item2 !== false) ? $item2 : ", &nbsp;");
  $montoFact = (($item3 !== false) ? $item3 : ", &nbsp;");
  $fechaEmisionFact = (($item4 !== false) ? $item4 : ", &nbsp;");
  $emailClienteFact = (($item5 !== false) ? $item5 : ", &nbsp;");
  

  //$valores = '('.$idClienteFact.',"'.$idFact.'","'.$idFact.'","'.$fechaEmisionFact.'","'.$emailClienteFact.'"),';

  //$valoresQ = substr($valores, 0, -1);
  
  if($item0 == 1){

    if($item6==0){
      $cuerpo = "Se registra deuda por $". $montoFact." emitida el ".$fechaEmisionFact;
    }
    else{
      $cuerpo="Falta el pago de la retención por la factura de $". $montoFact." emitida el ".$fechaEmisionFact;
      
    }
  
  
  $destinatario = "marianalucialopez@hotmail.com";  //$consultaCliente['email']
  $asunto = "Matafuegos ";
  
  mail($destinatario,$asunto,$cuerpo);

  
  }
  //$con->query("INSERT INTO idiomas (idioma_id,idiomaNivel_id,colab_id) VALUES $valoresQ");


  $item1 = next($items1);
  $item2 = next($items2);
  $item3 = next($items3);
  $item4 = next($items4);
  $item5 = next($items5);
  $item6 = next($items6);
  $item0 = next($items0);
  


  if($item1 === false && $item2 === false && $item3 === false) break;
}

echo "<h3>Se enviaron las notificiones correctamente<i class='far fa-share-square'></i></h3>";
}

sleep(10);
?>
<script> 
<!--
window.location.replace('facturas.php'); 
//-->
</script>


<?php
/*
if (isset($_POST['conditions'])){
    //print_r($notificar);
    $array = array('marianalucialopez@hotmail.com', 'Debian', 'zentyal');
    //foreach ($notificar as $key => $facturas) {
     $i=0;
    foreach ($array as $indice => $valor) {
        
        $arreglo[$i]=$valor;
        $i ++;
    }
        
            mail($arreglo[0],$arreglo[1],$arreglo[2]);
            
            $destinatario = "marianalucialopez@hotmail.com";  //$consultaCliente['email']
            $asunto = "Matafuegos ".$consultaEmpresa['nombre'];
            $cuerpo = "Se registra deuda por $".$resultadoFact['montofact'];
            mail($destinatario,$asunto,$cuerpo);
        
        
//}
}

*/

  ?>   
		
	


