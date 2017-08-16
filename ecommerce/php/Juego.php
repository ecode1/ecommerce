<?php 
class Juego{

	public $idJuego;
	public $nombreJuego;
	public $descripcion;
	public $anho;
	public $precio;
	public $stock;
	public $url;
	public $idCategoria;
	public $idConsola;
	public $cantidad;
	public $subtotal;

	function __construct(){

	}

	public function validaJuego($id,$listaJuegos){

		foreach ($listaJuegos as $key => $value) {
			
			if($value['idJuego']==$id){
				return true;
			}
		}
		return false;
	}


	public function validastock($listaJuegos, $cantidad){
		

			foreach ($listaJuegos as $key => $value) {
			$st = intval($value['stock']);
			$cn = intval($cantidad);
			if($st>= $cn){
				return true;
			}
		}
		return false;

	}



	public function updatestock($cantidad, $idJuego){
		
		
		$listaJuegos = $_SESSION['juegos'];
		

		foreach ($listaJuegos as $key => $value) {
			$st = intval($value['stock']);
			$cn = intval($cantidad);
			if($st>= $cn){
				$stock = $st-$cn;
				return $stock;

				// $query = "UPDATE `juegos` SET `stock` = '$stock' WHERE `idJuego` = '$idJuego'";

				// // // Execute the query
				// $result = $con->query($query);

				// 	return $result;
		
			}
		}			
}



}

?>