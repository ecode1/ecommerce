<?php 

	$port='81';
	$host = 'localhost';
	$user= 'essentia_games';
	$pass= 'games01101';
	$basedatos = 'essentia_gamesodyssey';
	$con;

	
	$con = @mysqli_connect($host, $user, $pass, $basedatos);
	mysqli_set_charset($con, 'utf8');
	if (!$con) {
	    echo "Error: " . mysqli_connect_error();
		exit();
	}
	

?>