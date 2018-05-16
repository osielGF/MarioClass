<?php
  require_once('funciones.php');
  contar_usuarios();
  listado_usuarios();
?>

<?php
  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
  buscar_usuario_por_id($id);

  if(isset($_POST["btnActualizar"]))
  {
      $id = $_POST['txtId'];
      $user = $_POST['txtUsername'];
      $pass = $_POST['txtPassword'];
      $passEncry = md5($pass);
      actualizar_usuario($id,$user,$passEncry);
      header("location: listado_usuarios.php");
  }
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar - Usuarios</title>
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
              			<h1>ACTUALIZAR USUARIOS</h1>	
              		</div>
                  <form action="actualizar_usuario.php" method="POST">
                    ID: <input type="text" name="txtId" value="<?php echo $usuarioPorId[0]['id']?>" readOnly>
                    Username: <input type="text" name="txtUsername" value="<?php echo $usuarioPorId[0]['username']?>">
                    Password: <input type="text" name="txtPassword" value="<?php echo $usuarioPorId[0]['password'] ?>" >  
                    <input class="button" type="submit" name="btnActualizar" value="GUARDAR">    
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