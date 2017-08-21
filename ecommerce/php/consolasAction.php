<?php 
include 'conexion.php';
include 'Consola.php';


if(!isset($_SESSION['consolas'])){
	$listaconsolas;
	$sql = "SELECT * FROM consola";
	$result = $con->query($sql);
	$message = '';

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
	               
			$s = serialize($row);
			$co = new Consola();
			$co = unserialize($s);

			$listaconsolas[] = $co; 

	    }


	}

	$_SESSION['consolas'] = $listaconsolas;
	json_encode($_SESSION['consolas']);
	
	$con->close();
}



	
?>