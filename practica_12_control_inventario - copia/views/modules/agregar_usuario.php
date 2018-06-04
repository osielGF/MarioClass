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
                  <form method="post">
					<input type="text" placeholder="username" name="txtUsername" required class="form-control my-colorpicker1">
					</br>
					<input type="text" placeholder="password" name="txtPassword" required class="form-control my-colorpicker1">
					</br>
					<input type="text" placeholder="email" name="txtEmail" required class="form-control my-colorpicker1">
					</br>
					<input type="submit" value="Enviar" class="success">
					</br>
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

<?php
	$registro = new MvcController();
	$registro -> registroUsuariosController();
?>
