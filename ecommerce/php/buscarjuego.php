<?php 
include 'conexion.php';
include 'Juego.php';
//$cat = $_POST['idCategoria'];
//$cat;
$param = $_POST['nombre'];

if(!isset($_SESSION['juegos'])){
	$listaJuegos;

	if($param == true){
		$sql = "SELECT * FROM juego where nombreJuego like '%$param%' or idCategoria like '%$param%' or idConsola like '%$param%' or anho like '%$param%'";

	}

	$result = $con->query($sql);
	$message = '';
	

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
	               
			$s = serialize($row);
			$j = new Juego();
			$j = unserialize($s);

			$listaJuegos[] = $j; 

			
	    }

	}

	$_SESSION['juegos'] = $listaJuegos;

	echo json_encode($_SESSION['juegos']);

	$con->close();

	
}

	
?>