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
			foreach ($listaJuegos as $key => $value) {
				if($value['idJuego'] == $idJuego){					
					        $juego = new Juego();
					        $juego = $value;
					        $pre = $juego['precio'];
					        if($j->validaprecio($listaJuegos, $pre)){
					        	$descripcion = $juego['descripcion'];
					        	if($j->validadescripcion($listaJuegos, $descripcion)){
									$c->Eliminar($idJuego);
									  $_SESSION['carrito'] = $c->milista;
									   echo json_encode($_SESSION['carrito']);						        
										}
			        			
				      				}
							}
					}
		
			}
	
?>