<?php 
	class Paginas
	{
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnos" || $enlaces == "carreras" || $enlaces == "tutorias" || $enlaces == "reportes")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
			else if($enlaces == "index")
			{
				$module =  "views/modules/index.php";
			}
			return $module;
		}
	}
?>