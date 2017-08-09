<?php 
include 'Carrito.php';
include 'Juego.php';
session_start();	

	$idJuego = $_POST['idJuego'];
	$cantidad= $_POST['cantidad'];
	$listaJuegos = $_SESSION['juegos'];

	$j = new Juego();
	$c = new Carrito();
	if(isset($_SESSION['carrito'])){
		$c->milista = $_SESSION['carrito'];
	}
	
	if($cantidad != null){
		if($j->validaJuego($idJuego, $listaJuegos)){
			foreach ($listaJuegos as $key => $value) {
				if($value['idJuego'] == $idJuego){
					
			        $juego = new Juego();
			        $juego = $value;
			        $juego['cantidad']=$cantidad;
			        $c->Agregar($juego);
			        $_SESSION['carrito'] = $c->milista;
			       echo json_encode($_SESSION['carrito']);

				}
			}
		
		}
	}
	


?>