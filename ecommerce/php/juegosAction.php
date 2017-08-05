<?php 
include 'conexion.php';

session_start();
$sql = "SELECT * FROM juego";
$result = $con->query($sql);
$message = '';

if ($result->num_rows > 0) {
	
	$_SESSION['juegos'] = $result;
    

}

$con->close();

	
?>