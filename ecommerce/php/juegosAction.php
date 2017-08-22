<?php 
include 'conexion.php';
include 'Juego.php';


if(!isset($_SESSION['juegos'])){
	$listaJuegos;
	$listaJuegosMostrar;
	$sql = "SELECT * FROM juego";
	$result = $con->query($sql);
	$message = '';
	$paginacion;

	if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
	               
			$s = serialize($row);
			$j = new Juego();
			$j = unserialize($s);

			$listaJuegos[] = $j; 
			
	    }

	    $paginacion = ceil(count($listaJuegos) /3);
	}

	if(count($listaJuegos)> 0 ){

	}

	$listaJuegosMostrar = paginacion($listaJuegos, 1);

	$_SESSION['juegos'] = $listaJuegos;
	$_SESSION['juegosMostrar'] = $listaJuegosMostrar;
	$_SESSION['paginacion'] = $paginacion;
	$_SESSION['paginaActive'] = 1;

	$con->close();
}


 function paginacion($listaJuegos, $numeroPagina){

	$juegosMostrar;
	$juegosPorPagina=3;
	$juegosDesde= $numeroPagina * $juegosPorPagina - $juegosPorPagina;
	$juegosHasta = $numeroPagina * $juegosPorPagina;
	foreach ($listaJuegos as $key => $value) {
		if(($key +1) > $juegosDesde && ($key +1) <= $juegosHasta ){
			$juegosMostrar[] = $value;
		}
	}

	return $juegosMostrar;
}

	
?>