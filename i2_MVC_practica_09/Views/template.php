<!-- Esxtructura HTML -->
<!DOCTYPE html>
<html>
<head>
	<!-- Declaracion de los estilos que se estaran necesitando en las vistas -->
	<link rel="stylesheet" href="./views/css/foundation.css" />
    <script src="./views/js/vendor/modernizr.js"></script>
	<style type="text/css">
		header {
			position: relative;
			margin: auto;
			text-align: center;
			padding: 5px;
		}

		nav{
			position: relative;
			margin: 5 5 5 5;
			width: 100%;
			height: 50px;
			background: black;
		}

		nav ul{
			position: relative;
			margin: auto;
			width: 50%;
			text-align: center;
		}

		nav ul li{
			display: inline-block;
			width: 24%;
			margin-top: 20px;
			line-height: 50%;
			list-style: none;
			font-size: 20px;
		}

		nav ul li a{
			color: white;
			text-decoration: none;
		}

		section{
			position: relative;
			padding: 2%; 
		}

		section h1{
			position: relative;
			margin: auto;
			padding: 10px;
			text-align: center;
		}

		section h2{
			position: relative;
			margin: auto;
			padding: 10px;
			text-align: center;
		}

		section form{
			position: relative;
			margin: auto;
			width: 400px;
		}

		section form input{
			display: inline-block;
			padding: 10px;
			width: 95%;
			margin: 5px;
		}

		section form input[type="submit"]{
			position: relative;
			margin: 20px auto;
			left: 4.5%;
		}

		table{
			position: relative;
			margin: auto;
			width: 100%;
		}

		table thead tr th{
			padding: 10px;
		}

		table tbody tr td{
			padding: 10px;
		}
	</style>
</head>
<body>

	<!-- Cabecera como titulo -->
	<header> TAW - PHP MVC</header>

	<?php
		//Incluir aqui la vista de navegacion.php ubicada en la carpeta "modules"
		include "Modules/navegacion.php";
		//Mostraremos un controlador que muestra la plantilla
		$mvc = new MvcController();
		//llamammos la funcion "enlacesPaginasController" para estar controlando que vista se estara mostrando
		$mvc -> enlacesPaginasController();
	?>
</body>
</html>