<?php
	/*
	define('DB_HOST', 'localhost');
	define('DB_DATABASE', 'user');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	*/
?>

<?php
	//Declaracion de variables con los elementos necesarios para realizar la conexion pdo a la base de datos como nombre de bd usuario y contrasena
	$dsn = 'mysql:dbname=user;host=localhost';
	$user = 'root';
	$password = '';
	try
	{
		//Crear conexion pdo cn los datos necesarios (variables)
	    $pdo = new PDO( $dsn, 
	                    $user, 
	                    $password );
	}
	//Excepcion de error en conexion pdo
	catch(PDOException $ex)
	{
	    echo 'Error al conectarnos: ' . $ex->getMessage();
	}
?>