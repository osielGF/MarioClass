<!DOCTYPE html>
<html>
<head>
	<title>Registrar - Producto</title>
</head>
<body>
	<h1>REGISTRAR PRODUCTO</h1>
	<form method="post">
		<input type="text" placeholder="nombre" name="txtNombre" required>
		<input type="text" placeholder="precio de compra" name="txtPrecioCompra" required>
		<input type="text" placeholder="precio de venta" name="txtPrecioVenta" required>
		<input type="text" placeholder="stock" name="txtStock" required>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
<?php
	$registro = new MvcController();
	$registro -> registroProductosController();
?>

