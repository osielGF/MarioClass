<?php 
	class Paginas
	{
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnos" || $enlaces == "maestros" || $enlaces == "carreras" || $enlaces == "tutorias" || $enlaces == "reportes" || $enlaces == "editar_alumno" || $enlaces == "editar_maestro" || $enlaces == "agregar_alumno" || $enlaces == "agregar_maestro" || $enlaces == "ingresar" || $enlaces == "salir")
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
			return $module;
		}
	}
?>