<?php

session_start();

if(isset($_SESSION["m"])){	
	$id = $_SESSION["m"];
	header("location:index.php?action=alumnos");
	exit();
}else if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>REPORTES - LISTADOS</title>
</head>
<body>
	<H1>REPORTES - LISTADOS</H1>
	<?php
		$reportes = new MvcController();
		$reportes -> vistaReportesController();
	?>		

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#alumno').DataTable();
	});
	$(document).ready(function(){
		$('#maestro').DataTable();
	});
	$(document).ready(function(){
		$('#carrera').DataTable();
	});
	$(document).ready(function(){
		$('#tutoria').DataTable();
	});
</script>