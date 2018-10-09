
<!-- Estructura HTML -->
<!DOCTYPE html>
<html>
<head>
	<title>Listado de Alumnos</title>
	
</head>
<body>
<section>
<h2>LISTADO DE ALUMNOS</h2>	
	<?php
    //objeto tipo MvcController
		$editar = new MvcController();
    //Metodo o controller para mostrar todos los usuarios existentes en modo de tabla
		$editar -> vistaAlumnosController();
		$editar -> borrarAlumnosController();
	?>
</section>
</body>
</html>

