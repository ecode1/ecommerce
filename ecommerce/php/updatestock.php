<?php 
include 'conexion.php';
include 'Juego.php';
session_start();


public function updatestock($cantidad, $idJuego){
		
		$listaJuegos = $_SESSION['juegos'];

		foreach ($listaJuegos as $key => $value) {
			$st = intval($value['stock']);
			$cn = intval($cantidad);
			if($st>= $cn){
				$nuevostock = $st - $cn;

				$sql = "UPDATE juego SET stock=30 WHERE id=1";
				$result = $con->query($sql);
				
				$con->close();
				
			}
		}			
}

}

	
?>