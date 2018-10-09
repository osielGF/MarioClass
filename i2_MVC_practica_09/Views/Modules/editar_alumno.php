
<!-- Etructura HTML -->
<!DOCTYPE html>
<html>
<head>
	<title>Editar alumno</title>
</head>
<body>
	
<section>
	<h2>EDITAR ALUMNO</h2>

	
	<form method="post"  enctype="multipart/form-data">
		<?php
		//Objeto MvcController
		$editar = new MvcController();
		//Metodo o controller para registrar en la base de datos los datos del nuevo usuario si se presiono el boton "txtRegistrar"
		$editar -> editarAlumnosController();
		$editar -> actualizarAlumnosController();
	?>
	</form>
	</section>
	

