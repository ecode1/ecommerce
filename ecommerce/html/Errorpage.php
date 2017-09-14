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
						<div class="container-fluid" id="Errorpage">
						<div class="alert alert-danger">
						  <strong>Danger!</strong> Algo raro a sucedido, por favor intentalo de nuevo.
						</div>
									
									</div>
							</div>					
				</div>
			</div>
		</div>
<?php include('../layout_footer.php'); ?>