<?php


function call($method, $url, $data = false) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch, CURLOPT_URL, $url);
	if ($data) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Content-Length: ' . strlen($data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}

function getLastPrice(){

	$response = call('GET', 'https://appbb.co/appbbAPI/api2.php/tasa?order=id,desc&page=1,1');
	$jsonObject = json_decode($response, true);	
	$precioVentaEnBSF=$jsonObject['tasa']['records'][0][1];
	$precioCompra=$jsonObject['tasa']['records'][0][2];
	$precioCompraGC=$jsonObject['tasa']['records'][0][3];
	$precioVerificacion=$jsonObject['tasa']['records'][0][5];

	$arrayDePrecios= array(
		1=>$precioVentaEnBSF,
		2=>$precioCompra,
		3=>$precioCompraGC,
		4=>$precioVerificacion,		
		);
	
	return $arrayDePrecios;
}
function getLastPriceNew(){

	$response = call('GET', 'https://www.appbb.co/appbbAPI/api2.php/tasas_new?order=id,desc&page=1,1');
	$jsonObject = json_decode($response, true);	
	$precioVentaAmazonGC=$jsonObject['tasas_new']['records'][0][1];
	$precioVentaOtrasGC=$jsonObject['tasas_new']['records'][0][2];
	$precioVentaBTC=$jsonObject['tasas_new']['records'][0][3];
	$precioVentaBOFA=$jsonObject['tasas_new']['records'][0][4];
	$precioVentaPayoneer=$jsonObject['tasas_new']['records'][0][5];
	$precioVentaPayza=$jsonObject['tasas_new']['records'][0][6];
	$precioVentaPayPal=$jsonObject['tasas_new']['records'][0][7];
	$precioCompraPayPal=$jsonObject['tasas_new']['records'][0][8];
	$precioCompraBTC=$jsonObject['tasas_new']['records'][0][9];
	$precioCompraPayoneer=$jsonObject['tasas_new']['records'][0][10];
	$precioCompraBOFA=$jsonObject['tasas_new']['records'][0][11];
	$precioCompraPayza=$jsonObject['tasas_new']['records'][0][12];
	$precioCompraAmazonGC=$jsonObject['tasas_new']['records'][0][13];
	$precioVerfPayPal=$jsonObject['tasas_new']['records'][0][14];
	$precioCompraSkrill=$jsonObject['tasas_new']['records'][0][15];
	$precioCompraNeteller=$jsonObject['tasas_new']['records'][0][16];
	$precioCompraAirtm=$jsonObject['tasas_new']['records'][0][17];
	$precioCompraPayeer=$jsonObject['tasas_new']['records'][0][18];
	$precioCompraPesoCol=$jsonObject['tasas_new']['records'][0][19];	
	$precioCompraVentaCol=$jsonObject['tasas_new']['records'][0][20];	
	$precioCompraPesoChile=$jsonObject['tasas_new']['records'][0][21];	
	$precioCompraVentaChile=$jsonObject['tasas_new']['records'][0][22];	

	$arrayDePrecios= array(

	1=>$precioVentaAmazonGC,
	2=>$precioVentaOtrasGC,
	3=>$precioVentaBTC,
	4=>$precioVentaBOFA,
	5=>$precioVentaPayoneer,
	6=>$precioVentaPayza,
	7=>$precioVentaPayPal,
	8=>$precioCompraPayPal,
	9=>$precioCompraBTC,
	10=>$precioCompraPayoneer,
	11=>$precioCompraBOFA,
	12=>$precioCompraPayza,
	13=>$precioCompraAmazonGC,
	14=>$precioVerfPayPal,
	15=>$precioCompraSkrill,
	16=>$precioCompraNeteller,
	17=>$precioCompraAirtm,
	18=>$precioCompraPayeer,
	19=>$precioCompraPesoCol,
	20=>$precioCompraVentaCol,
	21=>$precioCompraPesoChile,
	22=>$precioCompraVentaChile
	);
	
	return $arrayDePrecios;
}
$preciosNew= getLastPriceNew();
$precios= getLastPrice();
?>

            