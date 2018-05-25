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