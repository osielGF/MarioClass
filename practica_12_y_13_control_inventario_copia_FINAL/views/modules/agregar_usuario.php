<?php
//ver si hay una sesion existente
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
	<title>Registrar - usuario</title>
</head>
<body> 
	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">REGISTRAR USUARIO</h3>
              </div>
              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                  <!--Formulario para los capmos necesarios a llenar -->
                  <form method="post">
          					<input type="text" placeholder="username" name="txtUsername" required class="form-control my-colorpicker1">
          					</br>
          					<input type="text" placeholder="password" name="txtPassword" required class="form-control my-colorpicker1">
          					</br>
          					<input type="text" placeholder="email" name="txtEmail" required class="form-control my-colorpicker1">
                        <?php
                          //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                          $mostrarTiendaDelProducto = new MvcController();
                          $mostrarTiendaDelProducto -> getTiendaController();
                        ?>  
                    <input type="submit" value="Enviar" class="btn btn-success">
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

<?php
  //crear un bjeto mvc y llamar el controlador registro para usuarios
	$registro = new MvcController();
	$registro -> registroUsuariosController();
?>
