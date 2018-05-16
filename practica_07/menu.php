
<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listado - Productos</title>
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
              			<h1>MENU</h1>	
              		</div>
        					<a href="listado_usuarios.php"><input class="button success" type="button" name="btnUser" value="USUARIOS"></a>
        					<a href="listado_productos.php"><input class="button success" type="button" name="btnProduct" value="PRODUCTOS"></a>
              		<a href="ventas_listado.php"><input class="button success" type="button" name="btnSell" value="VENTAS"></a>

				</div>
            </div>
          </section>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('footer.php'); ?>