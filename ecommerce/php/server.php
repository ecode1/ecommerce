<?php
include('../lib/nusoap.php');

session_start();
//Lee Xml
$client = new nusoap_client('http://www.devkairos.com/BancoFalso2017/Usuarios.asmx?wsdl','wsdl');

$param = array("apikey"=>"3333333",
	"user"=>"18609471-9",
	"pass"=>"123456");



if(!isset($_SESSION['cliente'])){

	$result = $client->call('Login', $param);
	
	if($result != null ){
		foreach ($result as $key => $value) {

			if($value['estado']== true){
				print_r("cliente true");

				$_SESSION['cliente'] = $result;
			}
		}
		
	}

}

if(!isset($_SESSION['cuentas'])){


	$result2 = $client->call('TraerCuentas', $param);
	if($result2 != null){

		foreach ($result2 as $key => $value) {
			$_SESSION['cuentas'] = $value["cuentas"];

		}
		
		
	}

	
}

header("location:../html/pagar.php");

?>

