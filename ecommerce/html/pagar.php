<?php 

 include('../layout_menu.php'); 
 if(!$_SESSION['login'] && !$_SESSION['cuentas'] ){
   header("location:login.php");
   die;
 } 
 ?>


 <div class="row">

	 		<?php if (isset($_SESSION["estadoPago"])){ ?>
				<?php if($_SESSION["estadoPago"] == true)  { ?>

					<div class="alert alert-success">
					  <strong>Success!</strong> Pago Exitoso !.
					</div>

				<?php } else{ ?>
					<div class="alert alert-danger">
					  <strong>Danger!</strong> El pago no pudo efectuarse, debido a errores.
					</div>
				<?php } ?>	
			<?php } ?>	
 	<div class="col-xs-6 col-xd-offset-3">
 		<form action="../php/pagarBancoFalso.php" method="post">
		 	<div class="form-group">
		      <label for="disabledSelect" class="col-sm-2 control-label"></label>
		      <div class="col-sm-10">
		        <select id="disabledSelect" name="idTipoCuenta" class="form-control">
				<?php  if(isset($_SESSION['cuentas'])) {  
						foreach ($_SESSION['cuentas'] as $key => $value) {
							foreach ($value as $key => $value2) {
								if($value2["idTipoCuenta"] != 3){
									echo "<option value=".$value2['id'].">".$value2["numeroCuenta"]."</option>";
								}								
							}
							
						}
					}
				?>
		          
		        </select>

		        <button type="submit" class="btn btn-primary">Pagar con banco Falso</button>
		      </div>
		    </div>
	    </form> 
    	
  	</div> 
 </div> 
 	

 <?php include('../layout_footer.php'); ?>