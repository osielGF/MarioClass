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
	<title>Editar - Carrera</title>
</head>
<body>
	<h1>EDITAR CARRERA</h1>
	<form method="post">
	<?php
		$editarCarrera = new MvcController();
		$editarCarrera -> editarCarreraController();
		$editarCarrera -> actualizarCarreraController();
	?>
</form>
</body>
</html>