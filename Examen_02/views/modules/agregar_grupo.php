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
	<title>Registrar - Grupo</title>
</head>
<body>

	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header" style="background-color:purple">
                <h3 class="card-title">REGISTRAR GRUPO</h3>
              </div>
              <div class="col-12">

              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                	<!--Formulario para los capmos necesarios a llenar como tambien un select dinamico-->
                  <form method="post">
					<input type="text" placeholder="Grupo" name="txtNombre" required class="form-control my-colorpicker1">
					</br>
					<input type="submit" value="Enviar" class="btn btn-success">
					</br>
				</form>
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.card-body -->
            </div>  
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
	//Crear un objeto mvc y llamar el controlador registro de productos
	$registro = new MvcController();
	$registro -> registroGruposController();
?>

			