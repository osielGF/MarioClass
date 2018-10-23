<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "libros" || $enlaces == "salir" || $enlaces == "libros" || $enlaces == "profesores" || $enlaces == "agregar_libro" || $enlaces == "editar_libro" || $enlaces == "dashboard" || $enlaces == "registro" || $enlaces == "perfil" || $enlaces == "editar_perfil")
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