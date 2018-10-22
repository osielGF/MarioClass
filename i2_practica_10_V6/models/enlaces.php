<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "alumnos" || $enlaces == "salir" || $enlaces == "carreras" || $enlaces == "reportes" || $enlaces == "tutorias" || $enlaces == "dashboard" || $enlaces == "profesores" || $enlaces == "agregar_carreras" || $enlaces == "agregar_alumnos" || $enlaces == "agregar_profesores" || $enlaces == "editar_alumnos" || $enlaces == "editar_carreras" || $enlaces == "editar_profesores" || $enlaces == "agregar_tutorias" || $enlaces == "editar_tutorias" || $enlaces == "asignar_tutores" || $enlaces=="seleccionar_carrera" || $enlaces=="alumnos_tutor" || $enlaces=="editar_alumnos_tutor" || $enlaces=="elegir_tipo_tutoria" || $enlaces=="agregar_tutorias_grupal")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
		    else if($enlaces == "index")
		    {
		    	$module =  "views/modules/ingresar.php";	
		    }
			return $module;

			
		}
	}
?>