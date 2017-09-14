<?php
include 'conexion.php';
include 'Usuario.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$usuario = $_POST['username'];
$clave = $_POST['password'];

$sql = "SELECT * FROM usuario where nombreUsuario='$usuario' && contrasena = '$clave'";
$result = $con->query($sql);
$message = '';

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $s = serialize($row);
        $u = new Usuario();
        $u = unserialize($s);
       
        if($usuario == $u["nombreUsuario"] && $clave == $u["contrasena"]){
        	
			$_SESSION['login']=true;
            $_SESSION['usuario']= $u;
        	header("location:../html/catalogo.php");

        }
        	
    }

}else{
	$message='<div class="alert alert-warning">No se encontro usuario en nuestros registros</div>';
    header("location:../html/login.php?message=$message");
        
}

$con->close();

?>