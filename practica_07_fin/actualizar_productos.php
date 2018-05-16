<?php 
  require_once('funciones.php');
  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';

  if(isset($_POST["btnActualizar"])) 
  {
    $id = $_POST['txtId'];
    $nom = $_POST['txtNombre'];
    $prec = $_POST['txtPrecio'];   
    actualizar_producto($id,$nom,$prec);
    header("location: listado_productos.php");
  }
  buscar_por_id($id);
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar - Producto</title>
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
              			<h1>ACTUALIZAR PRODUCTO</h1>	
              		</div>
          					<form action="actualizar_productos.php" method="POST">
                      Id: <input type="text" name="txtId" value="<?php echo $datosPorId[0]['id'] ?>" readonly></br></br>
          						Nombre: <input type="text" name="txtNombre" value="<?php echo $datosPorId[0]['nombre'] ?>"></br></br>
          						Precio: <input type="text" name="txtPrecio" value="<?php echo $datosPorId[0]['precio'] ?>"></br></br>
          						<input class="button" type="submit" name="btnActualizar" value="ACTUALIZAR">
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