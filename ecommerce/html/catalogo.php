
 <?php 
 include('../layout_menu.php'); 
 include('../php/juegosAction.php');
 include('../php/categoriasAction.php');
 include('../php/consolasAction.php');
 if(!$_SESSION['login']){
   header("location:login.php");
   die;
 } 
 ?>

		<div class="row">
			<div class="col-md-2">
				<div class="panel-group">
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" href="#filtros">Filtros</a>
				      </h4>
				    </div>
				    <div id="filtros" class="panel-collapse collapse">
				      <ul class="list-group">
				        <li class="list-group-item">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							       <a data-toggle="collapse" href="#Categorias">Categorias</a>
							      </h4>
							    </div>
							    <div id="Categorias" class="panel-collapse collapse">
							    <?php  if ( isset($_SESSION['categorias'])){ 
										foreach ($_SESSION['categorias'] as $key => $value) {
										?>   
							      <ul class="list-group">	
									  <li class="list-group-item" onclick="buscarjuego(<?php echo $value['idCategoria'] ?>)"><a href="#"><?php echo $value['categoria']; ?></a><span class="badge"></span></li>
							      </ul>
							      <?php 
											}
										}
										?>	
							  </div>
				        </li>
				        <li class="list-group-item">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#Consolas">Consola</a>
							      </h4>
							    </div>
							    <div id="Consolas" class="panel-collapse collapse">
							    <?php  if ( isset($_SESSION['consolas'])){ 
										foreach ($_SESSION['consolas'] as $key => $value) {
										?>   
							      <ul class="list-group">	
									  <li class="list-group-item" onclick="buscarjuego(<?php echo $value['idConsola'] ?>)"><a href="#"><?php echo $value['consola']; ?></a><span class="badge"></span></li>
							      </ul>
							      <?php 
											}
										}
										?>	
							    </div>
							  </div>
				        </li>
				        <li class="list-group-item">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#anho">Año</a>
							      </h4>
							    </div>
							    <div id="anho" class="panel-collapse collapse">
							    <?php  if ( isset($_SESSION['juegos'])){ 
										foreach ($_SESSION['juegos'] as $key => $value) {
										?>   
							      <ul class="list-group">	        
									  <li class="list-group-item" onclick="buscarjuego(<?php echo $value['anho'] ?>)"><a href="#"><?php echo $value['anho']; ?></a></li>						        
							      </ul>
							       <?php 
											}
										}
										?>	
							    </div>
							  </div>
				        </li>
				      </ul>
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-md-10">	
				<div class="row">
					<div class="col-md-6 separar">
						<form>
						  <div class="input-group">
						    <input type="text" id="juegobuscar" name="juego" class="form-control inputNegro" placeholder="Search">
						    <div class="input-group-btn">
						      <button class="btn btn-default" type="button" onclick="buscarjuego($('#juegobuscar').val())">
						        <i class="glyphicon glyphicon-search"></i>
						      </button>
						    </div>
						  </div>
						</form>
					</div>
					<div class="col-md-6" id="carritoCompra">
						
							<span class="glyphicon glyphicon-shopping-cart pull-right"></span>
							<div id="contenidoCarrito">
								<table class="table table-hover">
								    <thead>
								      <tr>
								        <th>nombreJuego</th>
										<th>cantidad</th>
										<th>subtotal</th>
										<th></th>
								      </tr>
								    </thead>						    
									<tbody>
										<?php  if ( isset($_SESSION['carrito'])){ 
										foreach ($_SESSION['carrito'] as $key => $value) {
										?>
										<tr>
											<td><?php echo $value['nombreJuego'] ?></td>
											<td><?php echo $value['cantidad'] ?></td>
											<td>$ <?php echo $value['cantidad']* $value['precio'] ?></td>
											<td><button type="button" class="close" aria-label="Close" onclick="eliminardeCarrito(<?php echo $value['idJuego'] ?>);">
											  <span aria-hidden="true">&times;</span>
											</button>
											</td>
										</tr>				
										<?php 
											}
										}
										?>		
									</tbody>
								</table>
								<button id="btnPagar" type="button" class="btn btn-primary" onclick="pagarCarrito()">
									Pagar
								</button>
							</div>

					</div>
				</div>			
				<div class="row" id="catalogo">	

				<?php  if ( isset($_SESSION['juegosMostrar'])){ 
					foreach ($_SESSION['juegosMostrar'] as $key => $value) {
						
       			?>						
					<div class="col-sm-4 panelJuego" id="divJuego<?php echo $value['idJuego'];  ?>">
						<div class="panel panel-default">
						  <div class="panel-heading"><?php echo $value['nombreJuego'] ?></div>
						  <div class="panel-body">
						  	<img data-toggle="modal" data-target="#myModal" src="<?php echo $value['url'] ?>" alt="The Last Of Us" width="300" height="300"></img>
						  </div>
						  <div class="panel-footer">
							<div class="row">
								<div class="col-xs-5">Cantidad : <input type="number" class="form-control  cantidad" min="0" max="10" oninput="validity.valid||(value='');"></div>
								<div class="col-xs-5">Precio: </br><?php echo $value['precio'] ?></div>
								<div class="col-xs-2"></br>
									<span onclick="agregarACarrito(<?php echo $value['idJuego'] ?>);" class="glyphicon glyphicon-shopping-cart"></span>
								
								</div>
							</div>
						  </div>
						</div>
					</div>
				<?php 
					}
				}
				?>
					
				</div>
				
				<ul class="pagination centrado">
				<?php if(isset($_SESSION['paginacion'])) { 
						for ($i=1; $i<= $_SESSION['paginacion']; $i++) {		
				
							if(isset($_SESSION['paginaActive'])){
								if($_SESSION['paginaActive'] == $i){ ?>
								
									<li class="active"><a href="javascript:paginacion(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
						<?php
								}else{ ?>

									<li><a href="javascript:paginacion(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
							
						<?php	}
							}
						?>			

				 						  
				
				<?php 	
						} 
					}
				?>
				</ul>
			</div>
		</div>	



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">The Last of Us</h4>
      </div>
      <div class="modal-body">
        <p>Año: 14 de junio de 2013</p>
        <p>
        	The Last of Us es un videojuego de acción-aventura y survival horror desarrollado por Naughty Dog exclusivamente para PlayStation 3 y PlayStation 4. El videojuego fue anunciado por primera vez el 10 de diciembre de 2011 durante los Spike Video Game Awards. Aunque inicialmente su salida al mercado estaba prevista para el 7 de mayo de 2013, finalmente se retrasó hasta el 14 de junio. El juego se coronó con más de 240 premios internacionales a «Mejor juego del año» por encima de gigantes de la industria como Grand Theft Auto V y BioShock Infinite. Con el paso del tiempo la crítica profesional lo ha señalado como uno de los mejores juegos de la historia.1​
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php include('../layout_footer.php'); ?>