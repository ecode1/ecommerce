<?php
include 'conexion.php';
include 'Usuario.php';


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
        	
			$message='<div class="alert alert-success">Thank You! I will be in touch</div>';
			
        	header("location:../html/catalogo.php?message='$message'");
        }
        	
    }

}else{
	$message='<div class="alert alert-warning ">No se encontro usuario en nuestros registros</div>';
    header("location:../html/login.php?message='$message'");
        
}

$con->close();

?>