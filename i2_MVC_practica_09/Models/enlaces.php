<?php 
	//Clase paginas
	class Paginas
	{
		//Metodo o funcion qe se encarga de las vistas a mostrar en pantalla segun el "action" en la URL 
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnos" || $enlaces == "carreras" || $enlaces == "tutores" || $enlaces == "registrar_alumno" || $enlaces == "editar_alumno")
			{
				$module =  "Views/Modules/".$enlaces.".php";
			}
			else
			{
				$module = "Views/Modules/alumnos.php";
			}
			return $module;
		}
	}
?>