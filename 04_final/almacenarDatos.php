<?php
	$A_matricula = $_POST['txtMatricula'];
	$A_nombre = $_POST['txtNombre'];
	$A_carrera = $_POST['txtCarrera'];
	$A_email = $_POST['txtEmail'];
	$A_telefono = $_POST['txtTelefono'];

	$file = fopen("alumnos_maestros.txt", "a+") or die("Problemas al CREAR el archivo de texto alumnos_maestros.txt");
	if($file)
	{
		fwrite($file, "\r\n");
		fwrite($file, "A".$A_matricula);
		fwrite($file, "\r\n");
		fwrite($file, "A".$A_nombre);
		fwrite($file, "\r\n");
		fwrite($file, "A".$A_carrera);
		fwrite($file, "\r\n");
		fwrite($file, "A".$A_email);
		fwrite($file, "\r\n");
		fwrite($file, "A".$A_telefono);
		fwrite($file, "\r\n");
	}
	fclose($file);
?>