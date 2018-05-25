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
	<title>Alumnos - Listado</title>
</head>
<body>
	<H1>LISTADO DE ALUMNOS</H1>
	<?php
		$vistaAlumno = new MvcController();
		$vistaAlumno -> vistaAlumnosController();
		$vistaAlumno -> borrarAlumnoController();
	?>
</body>
</html>