<?php
class Conexion
{
	public static function conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=practica_12_inventario","root","");
		return $link;
	}
}
?>
