<?php 

class Juego{

	public $idJuego;
	public $nombreJuego;
	public $descripcion;
	public $anho;
	public $precio;
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

}

?>