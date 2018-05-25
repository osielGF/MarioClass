<?php 
	class Paginas
	{
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnos" || $enlaces == "maestros" || $enlaces == "carreras" || $enlaces == "tutorias" || $enlaces == "reportes" || $enlaces == "editar_alumno" || $enlaces == "editar_maestro" || $enlaces == "agregar_alumno" || $enlaces == "agregar_maestro" || $enlaces == "ingresar"|| $enlaces == "editar_carrera" || $enlaces == "agregar_carrera" || $enlaces == "editar_tutoria" || $enlaces == "agregar_tutoria")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "index")
			{
				$module =  "views/modules/index.php";
			}
			else if($enlaces == "cambioAlumno")
			{
				$module =  "views/modules/alumnos.php";
			}
			else if($enlaces == "cambioMaestro")
			{
				$module =  "views/modules/maestros.php";
			}
			else if($enlaces == "registroAlumno")
			{
				$module =  "views/modules/alumnos.php";
			}
			else if($enlaces == "registroMaestro")
			{
				$module =  "views/modules/maestros.php";
			}
			else if($enlaces == "cambioCarrera")
			{
				$module =  "views/modules/carreras.php";
			}
			else if($enlaces == "registroCarrera")
			{
				$module =  "views/modules/carreras.php";
			}
			else if($enlaces == "registroTutoria")
			{
				$module =  "views/modules/tutorias.php";
			}
			else if($enlaces == "salir")
			{
				session_start();
				session_destroy();
				$module =  "views/modules/ingresar.php";
			}
			return $module;
		}
	}
?>