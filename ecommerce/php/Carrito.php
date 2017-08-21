<?php

class Carrito{

public $milista;
private $total;
private $cantidadtotal;

function __construct(){

	$this->total=0;
	$this->cantidadtotal=0;
	$this->milista = array();


}


public function Agregar($pro){
	
	$existe=false;
	foreach ($this->milista as $key => $value) {
		if($pro['idJuego']==$value['idJuego']){

			$existe=true;
		}
	}

	if($existe==false){
		$this->milista[]=$pro;
	}
	else{

		$this->IncrementarCantidad($pro['idJuego'], $pro['cantidad']);
	}

	$this->MontoTotal();

}


public function Eliminar($idJuego){

	unset($this->milista[$idJuego]);

}

public function Limpiar(){

	unset($this->milista);

}

private function MontoTotal(){

	$this->total=0;
	foreach ($this->milista as $key => $value) {
		//$this->total+= $value['precio'];

		$pre = intval($value['precio']);
		$canto = intval($value['cantidad']);

		$this->total = $pre * $canto;
		//$this->total = strval($this->total);
		$total = strval($this->total);
		//var_dump($total);
		$value['subtotal'] = $total;
		//var_dump($this->milista['subtotal']);
		//strval($this->total) = ($this->milista);
	}
	$this->Contar();
}

private function Contar(){

	$this->cantidadtotal=count($this->milista);

}

private function IncrementarCantidad($id,$cantidad){

	$producto;
	
	foreach ($this->milista as $key => $value) {
		if($value['idJuego']==$id){

			$producto=$value;
		}
	}
	$producto['cantidad']= $producto['cantidad']+$cantidad;
	foreach ($this->milista as $key => $value) {
		if($value['idJuego']==$id){

			$this->milista[$key]=$producto;
		}
		
	}
	$this->MontoTotal();

}

function __destruc(){

	$this->total = 0;
	$this->cantidadtotal=0;

}


}

?>