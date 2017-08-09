<?php

class Carrito{

public $milista;
public $total;
public $cantidadtotal;

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


public function Eliminar($id){

	unset($this->milista[$id]);

}

public function Limpiar(){

	unset($this->milista);

}

public function MontoTotal(){

	$this->total=0;
	foreach ($this->milista as $key => $value) {
		$this->total+= $value['precio'];
	}
	$this->Contar();
}

public function Contar(){

	$this->cantidadtotal=count($this->milista);

}

public function IncrementarCantidad($id,$cantidad){

	$producto;
	
	foreach ($this->milista as $key => $value) {
		if($value['idJuego']==$id){

			$producto=$value;
		}
	}
	
	$producto['cantidad']= $producto['cantidad']+$cantidad;
	foreach ($this->milista as $key => $value) {
		if($value['idJuego']==$id){

			$value=$producto;
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