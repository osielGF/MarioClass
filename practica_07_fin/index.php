<?php
	require_once('funciones.php');

  if(isset($_POST["btnIniciar"]))
  {
      $user = $_POST['txtUsername'];
      $pass = $_POST['txtPassword'];
      $passE = md5($pass);
      login($user,$passE);

      echo $user;
      echo $pass;
      if($resLogin==null)
      {
        header("location: index.php");
      }
      else
      {
        header("location: menu.php");
      }
  }
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
              			<h1>INICIO DE SESION</h1>
              		</div>
					<form action="index.php" method="POST">
						Username: <input type="text" name="txtUsername"></br></br>
						Password: <input type="password" name="txtPassword"></br></br>
						<input class="button" type="submit" name="btnIniciar" value="INICIAR SESION">
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
