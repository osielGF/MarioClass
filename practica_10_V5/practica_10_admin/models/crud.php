<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaAlumnosModel($tabla,$idTipoUser,$idUsuario)
	{
		if($idTipoUser==3)
		{
			$stmt2 = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE u.id_usuario = $idUsuario"); 
			$stmt2->execute();
			$res = $stmt2->fetch();

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor"); 
			$stmt->bindParam(":id_profesor", $res["id_profesor"], PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt2->close();
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
		}
	}

	public static function vistaAlumnosProfesorModel($tabla,$idTipoUser,$idUsuario)
	{
		if($idTipoUser==3)
		{
			$stmt2 = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE u.id_usuario = $idUsuario"); 
			$stmt2->execute();
			$res = $stmt2->fetch();

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor"); 
			$stmt->bindParam(":id_profesor", $res["id_profesor"], PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt2->close();
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
		}
	}

	public static function getDatosProfesorPorIdUsuarioModel($idUsuario)
	{
		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE u.id_usuario = $idUsuario"); 
		$stmt2->execute();
		$res = $stmt2->fetch();
		return $res;
	}

	public static function opcionesAlumnosDeMaestroModel($tabla,$idUsuario)
	{
		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE u.id_usuario = $idUsuario"); 
		$stmt2->execute();
		$res = $stmt2->fetch();

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor"); 
		$stmt->bindParam(":id_profesor", $res["id_profesor"], PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		$stmt2->close();
	}

	#VISTA CARRERAS
	#-------------------------------------
	public static function vistaCarrerasModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
	}

	#VISTA TUTORIAS
	#-------------------------------------
	public static function vistaTutoriasModel($tabla,$idUsuario,$idTipoUser)
	{
		if($idTipoUser==3)
		{
			$stmt2 = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE u.id_usuario = $idUsuario"); 
			$stmt2->execute();
			$res = $stmt2->fetch();

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor"); 
			$stmt->bindParam(":id_profesor", $res["id_profesor"], PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt2->close(); 
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
		}
	}

	public static function registroCarrerasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}
    
	public static function registroAlumnosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, a_paterno, a_materno, id_carrera) VALUES (:matricula, :nombre, :a_paterno, :a_materno, :id_carrera)");	
		$stmt->bindParam(":matricula", $datosModel["matricula"]);
		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":a_paterno", $datosModel["a_paterno"]);
		$stmt->bindParam(":a_materno", $datosModel["a_materno"]);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"]);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function registroUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (email,pass,id_tipo_usuario) VALUES (:email, :pass, :id_tipo_usuario)");	
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipo_usuario", $datosModel["id_tipo_usuario"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function registroProfesoresModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,aPaterno,aMaterno,id_usuario_FK,id_carrera) VALUES (:nombre, :aPaterno, :aMaterno, :id_usuario_FK,:id_carrera)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario_FK", $datosModel["id_usuario_FK"], PDO::PARAM_INT);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "Error en la insercion de profesor (MODEL)";
		}
		$stmt->close();
	}

	public static function registroTutoriasModel($datosModel, $tabla)
	{
		$qw = Conexion::conectar()->prepare('SELECT DATE_FORMAT(NOW( ), "%H:%i:%S" ) as res');	
		$qw->execute();
		$res = $qw->fetch();

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_alumno, id_profesor, id_tipo_problema, fecha, hora, tipo_de_tutoria, descripcion) VALUES (:id_alumno, :id_profesor, :id_tipo_problema, :fecha, :hora, :tipo_de_tutoria, :descripcion)");	
		$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_INT);
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tipo_problema", $datosModel["id_tipo_problema"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datosModel["fecha"]);
		$stmt->bindParam(":hora", $res["res"]);
		$stmt->bindParam(":tipo_de_tutoria", $datosModel["tipo_de_tutoria"]);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"]);
		
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "Error en la insercion de Tutorias (MODEL)";
		}
		$stmt->close();
		$qw->close();
	}

	public static function registroAsignacionTutorModal($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_profesor = :id_profesor WHERE id_alumno = :id_alumno");	
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function registroActualizarTutorModal($datosModel,$tabla,$idAlumno)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_profesor = :id_profesor WHERE id_alumno = :id_alumno");	
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_alumno", $idAlumno, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	#Traer ultimo usario
	#-------------------------------------
	public static function getUltimoUsuarioModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT id_usuario FROM usuarios ORDER BY id_usuario DESC LIMIT 1"); 
			if($stmt->execute())
			{
				return $stmt->fetch();
			}
			$stmt->close();
	}

	#VISTA PROFESORES
	#-------------------------------------
	public static function vistaProfesoresModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario "); 
			if($stmt->execute())
			{
				return $stmt->fetchAll();
			}
			$stmt->close();
	}


	public static function getCantidadAlumnosModel()
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM alumnos");	
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	public static function getCantidadAlumnosProfesorModel($id)
	{
		
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM alumnos as a 
		INNER JOIN profesores as p ON a.id_profesor=p.id_profesor where p.id_usuario_FK=$id");	
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "error";
		}
		$stmt->close();
	}

	public static function getCantidadCarrerasModel()
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM carreras");	
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los productooooo0oooooooooooos";
		}
		$stmt->close();
	}

	public static function getCantidadProfesoresModel()
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) as cantidad FROM profesores");	
		if($stmt->execute())
		{
			$cantidad = $stmt->fetch();	
			return $cantidad;
		}
		else
		{
			echo "no traje ltodooooooos los profesores";
		}
		$stmt->close();
	} 

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaUsuariosModel($tabla,$idTienda)
	{
		$stmt = Conexion::conectar()->prepare("SELECT id, username, password, email, tienda FROM $tabla WHERE tienda = :tienda");	
		$stmt->bindParam(":tienda", $idTienda, PDO::PARAM_INT);
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();
	}

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE email = :email and pass = :pass");	
		$statement->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$statement->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}
 
	#TRAER TODAS LAS CARRERAS EXISTENTES
	#-------------------------------------
	public static function getCarrerasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#TRAER TODOS LOS PROESORES EXISTENTES
	#-------------------------------------
	public static function getProfesoresModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}


	public static function getProfesoresCarreraModel($tabla,$idCarrera)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id_carrera = $idCarrera");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
		
	}

	#TRAER TODOS LOS TIPOS DE PROBLEMAS EXISTENTES
	#-------------------------------------
	public static function getTiposProblemaModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	#TRAER TODOS LOS ALUMNOS EXISTENTES
	#-------------------------------------
	public static function getAlumnosModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function getAlumnosTutorModel($tabla,$idCarrera)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id_profesor=0 and id_carrera=$idCarrera");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
 
 	public static function editarAlumnosModel($idAlumno,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno");
 		$stm->bindParam(":id_alumno", $idAlumno, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function editarCarrerasModel($idCarrera,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_carrera = :id_carrera");
 		$stm->bindParam(":id_carrera", $idCarrera, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function editarProfesoresModel($idProfesor,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM profesores as p INNER JOIN usuarios as u ON p.id_usuario_FK = u.id_usuario WHERE p.id_profesor = :id_profesor");
 		$stm->bindParam(":id_profesor", $idProfesor, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function getCarreraPorIdModel($tabla,$idModel)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id_carrera = :id_carrera");	
		$stmt->bindParam(":id_carrera",$idModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getProfesorPorIdModel($tabla,$idModel)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor=:id_profesor");	
		$stmt->bindParam(":id_profesor",$idModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getAlumnpPorIdModel($tabla,$idModel)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor=:id_profesor");	
		$stmt->bindParam(":id_profesor",$idModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getAlumnoPorIdModel($tabla,$idModel)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno=:id_alumno");	
		$stmt->bindParam(":id_alumno",$idModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function getTipoDeProblemaPorIdModel($tabla,$idModel)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_tipo_problema=:id_tipo_problema");	
		$stmt->bindParam(":id_tipo_problema",$idModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public static function actualizarAlumnosModel($datosModel, $tabla,$idTipoUser)
	{
		if($idTipoUser==2)
		{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_profesor = :id_profesor WHERE id_alumno = :id_alumno");	
			$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
			$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_INT);
			if($stmt->execute())
			{
				return "success";
			}
			else
			{
				return "error";
			}
			$stmt->close();
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, nombre = :nombre, a_paterno = :a_paterno, a_materno = :a_materno, id_carrera = :id_carrera, id_profesor = :id_profesor WHERE id_alumno = :id_alumno");	
			$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":a_paterno", $datosModel["a_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":a_materno", $datosModel["a_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
			$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
			$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_INT);
			if($stmt->execute())
			{
				return "success";
			}
			else
			{
				return "error";
			}
			$stmt->close();
		}
	}

	public static function actualizarCarrerasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_carrera = :id_carrera");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET email = :email, pass = :pass WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pass", $datosModel["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario_FK"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarProfesoresModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, aPaterno = :aPaterno, aMaterno = :aMaterno, id_carrera = :id_carrera WHERE id_profesor = :id_profesor");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":id_profesor", $datosModel["id_profesor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);

		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarAlumnosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_alumno = :id_alumno");	
		$stmt->bindParam(":id_alumno", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarTutorDeAlumnosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_profesor=0 WHERE id_alumno = :id_alumno");	
		$stmt->bindParam(":id_alumno", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarCarrerasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_carrera = :id_carrera");	
		$stmt->bindParam(":id_carrera", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarProfesoresModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_profesor = :id_profesor");	
		$stmt->bindParam(":id_profesor", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":id_usuario", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarTutoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sesion_tutoria = :id_sesion_tutoria");	
		$stmt->bindParam(":id_sesion_tutoria", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function getDatosProfesorByIdModel($datosModel,$tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor");	
		$stmt->bindParam(":id_profesor", $datosModel, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	




}
?>