
<!DOCTYPE html>
<html>
<head>
	<title>Productos - Listado</title>
</head>
<body>
	<H1>LISTADO DE PRODUCTOS</H1>
	<?php
		$vistaProducto = new MvcController();
		$vistaProducto -> vistaProductosController();
		//($vistaProducto -> borrarAlumnoController();
	?>
</body>
</html>