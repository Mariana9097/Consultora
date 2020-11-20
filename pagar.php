<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-8322625614662436-070704-d6f544c9c8a90c275ebab2f160210d75-81231027');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Servicio consultoría';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="/insertarpago.php" method="POST"></form>
		<script
	  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
	  data-preference-id="<?php echo $preference->id; ?>">
		</script>
	</form>
</body>
</html>
curl -X POST -H "Content-Type: application/json" " https://api.mercadopago.com/users/test_user?access_token=TEST-8322625614662436-070704-d6f544c9c8a90c275ebab2f160210d75-81231027" -d "{'site_id':'MLA'}"