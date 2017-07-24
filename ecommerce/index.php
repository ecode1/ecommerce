<!DOCTYPE html>
<html lang="en">
<head>
  <title>GamesOdyssey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
	<nav class="navbar navbar-inverse separar">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand active" href="index.php">GamesOdyssey</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="html/catalogo.php">Catalogo</a></li>
	      <li><a href="#">Nosotros</a></li>
	      <li><a href="#">Contacto</a></li>	      
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item active">
	      <img src="img/carousel-img1.jpg" alt="Chania">
	      <div class="carousel-caption">
	        <h3>Los Angeles</h3>
	        <p>LA is always so much fun!</p>
	      </div>
	    </div>

	    <div class="item">
	      <img src="img/carousel-img2.jpeg" alt="Chicago">
	      <div class="carousel-caption">
	        <h3>Chicago</h3>
	        <p>Thank you, Chicago!</p>
	      </div>
	    </div>

	    <div class="item">
	      <img src="img/carousel-img3.jpg" alt="New York">
	      <div class="carousel-caption">
	        <h3>New York</h3>
	        <p>We love the Big Apple!</p>
	      </div>
	    </div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

</div>	

</body>
</html>
