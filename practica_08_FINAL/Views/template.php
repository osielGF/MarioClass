<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
	<link rel="stylesheet" type="text/css" href="Views/css/select2.css">
   <link rel="stylesheet" type="text/css" href="Views/css/select2.min.css">
   <script src="Views/js/jquery-3.3.1.js"></script>
   <script src="Views/js/select2.js"></script>
   <script src="Views/js/select2.min.js"></script>
   <link rel="stylesheet" type="text/css" href="Views/css/datatables.min.css"/>
	<script type="text/javascript" src="Views/js/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Views/css/datatables.css"/>
	<script type="text/javascript" src="Views/js/datatables.js"></script>
	<script type="text/javascript" src="Views/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Views/css/jquery.dataTables.min.css">
	<style>
		nav{
			position:relative;
			margin:auto;
			width:100%;
			height:auto;
			background:red;
		}

		nav ul{
			position:relative;
			margin:auto;
			width:50%;
			text-align: center;
		}

		nav ul li{
			display:inline-block;
			width:24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color:white;
			text-decoration: none;
		}

		section{
			position: relative;
			margin: auto;
			width:400px;
		}

		section h1{
			position: relative;
			margin: auto;
			padding:10px;
			text-align: center;
		}

		section form{
			position:relative;
			margin:auto;
			width:400px;
		}

		section form input{
			display:inline-block;
			padding:10px;
			width:95%;
			margin:5px;
		}

		section form input[type="submit"]{
			position:relative;
			margin:20px auto;
			left:4.5%;

		}

		table{
			position:relative;
			margin:auto;
			width:100%;
			left:-10%;
		}

		table thead tr th{
			padding:10px;
		}

		table tbody tr td{
			padding:10px;
		}
	</style>
</head>
<body>
	<?php include "modules/navegacion.php"; ?>
	<section>
		<?php 
			$mvc = new MvcController();
			$mvc -> enlacesPaginasController();
		?>
	</section>
</body>
</html>