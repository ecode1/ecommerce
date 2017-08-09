<?php 

	$port='81';
	$host = 'localhost';
	$user= 'root';
	$basedatos = 'gamesodyssey';
	$con;

	
	$con = @mysqli_connect($host, $user, '',$basedatos);
	mysqli_set_charset($con, 'utf8');
	if (!$con) {
	    echo "Error: " . mysqli_connect_error();
		exit();
	}
	

?>