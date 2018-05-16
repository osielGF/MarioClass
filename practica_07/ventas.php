<?php  
	require_once('funciones.php');
	contar_productos();
	nombres_productos();
?>

<?php  
	if(isset($_POST["btnGuardar"]))
	{
		$fech = $_POST['fecha'];
		$tot = $_POST['txtTotal'];
		guardar_venta($tot,$fech);
		header("location: ventas_listado.php");
	}
?>

<?php include('header.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realizar Venta</title>
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
              			<h1>REALIZAR VENTA</h1>
              			
              		</div>
					<form action="ventas.php" method="POST">
						<input type="text" name="fecha" id="fecha" readonly>
						<div class="large-5 columns">
							<select id="lista_productos" name="lista_productos">
								<option value="0">Seleccione un producto</option>
								<?php 
								$i=0;
								while($i<$cantidadProductos) { 
								?>
								<option value="<?php echo $i?>"><?php echo $nombresProductos[$i]['nombre'].'$'.$nombresProductos[$i]['precio'] ?></option>
								<?php $i++; } ?>
							</select>
						</div>
						<div class="large-2 columns">
							Cantidad: <input type="number" name="cantidad" id="cantidad">
						</div>
						<input class="button" type="button" name="btnAgregar" value="AGREGAR" onclick="add();">
						<div class="large-2 columns">
							TOTAL: <input type="text" name="txtTotal" id="txtTotal" readonly>	
						</div>
				</div>
				<H3>LISTA DE PRODUCTOS AGREGADOS</H3>
				<div name="aqui" id="aqui">
					
				</div>	
				<input class="button" type="submit" name="btnGuardar" value="GUARDAR">
				</form> 
            </div>
          </section>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('footer.php'); ?>

<script src="./js/ventas.js"></script>
