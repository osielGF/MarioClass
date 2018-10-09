<?php
//Llamar a la conexion.php para poder hacer uso de la conexion PDO a la base de datos
require_once "conexion.php";

//Clase datos extendida de conexion para usar la conexion 
class Datos extends Conexion
{

	#Registro de usuarios 
	#-------------------------------------
	public static function registroAlumnosModel($datosModel, $tabla)
	{
		//preparacion de la operacion a realizar un INSERT 
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, carrera, situacion, correo, tutor, foto) VALUES (:matricula,:nombre,:carrera,:situacion,:correo,:tutor,:foto)");	
		//declarando los parametros
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":situacion", $datosModel["situacion"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		//Ejecucion de la consulta
		if($stmt->execute())
		{
			//Si inserto bien mandara de regreso un mensaje de exito
			return "success";
		}
		else
		{
			//De lo contrario mandara mensaje de error
			return "error";
		}
		$stmt->close();
	}
 
	//Modelo para hacer una consulta a la base de datos y obtener todo sobre alguna tabla en este caso se uso para la vista de usuarios
	public static function vistaAlumnosModel($table)
	{
		//Preparacion de la consulta
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table");	
		//Ejecucion de la consulta
		$statement->execute();
		//Asociacion de los resultados y retornandolos
		return $statement->fetchAll();
		//Cerrar la operacion
		$statement->close();
	}

	public static function editarAlumnosModel($datosModel,$table)
	{
		//Preparacion de la consulta
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE matricula = :id");	
		$statement->bindParam(":id",$datosModel,PDO::PARAM_INT);
		//Ejecucion de la consulta
		$statement->execute();
		//Asociacion de los resultados y retornandolos
		return $statement->fetch();
		//Cerrar la operacion
		$statement->close();
	}

	public static function actualizarAlumnosModel($datosModel,$table)
	{
		$statement = Conexion::conectar()->prepare("UPDATE $table SET nombre = :nombre, carrera = :carrera, situacion = :situacion, correo = :correo, tutor = :tutor, foto = :foto WHERE matricula = :matricula");
		$statement->bindParam(":matricula",$datosModel["matricula"],PDO::PARAM_STR);
		$statement->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
		$statement->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_STR);
		$statement->bindParam(":situacion",$datosModel["situacion"],PDO::PARAM_STR);
		$statement->bindParam(":correo",$datosModel["correo"],PDO::PARAM_STR);
		$statement->bindParam(":tutor",$datosModel["tutor"],PDO::PARAM_STR);
		$statement->bindParam(":foto",$datosModel["foto"],PDO::PARAM_STR);
		if($statement->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$statement->close();
	}

	public static function borrarAlumnosModel($idBorrar,$tabla)
	{
		$statement = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula");
		$statement->bindParam(":matricula",$idBorrar,PDO::PARAM_INT);
		if($statement->execute())
		{
			return "success";
		}
		else
		{
			return "Error";
		}
		$statement´->close();
	}


}
?>