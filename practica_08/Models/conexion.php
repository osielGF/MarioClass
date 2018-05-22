
<?php
class Conexion
{
	public static function conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=practica_08","root","");
		return $link;
	}
}
?>
