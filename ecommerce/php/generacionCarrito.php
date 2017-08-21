<?php 
include 'Carrito.php';
include 'Juego.php';
session_start();	

	$idJuego = $_POST['idJuego'];
	$cantidad= $_POST['cantidad'];
	// $cantidad = intval($cantidad);
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
					        	if($j->validastock($listaJuegos, $cantidad)){
					        		$pre = $juego['precio'];
					        		if($j->validaprecio($listaJuegos, $pre)){
					        			$descripcion = $juego['descripcion'];
					        			if($j->validadescripcion($listaJuegos, $descripcion)){

										$c->Agregar($juego);
									    //$j->updatestock($cantidad, $idJuego);
									     //var_dump($j->updatestock($cantidad, $idJuego));
									     $_SESSION['carrito'] = $c->milista;
									     //$_SESSION['subtotal'] = $c->total;
									    echo json_encode($_SESSION['carrito']);
									    //echo json_encode($_SESSION['subtotal']);

					        			}


									     
					        			}
								        
									}
			        			
				      	}
				}
			}
		}
	
	
	


?>