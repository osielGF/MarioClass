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
	<title>Registrar - Alumna</title>
</head>
<body>

	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header" style="background-color:purple">
                <h3 class="card-title">REGISTRAR ALUMNA</h3>
              </div>
              <div class="col-12">

              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                	<!--Formulario para los capmos necesarios a llenar como tambien un select dinamico-->
                  <form method="post">
          					<input type="text" placeholder="Nombre" name="txtNombre" required class="form-control my-colorpicker1">
          					</br>
          					<input type="text" placeholder="Apellido" name="txtApellido" required class="form-control my-colorpicker1">
          					</br>
          					<input type="date" placeholder="Fecha de nacimiento" name="txtFecha" required class="form-control my-colorpicker1">
          					</br>
          					Grupo: <select id="select_grupo" name="select_grupos" class="form-control my-colorpicker1">
                      <?php
                        //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                        $opciones = new MvcController();
                        $opciones -> getGruposController();
                      ?>  
                    </select>
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
	$registro -> registroAlumnasController();
?>

			