<?php
  error_reporting(0);
  session_start();
  if(!$_SESSION['user']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Editar - Producto</title>
</head>
<body> 
	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar PRODUCTO</h3>
	              </div>
	              <div class="card-body">
	                <!-- Color Picker -->
	                <div class="form-group">
	                	<form method="post">
							<?php
								$editarProducto = new MvcController();
								$editarProducto -> editarProductosController();
								$editarProducto -> actualizarProductosController();
							?>
							Categoria: <select id="select_categorias" name="select_categorias" class="form-control my-colorpicker1">
							<?php
								$opciones = new MvcController();
								$opciones -> getCategoriasController();
							?>	
							</br></br>
							<input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar" class="btn btn-success">
						</form>
	                </div>
	                <!-- /.form group -->
	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	        </div>
</body>
</html>