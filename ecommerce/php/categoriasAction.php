<?php 
include 'conexion.php';
include 'Categoria.php';

if(!isset($_SESSION['categorias'])){
	$listacategorias;
	$sql = "SELECT * FROM categoria";
	$result = $con->query($sql);
	$message = '';

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
	               
			$s = serialize($row);
			$c = new Categoria();
			$c = unserialize($s);

			$listacategorias[] = $c; 

	    }


	}

	$_SESSION['categorias'] = $listacategorias;
	//print_r($_SESSION['categorias']);
	json_encode($_SESSION['categorias']);

	$con->close();
}	
?>