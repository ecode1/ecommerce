<?php 
include 'conexion.php';
include 'Juego.php';

session_start();

$listaJuegos;
$sql = "SELECT * FROM juego";
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

$con->close();

	
?>