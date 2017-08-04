<?php 

	$port='81';
	$host = 'localhost';
	$user= 'root';
	$basedatos = 'gamesodyssey';
	$con;

	
	$con = @mysqli_connect($host, $user, '',$basedatos);

	if (!$con) {
	    echo "Error: " . mysqli_connect_error();
		exit();
	}
	echo 'Connected to MySQL';



?>