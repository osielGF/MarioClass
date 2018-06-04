<?php
class Conexion
{
	public static function conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=id5959870_practica_12","id5959870_osielgf","Ariel2511");
		return $link;
	}
}
?>
