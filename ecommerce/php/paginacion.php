<?php 

	include 'juegosAction.php';

	session_start();

	$numeroPagina = $_GET['numeroPagina'];
	$listaJuegos= $_SESSION['juegos'];

	$juegosMostrar=paginacion($listaJuegos,$numeroPagina);

	$_SESSION['juegosMostrar'] = $juegosMostrar;
	$_SESSION['paginaActive'] = $numeroPagina;

	header("location:../html/catalogo.php");

?>