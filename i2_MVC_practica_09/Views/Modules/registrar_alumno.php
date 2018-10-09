
<!-- Etructura HTML -->
<!DOCTYPE html>
<html>
<head>
	<title>Registro de alumno</title>
</head>
<body>
	
<section>
	<h2>REGISTRO DE ALUMNO</h2>
	<!-- Formulario para el llenado de la informacion de un nuevo usuario,llenando usuario, password, email -->
	<form method="post"  enctype="multipart/form-data">
		<input type="number" placeholder="Matricula" id="txtMatricula" name="txtMatricula" required>
		<input type="text" placeholder="Nombre" id="txtNombre" name="txtNombre" required>
		<input type="text" placeholder="Carrera" id="txtCarrera" name="txtCarrera" required>
		<input type="text" placeholder="Situacion" id="txtSituacion" name="txtSituacion" required>
		<input type="email" placeholder="Correo" id="txtCorreo" name="txtCorreo" required>
		<input type="text" placeholder="Tutor" id="txtTutor" name="txtTutor" required>
		<input type="file" placeholder="Foto" id="txtFoto" name="txtFoto" required>
		<input type="submit" class="button" id="txtRegistrar" name="txtRegistrar" value="Registrar" required>
	</form>
	</section>
	<?php
		//Objeto MvcController
		$registro = new MvcController();
		//Metodo o controller para registrar en la base de datos los datos del nuevo usuario si se presiono el boton "txtRegistrar"
		$registro -> registroAlumnosController();
	?>

</body>
</html>

