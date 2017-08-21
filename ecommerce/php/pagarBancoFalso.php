<?php

include('../lib/nusoap.php');



session_start();


$idTipoCuenta = $_POST['idTipoCuenta'];
//print_r($idTipoCuenta);
$monto=0;
$descripcion="";

foreach ($_SESSION["carrito"] as $key => $value) {
	$monto = $monto + ( $value["precio"] * $value["cantidad"]);
	$descripcion = $descripcion."nombreJuego : ".$value["nombreJuego"].", cantidad : ".$value["cantidad"].", precio : ".$value["precio"].", ";
}


//Lee Xml
$client = new nusoap_client('http://www.devkairos.com/BancoFalso2017/Usuarios.asmx?wsdl','wsdl');

$param = array("apikey"=>"3333333",
	"user"=>"18609471-9",
	"pass"=>"123456",
	"monto" => $monto ,
	"descripcion"=> $descripcion,
	"idPedido" => 1,
	"idCuenta"=> $idTipoCuenta);


$resultPagar = $client->call('Pagar', $param);

foreach ($resultPagar as $key => $result) {
	if($result["estado"] == "true"){
		$_SESSION["estadoPago"] = true;
		header("location:../html/pagar.php");
	}else{
		$_SESSION["estadoPago"] = false;
		header("location:../html/pagar.php");
	}
}



?>