		<?php 
		 include('../layout_menu.php'); 
		 include('../php/juegosAction.php');
		 if(!$_SESSION['login']){
		   header("location:login.php");
		   die;
		 } 
		 ?>
				<div class="row">
					<div class="col-md-12 table-bordered">							
						<div class="row">	
							<div class="col-md-11" id="carritoCompra">								
								<div class="container-fluid" id="detalle">
												<table class="table table-responsive table-bordered table-hover" id="detalletable">
												    <thead thead class="thead-inverse">
												      <tr>
												     	<th class="col-md-3">Imagen</th>
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
															<td><img class="img-responsive" src="<?php echo $value['url'] ?>"></img></td>
															<td><?php echo $value['nombreJuego'] ?></td>
															<td><?php echo $value['cantidad'] ?></td>
															<td>$ <?php echo $value['cantidad']* $value['precio'] ?></td>
															<td><button type="button" class="close" aria-label="Close">
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
												<button type="button" class="btn btn-primary">
													Pagar con Banco Falso
												</button>
												<button type="button"><img src="https://s3.amazonaws.com/static.khipu.com/buttons/2015/150x50-transparent.png"></img></button>
											</div>
									</div>					
						</div>
					</div>
				</div>	




		<?php include('../layout_footer.php'); ?>