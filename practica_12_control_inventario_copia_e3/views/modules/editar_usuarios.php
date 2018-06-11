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
	<title>Editar - Usuarios</title>
</head>
<body> 
	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar usuarios</h3>
	              </div>
	              <div class="card-body">
	                <!-- Color Picker -->
	                <div class="form-group">
	                	<form method="post">
							<?php
								//crear objeto tipo mvc y posteriormente llamar dos metodos, nno para poner los datos del usuario a actualizar
								//y ekl otro para jalar los datos del formulario y actualizar en la bd segun lo ke se haya escrto
								$editarUsuarios = new MvcController();
								$editarUsuarios -> editarUsuariosController();
								$editarUsuarios -> actualizarUsuariosController();
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
</html>