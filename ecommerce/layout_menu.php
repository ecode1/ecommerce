<?php session_start(); ?>
<head>
  <title>GamesOdyssey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilo.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/funciones.js"></script>

</head>
<body>

<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="logo"></div>
		
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php?p=in">GamesOdyssey</a>
			</div>
			
			<div id="navbar-1" class="navbar-collapse collapse mainnav">
				<ul class="nav navbar-nav">
			      <li <?php if(isset($_GET['p']) &&  $_GET['p'] == 'ca'): ?> class="active"<?php endif ?> ><a href="catalogo.php?p=ca">Catalogo</a></li>
			      <li <?php if(isset($_GET['p']) &&  $_GET['p'] == 'no'): ?> class="active"<?php endif ?> ><a href="#">Nosotros</a></li>
			      <li <?php if(isset($_GET['p']) &&  $_GET['p'] == 'co'): ?> class="active"<?php endif ?> ><a href="#">Contacto</a></li>	      
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true){  ?>
						<li><a href="#" ><span class="glyphicon glyphicon-user" style="color:#7f40b9"></span> &nbsp; <?php echo $_SESSION['usuario']['nombreUsuario'] ?></a></li>
						<li><a href="#"><button id="cerrarSesion" onclick="cerrarSesion()" type="button" class="close" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button></a></li>
			    	<?php } else { ?>
			      <li <?php if(isset($_GET['p']) &&  $_GET['p'] == 'su'): ?> class="active"<?php endif ?>><a href="register.php?p=su"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			      <li <?php if(isset($_GET['p']) &&  $_GET['p'] == 'lo'): ?> class="active"<?php endif ?>><a href="login.php?p=lo"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      <?php } ?>
			    </ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</nav>
	