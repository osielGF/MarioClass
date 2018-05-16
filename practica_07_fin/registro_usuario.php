<?php
	require_once('funciones.php');

	if(isset($_POST["btnRegistrar"]))
	{
		$usname = $_POST["txtUsername"];
		$pass = $_POST["txtPassword"];
    $confirmPass = $_POST["txtConfirmarPassword"];
    if($pass==$confirmPass)
    {
      $passEncry = md5($pass);
      agregar_usuario($usname,$passEncry);  
      header("location: listado_usuarios.php");
    }
    else
    {
      echo "No son iwales";
    }
	}
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro - Usuario</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
      <div class="large-9 columns">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              	<div class="row">
              		<div align="center">
              			<h1>REGISTRO DE USUARIOS</h1>
              		</div>
					<form action="registro_usuario.php" method="POST">
						Username: <input type="text" name="txtUsername"></br></br>
						Password: <input type="password" name="txtPassword"></br></br>
            Confirmar Password: <input type="password" name="txtConfirmarPassword"></br></br>
						<input class="button" type="submit" name="btnRegistrar" value="REGISTRAR">
					</form>
				</div>
            </div>
          </section>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('footer.php'); ?>
