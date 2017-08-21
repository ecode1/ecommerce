<?php 
include 'Carrito.php';
include 'Juego.php';
session_start();	

	$idJuego = $_POST['idJuego'];
	// $cantidad = intval($cantidad);
	$listaJuegos = $_SESSION['juegos'];

	$j = new Juego();
	$c = new Carrito();
	
	if(isset($_SESSION['carrito'])){
		$c->milista = $_SESSION['carrito'];
	}
	

	
	if($j->validaJuego($idJuego, $listaJuegos)){	
		$c->Eliminar($idJuego);	
		$_SESSION['carrito'] = $c->milista;
		echo json_encode($_SESSION['carrito']);
	
	}

?>