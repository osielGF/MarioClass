<?php
	session_start();

if(isset($_SESSION["m"])){	
	$id = $_SESSION["m"];
}else if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado - Tutorias</title>
</head>
<body>
	<H1>LISTADO DE TUTORIAS</H1>
	<?php
		$vistaTutorias = new MvcController();
		$vistaTutorias -> vistaTutoriasController();
		$vistaTutorias -> borrarTutoriaController();
	?>
</body>
</html>