<?php
	$dsn = 'mysql:dbname=practica07;host=localhost';
	$user = 'root';
	$password = '';
	try
	{
	    $pdo = new PDO( $dsn, 
	                    $user, 
	                    $password );
	}
	catch(PDOException $ex)
	{
	    echo 'Error al conectarnos: ' . $ex->getMessage();
	}
?>