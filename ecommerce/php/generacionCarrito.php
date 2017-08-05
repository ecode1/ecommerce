<?php 
include 'Carrito.php';
include 'Juego.php';
session_start();	

	$idJuego = $_POST['idJuego'];
	$cantidad= $_POST['cantidad'];
	$listaJuegos = $_SESSION['juegos'];

	$j = new Juego();
	$c = new Carrito();


	if($j->validaJuego($idJuego, $listaJuegos)){
		foreach ($listaJuegos as $key => $value) {
			if($value['idJuego'] == $idJuego){
				$s = serialize($value);
		        $juego = new Juego();
		        $juego = unserialize($s);
		        $juego['cantidad']=$cantidad;

		        $c->Agregar($juego);

		        $_SESSION['carrito']=$c->milista;

			}
		}
		
	}

?>