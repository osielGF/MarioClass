<?php
	session_start();
	if(!$_SESSION["validar"])
	{
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Carreras - Listado</title>
</head>
<body>
	<H1>LISTADO DE CARRERAS</H1>
	<?php
		$vistaCarrera = new MvcController();
		$vistaCarrera -> vistaCarreraController();
		$vistaCarrera -> borrarCarreraController();
	?>
</body>
</html>