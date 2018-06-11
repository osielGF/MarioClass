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
	<title>Registrar - Venta</title>
</head>
<body>

	<div class="content-wrapper">
	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">REGISTRAR VENTA</h3>
              </div>
              <div class="col-12">

              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                	<!--Formulario para los capmos necesarios a llenar como tambien un select dinamico-->
                  <form method="post">
            					<input type="text" placeholder="codigo" name="txtCodigo" required class="form-control my-colorpicker1">
            					</br>
            					<input type="submit" value="Registrar Venta" name="registrar" class="btn btn-success">
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
</html>

<?php
	//Crear un objeto mvc y llamar el controlador registro de productos
	$registro = new MvcController();
	$registro -> registroVentasController();
?>

			