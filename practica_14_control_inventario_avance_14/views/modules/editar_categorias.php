<?php
//ver si hay una sesion existente  si o hay una sesion,me redireccina al index que en este caso es el login
  error_reporting(0);
  session_start();
  if(!$_SESSION['user']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<!--cuerpo de la pagina-->
<!DOCTYPE html>
<html>
<head>
	<title>Editar - Categorias</title>
</head>
<body> 
	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar Categorias</h3>
	              </div>
	              <div class="card-body">
	                <!-- Color Picker -->
	                <div class="form-group">
	                	<form method="post">
							<?php
								//Crear un objeto mvc y llamar dos controlardores, uno para mostrar la categoria seleccionada a 
								//editar y posteriormente el otro controlador que jala todos los datos de el formulario y actualiza
								$editarCategoria = new MvcController();
								$editarCategoria -> editarCategoriasController();
								$editarCategoria -> actualizarCategoriasController();
							?>
		                        <?php
		                          //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
		                          	$mostrarTiendaDelProducto = new MvcController();
                          			$mostrarTiendaDelProducto -> getTiendaController();
		                        ?>  
			 					<input type="submit" name="btnActualizar" id="btnActualizar" value="ACTUALIZAR" class="btn btn-success">
						</form>
	                </div>
	                <!-- /.form group -->
	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	        </div>
</body>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>
</html>