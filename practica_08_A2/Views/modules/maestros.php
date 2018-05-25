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
	<title>Maestros - Listado</title>
</head>
<body>
	<H1>LISTADO DE MAESTROS</H1>
	<?php
		$vistaMaestro = new MvcController();
		$vistaMaestro -> vistaMaestrosController();
		$vistaMaestro -> borrarMaestroController();
	?>
</body>
</html>