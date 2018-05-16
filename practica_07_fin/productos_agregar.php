<?php
	require_once('funciones.php');

	if(isset($_POST["btnAgregar"]))
	{
		$id = $_POST["txtId"];
		$nom = $_POST["txtNombre"];
		$precio = $_POST["txtPrecio"];
		agregar_producto($id,$nom,$precio);
    header("location: listado_productos.php");
	}
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar - Productos</title>
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
              			<h1>AGREGAR PRODUCTOS</h1>	
              		</div>
          					<form action="productos_agregar.php" method="POST">
          						ID: <input type="text" name="txtId"></br></br>
          						Nombre: <input type="text" name="txtNombre"></br></br>
          						Precio: <input type="text" name="txtPrecio"></br></br>
          						<input class="button" type="submit" name="btnAgregar" value="AGREGAR">
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