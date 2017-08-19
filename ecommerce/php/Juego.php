<?php 
class Juego{

	private $idJuego;
	private $nombreJuego;
	private $descripcion;
	private $anho;
	private $precio;
	private $stock;
	private $url;
	private $idCategoria;
	private $idConsola;
	private $cantidad;
	private $subtotal;

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

	public function validaprecio($listaJuegos, $pre){


			foreach ($listaJuegos as $key => $value) {
				$intprecio = intval($pre);
				$intpreciolista = intval($value['precio']);
				if($intprecio == $intpreciolista){
					return true;
				}
			}
			return false;


	}

	public function validadescripcion($listaJuegos, $descripcion){
		foreach ($listaJuegos as $key => $value) {

			if ($value['descripcion'] == $descripcion){

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