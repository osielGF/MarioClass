<!DOCTYPE html>
<html>
<head>
	<title>Editar - Producto</title>
</head>
<body>
	<h1>EDITAR PRODUCTO</h1>
	<form method="post">
	<?php
		$editarProducto = new MvcController();
		$editarProducto -> editarProductosController();
		$editarProducto -> actualizarProductosController();
	?>
</form>
</body>
</html>