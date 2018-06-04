<?php
error_reporting(0);
	session_start();
	if(!$_SESSION['user']){
		echo "
		<script type='text/javascript'>
			window.location='index.php';
		</script>";
	}	
	//$MVC = new MvcController();
	//$MVC->addHistorialController();
?>
<div class="content-wrapper" >
	<section class="content">
	    <div class="container-fluid">
        	<div class="row">
        		<div class="col-12">
        			<div class="card card-success">
          				<div class="card-header">
            				<label class="card-title">Producto</label>
          				</div>
						<div class="card-body">
							<form method="post">
								<div class="row">
									<br>
									<input type="number" name="numCantidad" class="form-control" placeholder="Cantidad" min="1" required>
									<br><br>
									<input type="text" name="txtReferencia" class="form-control" placeholder="Referencia" required>
									<br><br>
									<input type="date" name="txtDate" class="form-control" placeholder="Fecha" required>
									<br><br>
									<textarea class="form-control" placeholder="Nota" name="txtNota" required></textarea>
									<br><br>

									<div class="col-3">
										<br><br><br>
										<input type="submit" name="btnAgregarStock" class="btn btn-success" value="Agregar al Stock"><br><br>
	        							<div class="col-7">
										<input type="submit" name="btnQuitarStock" class="btn btn-block btn-danger" value="Quitar del Stock">
										<br>
										<br>
									</div>
									</div>
								</div>	
							</form>	
								<?php
									$mvc = new MvcController();
									$mvc -> stockController();
								?>
						</div>	
					</div>	
        		</div>
        	</div>
		</div>
	</section>
</div>